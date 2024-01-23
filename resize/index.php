<?php

$src = $_GET['src'];
$newWidth = $_GET['width'];

$baseURL = "https://bilder.der-reiskoch.de";

if ((!is_null($src)) && (!is_null($newWidth))) {

    $filename = $baseURL . $src;

    $splitters = explode(".", $src);
    $extension = $splitters[1];

    $isJPG = strcmp("jpg", strtolower($extension)) === 0;
    $isPNG = strcmp("png", strtolower($extension)) === 0;

    $dayInSeconds = 86400;
    $cacheMaxEdge = $dayInSeconds * 365;

    header('Cache-Control: max-age=' . $cacheMaxEdge . ', public');
    header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + $cacheMaxEdge));

    if ($isJPG) {
        header('Content-type: image/jpeg');
    }
    if ($isPNG) {
        header("Content-type: image/png");
    }

    list($width, $height) = getimagesize($filename);
    $ratio = $newWidth / $width;

    $newHeight = $height * $ratio;

    $im = imagecreatetruecolor($newWidth, $newHeight);

    if ($isJPG) {
        $image = imagecreatefromjpeg($filename);
    }
    if ($isPNG) {
        $image = imagecreatefrompng($filename);
    }

    imagecopyresampled($im, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if ($isJPG) {
        imagejpeg($im, null, 80);
    }
    if ($isPNG) {
        imagepng($im);
    }

    imagedestroy($im);
}
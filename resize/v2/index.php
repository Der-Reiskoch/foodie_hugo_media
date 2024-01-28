<?php

$srcWithLeadingSlash = $_GET['src'];
$newWidth = $_GET['width'];

$imageUrl = "";
if ((!is_null($srcWithLeadingSlash)) && (!is_null($newWidth))) {

    $imageUrl = sprintf("https://ik.imagekit.io/reiskoch02/tr:w-%s%s" ,$newWidth, $srcWithLeadingSlash);

} else {
    print("no src and width given");
}

generateImage($imageUrl);

function generateImage($url) {
    if (isset($url)) {

        $splitters = explode(".", $url);
        $extension = $splitters[count($splitters)-1];

        $isJPG = strcmp("jpg", strtolower($extension)) === 0;
        $isPNG = strcmp("png", strtolower($extension)) === 0;

        $dayInSeconds = 86400;
        $cacheMaxEdge = $dayInSeconds * 365;

        header('Cache-Control: max-age=' . $cacheMaxEdge . ', public');
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + $cacheMaxEdge));
        header('Content-type: image/jpeg');

        if ($isJPG) {
            generateJpgImage($url);
        }
        elseif ($isPNG) {
            generatePngImage($url);
        }
        else {
            print "unknown extension";
        }
    }
}

function generateJpgImage($url) {
    if (isset($url)) {
        $image = imagecreatefromjpeg($url);
        imagejpeg($image, null, 85);
        imagedestroy($image);
        
    }
}
function generatePngImage($url) {
    if (isset($url)) {
        $image = imagecreatefrompng($url);
        imagepng($image);
        imagedestroy($image);
        
    }
}

?>

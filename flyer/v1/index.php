<?php

$id = $_GET['id'];

$imageUrl = "";
if (isset($id)) {
    $imageUrl = sprintf("https://ik.imagekit.io/reiskoch/ext/flyer/tr:w-80,h-115/%s", $id);
} else {
    print("no id");
}

generateImage($imageUrl);

function generateImage($imageUrl) {
    if (isset($imageUrl)) {
        $dayInSeconds = 86400;
        $cacheMaxEdge = $dayInSeconds * 365;

        header('Cache-Control: max-age=' . $cacheMaxEdge . ', public');
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + $cacheMaxEdge));
        header('Content-type: image/jpeg');
        $image = imagecreatefromjpeg($imageUrl);
        imagejpeg($image, null, 80);
        imagedestroy($image);
    }
}

?>
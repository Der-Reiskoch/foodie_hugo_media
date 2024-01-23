<?php

$id = $_GET['id'];
$title = $_GET['title'];

$pinUrl = "";
if (isset($id)) {

    $path2ndPart = str_pad($id, 4, '0', STR_PAD_LEFT);
    $path1stPart = substr($path2ndPart,0,2) . "00";
    $path = sprintf("%s/%s", $path1stPart, $path2ndPart);

    $textOverlay = sprintf("ot-%s,otw-1000,otbg-9acd32,otia-center,oa-7,otp-34,ots-100,otc-FFFFFF,otf-ubuntu,ott-b", str_replace("_", " ", $title));
    $logoOverlay = "oi-boldtextlogo.png,ox-325,oy-1350,ow-400,oh-100,oit-false"; 
    $pin = sprintf("%s/pin.jpg", $path);
    $genericUrl = sprintf("https://ik.imagekit.io/reiskoch02/pins/tr:w-1000,h-1500:%s:%s/%s" ,$textOverlay, $logoOverlay, $pin);
    
    $hasGenricPin = doesRemoteFileExist($genericUrl);

    if ($hasGenricPin) {
        $pinUrl = $genericUrl;
    }
    else {
        $baseUrl = "https://bilder.der-reiskoch.de/pins";
        $staticUrl = sprintf("%s%s/collage.jpg",$baseUrl, $path);
        $hasStaticPin = doesRemoteFileExist($staticUrl);

        if ($hasStaticPin) {
            $pinUrl = $staticUrl;
        }
    }
} else {
    print("no id");
}


generateImage($pinUrl);



function generateImage($pinUrl) {
    if (isset($pinUrl)) {
        $dayInSeconds = 86400;
        $cacheMaxEdge = $dayInSeconds * 365;

        header('Cache-Control: max-age=' . $cacheMaxEdge . ', public');
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + $cacheMaxEdge));
        header('Content-type: image/jpeg');
        $image = imagecreatefromjpeg($pinUrl);
        imagejpeg($image, null, 80);
        imagedestroy($image);
    }
}


function doesRemoteFileExist($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    curl_close($ch);
    if($result !== FALSE) {
        return true;
    }
    else {
        return false;
    }
}




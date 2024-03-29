<?php

$id = $_GET['id'];
$title = $_GET['title'];

$pinUrl = null;
if (isset($id)) {

    $path2ndPart = str_pad($id, 4, '0', STR_PAD_LEFT);
    $path1stPart = substr($path2ndPart,0,2) . "00";
    $path = sprintf("%s/%s", $path1stPart, $path2ndPart);

    $textOverlay = sprintf("l-text,i-%s,fs-100,tg-b,ff-ubuntu,co-ffffff,bg-9acd32,al-9,w-1000,pa-60_30,l-end",str_replace("_", " ", $title));
    $logoOverlay = sprintf("l-image,i-boldtextlogo.png,w-368,h-100,lx-330,ly-1350,t-false,l-end"); 

    $pin = sprintf("%s/pin.jpg", $path);
    // https://ik.imagekit.io/reiskoch02/pins/tr:w-1000,h-1500:%s:%s/%s
    // https://ik.imagekit.io/reiskoch/ext/pins/tr:w-1000,h-1500:%s:%s/%s
    // https://ik.imagekit.io/reiskoch/pins/tr:w-1000,h-1500:%s:%s/%s
    $genericUrl = sprintf("https://ik.imagekit.io/reiskoch02/pins/tr:w-1000,h-1500:%s:%s/%s" ,$textOverlay, $logoOverlay, $pin);
    
    die($genericUrl);


    $hasGenricPin = doesRemoteFileExist($genericUrl);

    if ($hasGenricPin) {
        $pinUrl = $genericUrl;
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




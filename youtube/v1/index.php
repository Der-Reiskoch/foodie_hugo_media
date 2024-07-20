<?php

if (!isset($_GET['file'])) {
    http_response_code(400);
    echo 'Bad Request: URL parameter is missing';
    exit;
}


$file = $_GET['file'];


$url = 'https://bilder.koch-reis.de/media/_youtube/' . $file;

$imageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
$headers = get_headers($url, 1);

if (!isset($headers['Content-Type']) || !in_array($headers['Content-Type'], $imageTypes)) {
    http_response_code(400);
    echo 'Bad Request: URL does not point to a valid image';
    exit;
}

$image = file_get_contents($url);

if ($image === FALSE) {
    http_response_code(500);
    echo 'Internal Server Error: Unable to retrieve image';
    exit;
}

header('Content-Type: ' . $headers['Content-Type']);

echo $image;
?>

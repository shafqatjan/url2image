<?php
require('autoload.php');
require_once('helper.php');
// _p($_GET);
$attributes = [];
// image generated link
$image_rl = isset($_GET['image_rl']) && !empty($_GET['image_rl']) ? ($_GET['image_rl']) : "http://url2image00.local/";
$attributes['image_url'] = $image_rl;

// link that would be convert
$url = isset($_GET['url']) && !empty($_GET['url']) ? ($_GET['url']) : "https://google.com";
$url = removeHttp($url);
$attributes['url'] = $url;

// image with and height
$width = isset($_GET['width']) && !empty($_GET['width']) ? $_GET['width'] : '-1';
$attributes['width'] = $width;
$height = isset($_GET['height']) && !empty($_GET['height']) ? $_GET['height'] : '-1';
$attributes['height'] = $height;

// browser width and heigth while taking a screenshort
$bwidth = isset($_GET['bwidth']) && !empty($_GET['bwidth']) ? $_GET['bwidth'] : '';
$attributes['bwidth'] = $bwidth;
$bheight = isset($_GET['bheight']) && !empty($_GET['bheight']) ? $_GET['bheight'] : '';
$attributes['bheight'] = $bheight;

// image related some properties
$ext = isset($_GET['image_type']) && !empty($_GET['image_type'])  ?  $_GET['image_type'] : 'png';
$attributes['image_type'] = $ext;

$quality = isset($_GET['quality']) && !empty($_GET['quality'])  ? $_GET['quality'] : '';
$attributes['quality'] = $quality;

$zoom = isset($_GET['zoom']) && !empty($_GET['zoom'])  ? $_GET['zoom'] : '';
$attributes['zoom'] = $zoom;

// Which algo exec, grabit, and curl
$algo = isset($_GET['algo']) && !empty($_GET['algo'])  ? $_GET['algo'] : 'grabit';
$attributes['algo'] = $algo;

$url2image = new MyUrl2Image($attributes);
// _p($url2image);

$url2image->execute();
_p($url2image->preview('image'), true);

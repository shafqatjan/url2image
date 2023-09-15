<?php
require('autoload.php');
require_once('helper.php');
// _p($_REQUEST);
$attributes = [];
// image generated link
$attributes['image_url'] =  isset($_REQUEST['image_rl']) && !empty($_REQUEST['image_rl']) ? ($_REQUEST['image_rl']) : "http://url2image00.local/";

// link that would be convert
$url = isset($_REQUEST['url']) && !empty($_REQUEST['url']) ? ($_REQUEST['url']) : "https://solar.greenpoweremc.com/v2/#/cooperative-solar-dashboard/ZW1jLXNvbGFyIzQxI2dvLXRvLWNvb3Bz/f865b1ff22819ed940a3504cbf18af86";
$attributes['url'] = removeHttp($url);

// image with and height
$attributes['width'] = isset($_REQUEST['width']) && !empty($_REQUEST['width']) ? $_REQUEST['width'] : '-1';
$attributes['height'] = isset($_REQUEST['height']) && !empty($_REQUEST['height']) ? $_REQUEST['height'] : '-1';

// browser width and heigth while taking a screenshort
$attributes['bwidth'] = isset($_REQUEST['bwidth']) && !empty($_REQUEST['bwidth']) ? $_REQUEST['bwidth'] : '';
$attributes['bheight'] = isset($_REQUEST['bheight']) && !empty($_REQUEST['bheight']) ? $_REQUEST['bheight'] : '';

// image related some properties
$attributes['image_type'] = isset($_REQUEST['image_type']) && !empty($_REQUEST['image_type'])  ?  $_REQUEST['image_type'] : 'png';
$attributes['quality'] = isset($_REQUEST['quality']) && !empty($_REQUEST['quality'])  ? $_REQUEST['quality'] : '';
$attributes['zoom'] = isset($_REQUEST['zoom']) && !empty($_REQUEST['zoom'])  ? $_REQUEST['zoom'] : '';

// Which algo exec, grabit, and curl
$attributes['algo'] = isset($_REQUEST['algo']) && !empty($_REQUEST['algo'])  ? $_REQUEST['algo'] : 'grabit';

$url2image = new MyUrl2Image($attributes);
// _p($url2image);

$url2image->execute();
_p($url2image->preview('image'), true);

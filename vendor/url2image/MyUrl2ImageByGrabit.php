<?php
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('max_execution_time', -1); // Replace 60 with the number of seconds you want to set as the maximum execution time

require_once('helper.php');
require('vendor/autoload.php');
require_once('MyUrl2ImageMain.php');

class MyUrl2ImageByGrabit extends MyUrl2ImageMain
{
      private $attributes = [];
      public function __construct($attributes = array())
      {
            parent::__construct($attributes);
            $this->attributes = $attributes;
      }

      function execute()
      {
            // $this->grabzIt = new \GrabzIt\GrabzItClient("MmMxOTg0NGZlYzczNDFhOWFkYmUwODBjY2ZhMDYyYzA=", "Pz8/Fj9hZlwyPz8/Wj8EP3d5Pz8/VD8LVlg/Pz8aBAY=");//mine
            $this->grabzIt = new \GrabzIt\GrabzItClient("MjU3MDMzMDZjYTlmNDkxZGE0Y2YyOTg5N2FmODE4YzE=", "Pz8/L015dj8+OXp1Pz8/bT4/HRw/P10/Nk97PVlEWS0=", array(
                  'cache' => true,
                  'cache_dir' => './path/to/cache/directory',
                  'cache_expiration' => 3600 // cache expiration time in seconds
              )); //client
            // _p($this->attributes);

            $this->grabzItOptions = new \GrabzIt\GrabzItImageOptions(); //client
            // $this->grabzItOptions->setQuality($this->attributes['quality']);
            // $this->grabzItOptions->setWidth($this->attributes['width']);
            // $this->grabzItOptions->setHeight($this->attributes['height']);
            // // $this->grabzItOptions->setDelay(15);
            // $this->grabzItOptions->setBrowserWidth($this->attributes['bwidth']);
            // $this->grabzItOptions->setBrowserHeight($this->attributes['bheight']);
            // $this->grabzItOptions->setAddress("sdfasdfasdfsfda");
            // _p($this->grabzItOptions);

            $url = $this->getUrl();
            $this->grabzIt->URLToImage($url, $this->grabzItOptions);
            $this->filename = $this->getDir() . $this->getFileName();
            $this->grabzIt->SaveTo($this->filename);
      }
      function preview($image = null)
      {
            return $this->info($image);
      }
}

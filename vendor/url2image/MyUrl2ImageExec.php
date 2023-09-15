<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once('helper.php');
require_once('MyUrl2ImageMain.php');
class MyUrl2ImageExec extends MyUrl2ImageMain
{
      public function __construct($attributes = array())
      {
            parent::__construct($attributes);
      }

      function command()
      {
            $width = $this->setTypeForConversion('width', $this->width);
            $height = $this->setTypeForConversion('height', $this->height);
            $quality = $this->setTypeForConversion('quality', $this->quality);
            $zoom = $this->setTypeForConversion('zoom', $this->zoom);
            $url = $this->getUrl();
            $this->filename = $this->getDir() . $this->getFileName();
            //wkhtmltoimage --javascript-delay 10000 --enable-plugins --width 1280 --height 1600  http://www.creationshop.com test.png
            $command = "wkhtmltoimage --javascript-delay 100000 $width $height $quality $zoom " . escapeshellarg($url) . " $this->filename";
            return $command;
      }

      function execute()
      {
            $command = $this->command();
            _p($command);
            $rs = null;
            exec($command, $output, $rs);
            // $output = shell_exec($command);
            if ($output)  _p([$rs, $output]);

            return $this->info();
      }
}

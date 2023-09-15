<?php
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('max_execution_time', -1); // Replace 60 with the number of seconds you want to set as the maximum execution time

require_once('helper.php');
require_once('MyUrl2ImageMain.php');
class MyUrl2ImageFilePutContent extends MyUrl2ImageMain
{
      public function __construct($attributes = array())
      {
            parent::__construct($attributes);
      }

      function file_get_contents_curl($url) {
            $ch = curl_init();
          
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
          
            $data = curl_exec($ch);
            curl_close($ch);
          
            return $data;
        }
      function execute()
      {            
            $data = $this->file_get_contents_curl($this->getUrl());
            _p($data);
            $this->filename = $this->getDir() . $this->getFileName();
            // file_put_contents($this->filename, $this->file_get_contents_curl($url));
            return $this->info();
      }
}

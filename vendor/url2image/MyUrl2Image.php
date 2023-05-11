<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once('helper.php');
require('vendor/autoload.php');


class MyUrl2Image
{
      public $attributes = [];
      public $obj = null;
      public function __construct($attributes = array())
      {
            $this->attributes = $attributes;
      }

      public function execute()
      {
            if ($this->attributes['algo'] == 'exec') {
                  $this->obj = new MyUrl2ImageExec($this->attributes);
            }
            if ($this->attributes['algo']  == 'grabit') {
                  $this->obj = new MyUrl2ImageByGrabit($this->attributes);
            }
            if ($this->attributes['algo']  == 'curl') {
                  $this->obj = new MyUrl2ImageFilePutContent($this->attributes);
            }
            $this->obj->execute();
      }

      public function preview()
      {
            $this->obj->preview();
      }
}

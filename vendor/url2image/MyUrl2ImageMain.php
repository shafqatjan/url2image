<?php
class MyUrl2ImageMain
{
      // Properties
      public $url;
      public $width;
      public $height;
      public $quality;
      public $zoom;
      public $image_type;
      public $filename;
      public $allowed_image_types = ["jpg", "jpeg", "png", "bmp"];
      public $link = 'http://url2image.test/';
      public $url_characters = [
            '%20' => ' ',
            '%21' => '!',
            '%22' => '"',
            '%23' => '#',
            '%24' => '$',
            '%25' => '%',
            '%26' => '&',
            '%27' => '\'',
            '%28' => '(',
            '%29' => ')',
            '%2A' => '*',
            '%2B' => '+',
            '%2C' => ',',
            '%2D' => '-',
            '%2E' => '.',
            '%2F' => '/',
            '%3A' => ':',
            '%3B' => ';',
            '%3C' => '<',
            '%3D' => '=',
            '%3E' => '>',
            '%3F' => '?',
            '%40' => '@'
      ];
      public $algo = '';
      public function __construct($attributes = array())
      {
            // Apply provided attribute values
            foreach ($attributes as $field => $value) {
                  $this->{$field} = $value;
            }
            $this->link = addHttp($_SERVER['SERVER_NAME']) . '/';
      }

      function __set($name, $value)
      {
            if (method_exists($this, $name)) {
                  $this->$name($value);
            } else {
                  // Getter/Setter not defined so set as property of object
                  $this->$name = $value;
            }
      }

      function __get($name)
      {
            if (method_exists($this, $name)) {
                  return $this->$name();
            } elseif (property_exists($this, $name)) {
                  // Getter/Setter not defined so return property if it exists
                  return $this->$name;
            }
            return null;
      }
      function setTypeForConversion($type, $val)
      {
            return !empty($val) ? "--$type $val" : '';
      }
      function getFileName()
      {
            return date('Y_m_d_H_i_s') . '_' . $this->algo . '.' . $this->image_type;
      }
      

      function getUrl()
      {
            $url = addHttp($this->url);
            // _p($url);

            $url = urldecode($url);
            foreach ($this->url_characters as $key => $chr) {
                  $url = str_replace($key, $chr, $url);
            }

            if (filter_var($url, FILTER_VALIDATE_URL)) {
                  return $url;
            } else {
                  _p("$url is not a valid URL");
            }
            // _p($url);
            return $url;
      }
      function getDir()
      {
            $folder = './images/';
            if (!file_exists($folder)) {
                  mkdir($folder, 0777, true);
                  chmod($folder, 0777);
            }
            if (!file_exists($folder . 'index.php')) {
                  file_put_contents($folder . 'index.php', "<h1>Invalid access</h1>");
            }
            $url = $this->getUrl();
            $parseURL = parse_url(urldecode($url));
            // _p($parseURL);
            if (isset($parseURL['host'])) {
                  $folder .= $parseURL['host'];

                  if (count($parseURL) > 0 && isset($folder)) {
                        if (!file_exists($folder)) {
                              mkdir($folder, 0777, true);
                              chmod($folder, 0777);
                        }
                        if (!file_exists($folder . '/index.php')) {
                              file_put_contents($folder . '/index.php', "<h1>Invalid access</h1>");
                        }
                  }
                  return $folder . '/';
            } else {
                  echo "Invalid URL: " . $url;
            }
      }

      function preview()
      {
            return "<br><img src='$this->filename' width='" . $this->width . "' height='" . $this->height . "'/>";
      }
      function info()
      {
            $url = $this->getUrl();

            return _p($this->algo . " URL: <a href='" . $url . "' target='_blank'>URL</a> has been converted to image: <a href='" . $this->link . $this->filename . "' target='_blank'>Image</a>");
      }
}

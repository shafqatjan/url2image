<?php
function _p($data, $exit = false)
{
      echo '<pre>';
      print_r($data);
      echo '</pre>';

      if ($exit) die();
}

function removeHttp($url)
{
      return preg_replace("#^[^:/.]*[:/]+#i", "", $url);
}
function addHttp($url)
{
      if (strpos('http://', $url) === FALSE) {
            $url = 'http://' . $url;
      }
      if (strpos('https://', $url) === FALSE) {
            $url = preg_replace("/^http:/i", "https:", $url);
      }
      return $url;
}
function urlExist($url)
{
      $file_headers = @get_headers($url);
      if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
      } else {
            $exists = true;
      }
      _p("URL EXIST " . $url . ' ' . $exists);
      return $exists;
}

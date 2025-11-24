<?php

define("URL_GEO", "http://ip-api.com/json/");

$opt = [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_CONNECTTIMEOUT => 10,
  CURLOPT_TIMEOUT => 10,
  CURLOPT_FAILONERROR => true,
  CURLOPT_FOLLOWLOCATION => false
];

/**
 * returns an array consisting of:
    country
    city
    lon
    lat
 * @param array $opt
 * @return array|string
 */
function getLocationModel(): array|string
{
  global $opt;
  $ipAddr = $_SERVER['REMOTE_ADDR'];
  echo $ipAddr;

  // get location
  $urlLocation = URL_GEO
    . urlencode($ipAddr)
    . "?fields=1065169";

  $cLocation = curl_init($urlLocation);
  curl_setopt_array($cLocation, $opt);
  $response = curl_exec($cLocation);
  $codeHttp = curl_getinfo($cLocation, CURLINFO_RESPONSE_CODE);

  if ($codeHttp != 200) {
    http_response_code($codeHttp);
    return "error - getLocationModel(): " . $codeHttp;
  }

  return json_decode($response, true);
}

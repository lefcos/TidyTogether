<?php

/**
 * Solved issue: for Romania, a user could type romania, ROU, roMaN, etc.
 * His input is directly written in the database. Bad design, too late to change.
 * 
 * Many thanks to: https://docs.countrystatecity.in/api/endpoints/get-cities-by-country
 */
final class PublicCountries {
  private static $data = null;

  /**
   * Keep read data as a singleton since the data is not subject to change.
   * 
   * Singleton method to retrieve the same data.
   */
  public static function get($path): array
  {
    if (self::$data) {
      return self::$data;
    }

    self::$data = PublicCountries::readFile($path);
    return self::$data;
  }

  /**
   * Reads the public database file about countries and cities.
   * Each country has a name and an array of city names.
   * These names will be used to create HTML dropdown,
   * making data clean and not prone to subjective variations.
   * 
   * Removes country and city duplicates.
   * 
   * 4MB of RAM memory will be occupied by this.
   */
  private static function readFile($path): array {
    $json = file_get_contents($path);
    $countries = json_decode($json, true);

    $countryToCities = [];
    foreach ($countries as $entry) {
      $country = $entry["name"];
      $cities  = $entry["cities"];

      $uniqueCities = array_unique($cities);
      $countryToCities[$country] = $uniqueCities;
      $countryToCities[$entry["name"]] = $entry["cities"];
    }

    return $countryToCities;
  }
}

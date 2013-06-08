<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsObject;


/**
 * Description of IdsObjectCountry
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsObjectCountry extends IdsObject {

  
  // Alternative name of the country. String.
  public $alternative_name;

  // Id of the country in the IDS collection.
  public $asset_id;

  // Regions. Array of regions (IdsObjectCategory). Regions to which this country belongs.
  public $category_region_array;  

  // ISO number. Example: 50 (Bangladesh).
  public $iso_number;

  // ISO three-letter code. Example: BGD (Bangladesh).
  public $iso_three_letter_code;

  // ISO two-letter code. Example: BD (Bangladesh).
  public $iso_two_letter_code;

  /**
   * Constructor.
   */
  function __construct($object) {
    parent::__construct($object);
    if (isset($object['alternative_name'])) {
      $this->alternative_name = $object['alternative_name'];
    }
    if (isset($object['asset_id'])) {
      $this->asset_id = $object['asset_id'];
    }
    if (isset($object['category_region_array'])) {
      $this->category_region_array = build_array_categories($object['category_region_array']);
    }  
    if (isset($object['iso_number'])) {
      $this->iso_number = $object['iso_number'];
    }
    if (isset($object['iso_three_letter_code'])) {
      $this->iso_three_letter_code = $object['iso_three_letter_code'];
    }
    if (isset($object['iso_two_letter_code'])) {
      $this->iso_two_letter_code = $object['iso_two_letter_code'];
    }  
  }

}

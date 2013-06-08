<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsObject;

/**
 * Description of IdsObjectAsset
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsObjectAsset extends IdsObject {

  // Asset identifier (for example, 12345).
  public $asset_id;

  // Creation date. String. (Example: 2012-02-09 14:36:21). Date in which the object was added to the collection.
  public $date_created;

  // Modification date. String. (Example: 2012-02-09 14:36:21). Date in which the object was last modified.
  public $date_updated;

  // Themes. Array of themes (IdsObjectCategory). Thematic categories which apply to the document or organisation.
  public $category_theme_array;

  // Regions. Array of regions (IdsObjectCategory). Regions in which the organisation operates or which apply to the document.
  public $category_region_array;

  // Countries. Array of countries (IdsObjectCountry). Countries in which the organisation operates or which apply to the document.
  public $country_focus_array;

  // Keywords. Array of strings. Subject keywords that relate to the asset.
  public $keywords;

  // Description. String. Description of the document or organisation.
  public $description;


  /**
   * Constructor.
   */
  public function __construct($object) {
    parent::__construct($object);
    if (isset($object['asset_id'])) {
      $this->asset_id = $object['asset_id'];
    }
    if (isset($object['date_created'])) {
      $this->date_created = strtotime($object['date_created']);
    }
    if (isset($object['date_updated'])) {
      $this->date_updated = strtotime($object['date_updated']);
    }
    if (isset($object['category_theme_array'])) {
      $this->category_theme_array = $this->build_array_categories($object['category_theme_array']);
    }
    if (isset($object['category_region_array'])) {
      $this->category_region_array = $this->build_array_categories($object['category_region_array']);;
    }
    if (isset($object['country_focus_array'])) {
      $this->country_focus_array = $this->build_array_countries($object['country_focus_array']);;
    }
    if (isset($object['keyword'])) {
      $this->keywords = $object['keyword'];
    }
    if (isset($object['description'])) {
      $this->description = $object['description'];
    }
  }

}

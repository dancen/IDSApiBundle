<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsObjectAsset;

/**
 * Description of IdsObjectAssetOrganization
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsObjectAssetOrganization extends IdsObjectAsset {

  
  // Acronym. String. Acronym of organisation.
  public $acronym;

  // Alternative acronym. String. Alternative acronym of organisation.
  public $alternative_acronym;

  // Alternative name. String. Alternative name of organisation.
  public $alternative_name;

  // Organisation type. String. Primary function or role of the organisation in relation to international development. 
  public $organisation_type;

  // Organisation URL. String. Link to the organisation's website.
  public $organisation_url;

  // Country where the organisation is located. String.
  public $location_country;

  // Is this needed? Organisation type id. String. Numerical ID of the organisation type.
  // public $organisation_type_id;

  // Is this needed? It's only present in organisations. publication_date in documents has another meaning.
  //public $asset_publication_date;

  /**
   * Constructor.
   */
  public function __construct($object) {
    parent::__construct($object);
    if (isset($object['acronym'])) {
      $this->acronym = $object['acronym'];
    }
    if (isset($object['alternative_acronym'])) {
      $this->alternative_acronym = $object['alternative_acronym'];
    }
    if (isset($object['alternative_name'])) {
      $this->alternative_name = $object['alternative_name'];
    }
    if (isset($object['organisation_type'])) {
      $this->organisation_type = $object['organisation_type'];
    }
    if (isset($object['organisation_url'])) {
      $this->organisation_url = $object['organisation_url'];
    }
    if (isset($object['location_country'])) {
      $this->location_country = $object['location_country'];
    }
  }

}

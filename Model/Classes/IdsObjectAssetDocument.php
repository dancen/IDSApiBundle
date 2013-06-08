<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsObjectAsset;

/**
 * Description of IdsObjectAssetDocument
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsObjectAssetDocument extends IdsObjectAsset {

   // Authors (First initial. Surname). Array of strings. 
  public $authors;

  // Language. String. The language in which the title, headline and description are written.
  public $language_name;

  // Publication date. Date (example: 2004-01-01 00:00:00). Year that the research document was first published.
  public $publication_date;
  
  // Publication Year that the research document was first published.
  public $publication_year;
  
  // Publisher
  public $publisher;

  // Publishers. Array of IdsObjectAssetOrganisation. Organisations that published the research.
  public $publisher_array;

  // Licence type. String.
  // This is not documented. Will not be used? It's now being retrieved with the documents' data.
  public $licence_type;

  // External URLs. Array of strings. URLs of the full text document. 
  public $urls;

  // Headline. String. A short version of the title or description of the research document.
  // [Is not being returned by the API?]
  // public $headline;

  /**
   * Constructor.
   */
  public function __construct($object) {
    parent::__construct($object);
    if (isset($object['author'])) {
      $this->authors = $object['author'];
    }
    if (isset($object['language_name'])) {
      $this->language_name = $object['language_name'];
    }
    if (isset($object['publication_date'])) {
      $this->publication_date = strtotime($object['publication_date']);
    }
    if (isset($object['publication_year'])) {
      $this->publication_year = $object['publication_year'];
    }
    if (isset($object['publisher'])) {
      $this->publisher = $object['publisher'];
    }
    if (isset($object['publisher_array'])) {
      $this->publisher_array = $this->build_array_organisations($object['publisher_array']);
    }
    if (isset($object['licence_type'])) {
      $this->licence_type = $object['licence_type'];
    }
    if (isset($object['urls'])) {
      $this->urls = $object['urls'];
    }
  }

}

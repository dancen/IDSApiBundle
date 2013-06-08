<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsObject;


/**
 * Description of IdsObjectCategory
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsObjectCategory extends IdsObject {

 
  // Level of the category in the hierarchy.
  public $level;

  // Id of the parent category.
  public $cat_parent;

  // Id of the superparent category. '2' represents the root level.
  public $cat_superparent;

  // Id of the category. It's a numerical code of the category. 
  public $category_id;

  // Indicates if the category is archived.
  public $archived = FALSE;
  
  // Indicates if the category is archived.
  public $children_object_array;

  /**
   * Constructor.
   */
  function __construct($object) {
    parent::__construct($object);
    if (isset($object['category_id'])) {
      $this->category_id = $object['category_id'];
    }
    if (isset($object['level'])) {
      $this->level = $object['level'];
    }
    if (isset($object['cat_parent'])) {
      $this->cat_parent = $object['cat_parent'];
    }
    if (isset($object['cat_superparent'])) {
      $this->cat_superparent = $object['cat_superparent'];
    }
    if (isset($object['archived'])) {
      $this->archived = $object['archived'];
    }
    if (isset($object['object_name'])) {
      $this->name = $object['object_name'];
    }
    if (isset($object['children_object_array'])) {
      $this->children_object_array = $object['children_object_array'];
    }
  }

}

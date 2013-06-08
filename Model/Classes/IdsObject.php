<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsObjectAsset;
use IDS\ApiBundle\Model\Classes\IdsObjectAssetDocument;
use IDS\ApiBundle\Model\Classes\IdsObjectAssetOrganization;
use IDS\ApiBundle\Model\Classes\IdsObjectCategory;
use IDS\ApiBundle\Model\Classes\IdsObjectCountry;


/**
 * Description of IdsObject
 *
 * @author <daniele.centamore@gmail.com>
 */
class IdsObject {

    // Unique identifier of this object (for example, A1417)
    public $object_id;
    // Type of object. String. (Document, Publication, Theme, Region, Country).
    public $object_type;
    // Readable identifier of this object.
    public $title;
    // Dataset (eldis or bridge).
    public $site;
    // Web-accessible uri for this object 
    public $metadata_url;
    // Indicates when record was indexed in the API.
    public $timestamp;
    // URL for the asset on the collection website.
    public $website_url;
    // Name of the object.
    // [Is name = title always???]
    public $name;

    /**
     * Factory method used to create IdsObject objects, depending on its type.
     *
     * @return a new IdsObject object
     */
    public static function factory($object, $format, $object_type) {
        if ($format === 'full') {
            switch ($object_type) {
                case 'assets':
                    return new IdsObjectAsset($object);
                case 'documents':
                    return new IdsObjectAssetDocument($object);
                case 'organisations':
                    return new IdsObjectAssetOrganization($object);
                case 'themes':
                    return new IdsObjectCategory($object);
                case 'regions':
                    return new IdsObjectCategory($object);
                case 'countries':
                    return new IdsObjectCountry($object);
            }
        } else {
            return new IdsObject($object);
        }
    }

    /**
     * Constructor.
     */
    public function __construct($object) {
        
        // Basic fields, present always in all responses.
        $this->object_id = $object['object_id'];
        $this->object_type = $object['object_type'];
        $this->metadata_url = $object['metadata_url'];
        // Additional properties common to all objects that might be present.

        if (isset($object['site'])) {
            $this->site = $object['site'];
        }
        if (isset($object['title'])) {
            $this->title = $object['title'];
        }
        if (isset($object['timestamp'])) {
            $this->timestamp = $object['timestamp'];
        }
        if (isset($object['website_url'])) {
            $this->website_url = $object['website_url'];
        }
        if (isset($object['name'])) {
            $this->name = $object['name'];
        } elseif (isset($object['object_name'])) {
            $this->name = $object['object_name'];
        }
    }

    protected function build_array_categories($array_categories) {
        $categories = array();
        foreach (current($array_categories) as $key => $category) {
            $categories[] = new IdsObjectCategory($category);
        }
        return $categories;
    }

    protected function build_array_countries($array_countries) {
        $countries = array();
        foreach (current($array_countries) as $key => $country) {
            $countries[] = new IdsObjectCountry($country);
        }
        return $countries;
    }

    protected function build_array_organisations($array_organisations) {
        $organisations = array();
        foreach (current($array_organisations) as $key => $organisation) {
            $organisations[] = new IdsObjectAssetOrganization($organisation);
        }
        return $organisations;
    }

}

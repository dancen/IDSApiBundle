<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsObject;

/**
 * Description of IdsResponse
 *
 * @author <daniele.centamore@gmail.com>
 */
class IdsResponse {

    // Results. Array of IdsObject (or its subclasses).
    public $results = array();
    // Total results. Number of total available results in the collection.
    public $total_results;
    // response errors.
    private $errors = false;
    // previous page
    private $previous_page = null;
    // next page
    private $next_page = null;
    // page size
    public $page_size = null;
    // current page
    public $current = null;
    // uri
    private $uri = null;
    // last page
    public $last_page = null;
    

    /**
     * Constructor.
     * 
     * Receives an array with the decoded output of the API call.
     * Is called by IdsApi->makeRequest().
     */
    function __construct($results, $format, $type_results, $total_results, $default_site, $previous_page, $next_page, $pagesize, $current) {

        
        $this->previous_page = $previous_page;
        $this->next_page = $next_page;
        $this->page_size = $pagesize;
        $this->current = $current;
        
        
        foreach ($results as $object) {
            if (!isset($object['site'])) {
                $object['site'] = $default_site;
            }
            $ids_api_object = IdsObject::factory($object, $format, $type_results);
            array_push($this->results, $ids_api_object);
        }
        if (isset($total_results)) {
            $this->total_results = $total_results;
        }
        
        
    }

   
   
    
    
    
    /**
     * set Errors
     */
    public function setUri($uri){
        return $this->uri = $uri;
    }
    
    
    
    /**
     * get Errors
     */
    public function getUri(){
        return $this->uri;
    }
    
    
    
    /**
     * set Errors
     */
    public function setErrors($err){
        return $this->errors = $err;
    }
       
    
    /**
     * get Errors
     */
    public function getErrors(){
        return $this->errors;
    }
    
    /**
     * check Errors
     */
    public function hasErrors(){
        return $this->errors;
    }
    
    
   
    /**
     * get response object
     */
    public function getObject(){
        return $this;
    }
    
    /**
     * get last page
     */
    public function getLastPage(){
        if( $this->page_size > 1) {
           return ceil($this->total_results/$this->page_size)+1;
        } else {
           return 1; 
        }
    }
    
      

}
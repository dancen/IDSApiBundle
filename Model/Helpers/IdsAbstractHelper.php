<?php

namespace IDS\ApiBundle\Model\Helpers;

use IDS\ApiBundle\Model\IdsFactory;

/**
 * Description of IdsAbstractHelper
 *
 * @author <daniele.centamore@gmail.com>
 */

abstract class IdsAbstractHelper  {

    protected $idsapi;
    
    protected $uri;
    
    // html page
    private $output_page = null;
    
    public function __construct() {
        $this->idsapi = IdsFactory::create();
    }
    
        
    
    /**
      * set number of records to retrieve
      */
     protected function setNumRequest($v){
         $this->idsapi->setNumRequested($v);
     }
     
     /**
      * set type of idsapi search, get, get_all etc..
      */     
     protected function setTypeRequest($v){
         $this->idsapi->setTypeRequest($v);
     }
     
     /**
      * set type of of object documents, theme etc..
      */ 
     protected function setObjectType($v){
         $this->idsapi->setObjectType($v);
     }
     
     /**
      * set format short or full
      */ 
     protected function setFormat($v){
         $this->idsapi->setFormat($v);
     }
     
     
     /**
      * set site eldis or bridge
      */ 
     protected function setSite($v){
         $this->idsapi->setSite($v);
     }
     
    
     public function getObject(){
         return $this->idsapi;
     }
     
     /**
      * 
      * @return response object 
      */
     public function getResponse(){           
         
            $response = $this->idsapi->makeRequest();
            $response->setUri($this->uri);
            return $response;            
            
     }
     
     
      /**
     * set Errors
     */
    public function setOutputPage($page){
        return $this->output_page = $page;
    }
    
    
    
    /**
     * get Errors
     */
    public function getOutputPage(){
        return $this->output_page;
    }


}

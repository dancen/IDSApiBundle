<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsResponseFactory;

/**
 * Description of IdsAPI
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsAPI {

    
    protected $api_key;
    
    protected $api_key_par = '_token_guid';
    
    protected $response;
    
    protected $api_documentation_url = 'http://api.ids.ac.uk/docs/';
    
    protected $api_key_url = 'http://api.ids.ac.uk/accounts/register/';
    
    protected $api_home_url = 'http://api.ids.ac.uk/';
    
    // The number of results to return, as requested.
    protected $num_requested = 0;    
        
    // The index of the result to start from. If not specified then a value of 0 is used.
    protected $start_offset;
    
    // The age of results to return (not older than the number of days specified by this attribute).
    // If not specified it is ignored.
    protected $age_results;    
    
    protected $query;
        
    protected $query_string;
    
    // From where to get the information: eldis, bridge. Default is the defined default (eldis).
    protected $site = 'eldis';
    
    // Type of request.
    protected $type_request = 'search';
       
    // Identifier of the object being requested.
    protected $object_id;
    
    // Type of object(s) requested: assets, documents, organisations, themes, regions, countries
    protected $object_type;
    
    // Format of the response: id, short, full. If not specified, the defined default (short) is used.
    protected $format = 'full';
    
    // Parameters to be added to the request. Use IdsAPI->setSearchParam() to set.
    public $search_params = array();
       
    // The URL of the request.
    protected $url = 'http://api.ids.ac.uk/openapi/';   
    
    // total number of results
    protected $total_results;
    
    // url next page
    protected $next_page;
    
    // url previous page
    protected $previous_page;
    
    // results
    protected $results;  
    
    // extra fields
    protected $extra_fields;  
    
    // web site url
    protected $web_site_url;  
    
    // errors
    protected $errors = false;  
    
    // current page
    protected $current = 0;  
    
    // sort order
    protected $sort_order = 0;  

    
    // default type request
    public $ids_default_type_request = 'search';
    
    // default type search
    public $ids_default_type_search = 'search';
    
    // default type get all
    public $ids_default_type_get_all = 'get_all';
    
    // default type theme
    public $ids_default_type_theme = 'theme';  
    
    // debug flag shows ids uri connection
    protected $debug = false;  
    
    
    public function __construct( ) {}
    
    
    /**
     * accessor methods
     *  
     */   
    
        
    public function setDebug($debug){
        $this->debug = $debug;
    }
    
    public function getDebug(){
        return $this->debug;
    }  
    
    
    public function setSortOrder($order){
        $this->sort_order = $order;
    }
    
    public function getSortOrder(){
        return $this->sort_order;
    }  
    
    
    public function setCurrentPage($page){
        $this->current = $page;
    }
    
    public function getCurrentPage(){
        return $this->current;
    }  
   
    public function setErrors($flag){
        $this->errors = $flag;
    }
    
    public function hasErrors(){
        return $this->errors;
    }     
    
    public function setWebSiteUrl($web_site_url){
        $this->web_site_url = $web_site_url;
    }
    
    public function getWebSiteUrl(){
        return $this->web_site_url;
    }     
    
    public function setExtraFields($extra_fields){
        $this->extra_fields = $extra_fields;
    }
    
    public function getExtraFields(){
        return $this->extra_fields;
    }     
    
    public function setResults($results){
        $this->results = $results;
    }
    
    public function getResults(){
        return $this->results;
    }         
    
    public function setNextPage($next_page){
        $this->next_page = $next_page;
    }
    
    public function getNextPage(){
        return $this->next_page;
    }   
    
    public function setPreviousPage($previous_page){
        $this->previous_page = $previous_page;
    }
    
    public function getPreviousPage(){
        return $this->previous_page;
    }     
    
    public function setTotalResults($total_results){
        $this->total_results = $total_results;
    }
    
    public function getTotalResults(){
        return $this->total_results;
    } 
    
    public function setSearchParams($search_params){
        $this->search_params = $search_params;
    }
    
    public function getSearchParams(){
        return $this->search_params;
    }     
    
    public function setApiKey($api_key){
        $this->api_key = $api_key;
    }
    
    public function getApiKey(){
        return $this->api_key;
    }   
    
    public function setApiKeyPar($api_key_par){
        $this->api_key_par = $api_key_par;
    }
    
    public function getApiKeyPar(){
        return $this->api_key_par;
    }
    
    public function setResponse($response){
        $this->response = $response;
    }
    
    public function getResponse(){
        return $this->response;
    }
           
    public function setNumRequested($num_requested){
        $this->num_requested = $num_requested;
    }
    
    public function getNumRequested(){
        return $this->num_requested;
    }            
        
    public function setStartOffset($start_offset){
        $this->start_offset = $start_offset;
    }
    
    public function getStartOffset(){
        return $this->start_offset;
    }        
    
    public function setAgeResult($age_results){
        $this->age_results = $age_results;
    }
    
    public function getAgeResult(){
        return $this->age_results;
    }    
    
    public function setQuery($query){
        $this->query = $query;
    }
    
    public function getQuery(){
        return $this->query;
    } 
        
    public function setQueryString($query_string){
        $this->query_string = $query_string;
    }
    
    public function getQueryString(){
        return $this->query_string;
    }        
    
    public function setSite($site){
        $this->site = $site;
    }
    
    public function getSite(){
        return $this->site;
    }    
    
    public function setTypeRequest($type_request){
        $this->type_request = $type_request;
    }
    
    public function getTypeRequest(){
        return $this->type_request;
    }    
    
    public function setObjectId($object_id){
        $this->object_id = $object_id;
    }
    
    public function getObjectId(){
        return $this->object_id;
    }    
    
    public function setObjectType($object_type){
        $this->object_type = $object_type;
    }
    
    public function getObjectType(){
        return $this->object_type;
    }    
    
    public function setFormat($format){
        $this->format = $format;
        
        // if format is short set the extrafields website_url
        if($format=="short"){
            $this->setExtraFields("website_url");
        }
    }
    
    public function getFormat(){
        return $this->format;
    }
    
    public function setUrl($url){
        $this->url = $url;
    }
    
    public function getUrl(){
        return $this->url;
    }   

    /**
     * Adds a search parameter.
     *
    public function setSearchParam($key, $value) {
        $this->search_params[$key] = $value;
     */
    public function setSearchParam($key, $value) {
        $this->search_params[$key] = $value;
    }

    /**
     * Generates a query string based on the encoded search parameters.
     *
     */
    protected function queryString() {
        
        $search_params = $this->getSearchParams();
        
        if (!empty($search_params)) {
            $params = array();
            foreach ($search_params as $k => $v) {
                $params[] = $k . '=' . rawurlencode($v);
            }
            $this->setQuery(implode('&', $params));
        }
        
        return $this->getQuery();
    }

    /**
     * Builds the request path based on the object parameters.
     * Path: {site}/{type of request}/{object type}/[object id/]{format}
     */
    protected function setPath() {
        
        $path = $this->getSite();
        $type = $this->getTypeRequest();
        $format = $this->getFormat();
        $object_type = $this->getObjectType();
        $object_id = $this->getObjectId();
        
        if (isset($type)) {
            $path .= '/' . $type;
        }
        if (isset($object_type)) {
            $path .= '/' . $object_type;
        }
        if (isset($object_id)) {
            $path .= '/' . $object_id;
        }
        if (isset($format)) {
            $path .= '/' . $format;
        }
        return $path;
    }

    /**
     * Builds the request URL, including the key and encoding the query string.
     * URL: {base url}/{site}/{type of request}/{object type}/[object id/]{format}
     */
    protected function buildUrl() {
              
        $this->setQueryString($this->queryString());        
    
        $url = $this->getUrl();

        $url .= $this->setPath() . '?' . $this->getApiKeyPar() . '=' . $this->getApiKey();

        if (($this->getTypeRequest() === $this->ids_default_type_search) 
                || ($this->getTypeRequest() === $this->ids_default_type_get_all)) {
            
            if ($this->getAgeResult()) {
                $days = $this->getAgeResult() . ' days';
                $today = date_create();
                $date = date_sub($today, date_interval_create_from_date_string($days));
                $metadata_published_after = date_format($date, 'Y-m-d');
                $url .= '&' . 'metadata_published_after=' . $metadata_published_after;
            }
            
            if ($this->getQueryString()) {
                $url .= '&' . $this->getQueryString();
            }
            
            if ($this->getNumRequested()) {
                $url .= '&' . 'num_results=' . $this->getNumRequested();
            }
            
            $offset = ($this->getCurrentPage()-1)*$this->getNumRequested();
            if($offset<0){$offset=0;}
            $this->setStartOffset($offset);
            
            
                       
            if ($this->getStartOffset()) {
                $url .= '&' . 'start_offset=' . $this->getStartOffset();
            }
            
            if ($this->getExtraFields()) {
                $url .= '&' . 'extra_fields=' . $this->getExtraFields();
            }
            
            if ($this->getSortOrder()) {
                $url .= '&' . 'sort_desc=' . $this->getSortOrder();
            }
            
            
            
        }        
        
             
        $this->setUrl($url);    
        

    }

    
    /**
     *
     * Format of the URL calls (not using 'friendly names' for the time being):
     * Get:     {base_url}/{site}/get/{object type}/{object id}/{format}?{key}
     * Get all: {base_url}/{site}/get_all/{object_type}/{format}?{key}
     * Search:  {base_url}/{site}/search/{object type}/{format}?{key}&{query}
     * Count: {base_url}/{site}/count/{object type}?{key}&{query}
     *
     */
    public function makeRequest() {
        
        // Builds the URL.
        $this->buildUrl();
              
        list($results, $total_results) = $this->getDecodedResults($this->getUrl(), 0);
           
        // Create an IdsResponse and return it.
        if (!$results) {
            $results = array();
            $total_results = 0;
        } elseif (!isset($results[0])) {
            $results = array($results);
        }       

        $response = IdsResponseFactory::create($results,
                                               $this->getFormat(),
                                               $this->getObjectType(),
                                               $this->getTotalResults(),
                                               $this->getSite(),
                                               $this->getPreviousPage(),
                                               $this->getNextPage(),
                                               $this->getNumRequested(),
                                               $this->getCurrentPage());
        
        if($this->hasErrors()){ $response->setErrors(true); }
        return $response;
    }

    /**
     * Makes the actual API calls, implementing pagination and returning the decoded data.
     */
    protected function getDecodedResults($url, $num_retrieved) {

       $response = $this->connect($url);               

        if ($response) {

            $data = json_decode($response, true);
            

            if (is_array($data)) {

                $results = $data['results'];               
                                                
                $this->setResults($results);
                              

                if (array_key_exists('metadata', $data)) {

                    $metadata = $data['metadata'];                   

                    $total_results = $metadata['total_results'];
                    $this->setTotalResults($total_results);                                       

                    $num_results = count($results);
                    $num_retrieved += $num_results;
                    
                    if (isset($metadata['previous_page'])) {
                         $this->setPreviousPage($metadata['previous_page']);
                    } 
                    
                    if (isset($metadata['next_page'])) {
                         $this->setNextPage($metadata['next_page']);
                    } 
                    
                } elseif (isset($results)) {
                    $total_results = 1;
                }
                
                return array($results, $total_results);
                    
            } else {
                $this->setErrors(true);
            }
        } else {
            $this->setErrors(true);
        }
        return FALSE;
    }

   
   private function connect($url){
       
           
       $response = null;
       
       if($this->getDebug()===true){ $this->debug(); }
       
        try{            
                     
	   $opts = array(
                'http' => array(
                    'method'=>"GET",
                    'header'=>"Content-Type: application/json; charset=utf-8"
                )
            );

            $context = stream_context_create($opts);
            @$response = file_get_contents($url,false,$context);            
           
        } catch(\Exception $e){ $this->setErrors(true); }
       return $response;
       
              
        
   }
   
   
   public function debug(){
       echo "<div><a href='".$this->url."'>".$this->url."</a></div><br>";
   }
   
   
   


}
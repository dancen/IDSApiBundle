<?php

namespace IDS\ApiBundle\Model\Classes;

use IDS\ApiBundle\Model\Classes\IdsResponse;

/**
 * Description of IdsResponseFactory
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsResponseFactory {
    
    /**
     * return a IdsResponse object.
     */
    
    public static function create($results,
                                  $format,
                                  $type_results,
                                  $total_results,
                                  $default_site,
                                  $previous_page,
                                  $next_page,
                                  $num_requested,
                                  $current_page){
        
           return new IdsResponse($results,
                                  $format,
                                  $type_results,
                                  $total_results,
                                  $default_site,
                                  $previous_page,
                                  $next_page,
                                  $num_requested,
                                  $current_page);
   }
   
}


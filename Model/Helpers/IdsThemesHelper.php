<?php

namespace IDS\ApiBundle\Model\Helpers;

use IDS\ApiBundle\Model\Helpers\IdsAbstractHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of IdsThemesHelper
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsThemesHelper extends IdsAbstractHelper {


    
      public function __construct( ContainerInterface $container, $key ) {
          
           parent::__construct();   
           
          /**
           * set default values
           */  

          $request = $container->get('request');
          $uri = $request->server->get('REQUEST_URI');
          $host = $request->server->get('HTTP_HOST');
          $uri = 'http://'.$host.''.$uri;
         
          
           /**
           * the debug mode shows the url ids calls
           */
          $this->idsapi->setDebug(true);
          
          /**
           * set the api key stored in the config.yml
           */
          $this->idsapi->setApiKey($key);
          
          /**
           * set the request type ( search, get, get_all )
           */
          $this->idsapi->setTypeRequest('get_all');
          
          /**
           * set the object type 
           */
          $this->idsapi->setObjectType('themes');
           
          /**
           * set the site ( eldis or bridge )
           */
          $this->idsapi->setSite('eldis');
          
          /**
           * set the uri
           */
          $this->uri = $uri;
          
           /**
           * return the helper object
           */
          return $this;
          
          
      }      
      
      
      
     
             
     
}

<?php

namespace IDS\ApiBundle\Model\Helpers;

use IDS\ApiBundle\Model\Helpers\IdsAbstractHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of IdsAllHelper
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsAllHelper extends IdsAbstractHelper {


    
      public function __construct( ContainerInterface $container, $key ) {
          
          parent::__construct();
          
          
          /**
           * set parameters from the request
           */ 
          $request = $container->get('request');
          
          $tag = $request->get('q');
          $current = $request->get('ids_page');
          
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
           * set the current page
           */
          $this->idsapi->setCurrentPage($current);
          
          /**
           * set the number of items retrieved per page
           */
          $this->idsapi->setNumRequested(200);
          
          /**
           * set the request type ( search, get, get_all )
           */
          $this->idsapi->setTypeRequest('search');
          
          /**
           * set the object type 
           */
          $this->idsapi->setObjectType('documents');
          
          /**
           * set the field for the order option
           */
          $this->idsapi->setSortOrder('publication_date');
          
          /**
           * set the data format ( short or full )
           */
          $this->idsapi->setFormat('short');
          
          /**
           * set the site ( eldis or bridge )
           */
          $this->idsapi->setSite('eldis');
          
          /**
           * set the keyword to search
           */
          $this->idsapi->setSearchParam('q', $tag);
          
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

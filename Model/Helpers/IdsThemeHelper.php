<?php

namespace IDS\ApiBundle\Model\Helpers;

use IDS\ApiBundle\Model\Helpers\IdsAbstractHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of IdsThemeHelper
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsThemeHelper extends IdsAbstractHelper {


    
      public function __construct( ContainerInterface $container, $key ) {
          
          parent::__construct();       
          
          /**
           * set default values
           */  

          $request = $container->get('request');
          $current = $request->get('ids_page');
          $object_id = $request->get('ID');
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
          $this->idsapi->setNumRequested(20);
          
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
          $this->idsapi->setFormat('full');
          
          /**
           * set the site ( eldis or bridge )
           */
          $this->idsapi->setSite('eldis');
          
          /**
           * set the keyword to search
           */
          $this->idsapi->setSearchParam('theme', $object_id);
          
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

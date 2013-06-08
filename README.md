IDS ApiBundle - A connector to the IDS service system
==============================

In order to use the service you need to obtain a valid API Key.
The bundle permit to connect and retrieve information from the IDS Service using the IDS KS Api.
More information about the service: IDS KS API Documentation: http://api.ids.ac.uk/docs/


Usage
-----

There are several ways to use the service to retrieve information
Query calls are base on URLs and there are different type of calls methods
look at the documentation:

http://api.ids.ac.uk/docs/functions/

The bundle provides some retriving functions based on services and controllers:

Default Controller:
http://api.ids.ac.uk/openapi/eldis/search/documents/full?_token_guid=[ put your key here ]&q=[ put your keyword here ]&num_results=20&sort_desc=publication_date

Theme Controller:
http://api.ids.ac.uk/openapi/eldis/get_all/themes/full?_token_guid=[ put your key here ]

Region Controller:
http://api.ids.ac.uk/openapi/eldis/get_all/regions/full?_token_guid=[ put your key here ]

You can extends the query search capability just creating or modifying the controllers


```php
<?php

namespace IDS\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegionController extends Controller
{
         
          public function regionsAction(){    
        
                // creating an helper calling the "ids_regions_helper" service
                $helper = $this->get('ids_regions_helper');
        
                    // tip: you can create your own helper by estending the IdsAbstractHelper class
                    //      and creating a new service in service.yml, then you can call your  
                    //      service in a new controller and showing data in a new twig file. 

                // return an "Response" object
                $response = $helper->getResponse();        
            
                // return a twig page to show data
                return $this->render('IDSApiBundle:Default:regions.html.twig', array('response' => $response));  
         
           }     

```

Implementation
-----

Currently the bundle provide the following query:

    http://api.ids.ac.uk/openapi/eldis/search/documents/full? .... 

    http://api.ids.ac.uk/openapi/eldis/get/documents/A65078/full? ...

    http://api.ids.ac.uk/openapi/eldis/search/documents/short? ...

    http://api.ids.ac.uk/openapi/eldis/get_all/themes/full? ...

    http://api.ids.ac.uk/openapi/eldis/get_all/regions/full? ...

TODO:

    http://api.ids.ac.uk/openapi/eldis/get/countries/A1078? ...

    http://api.ids.ac.uk/openapi/eldis/search/documents/?country=Angola ...

    http://api.ids.ac.uk/openapi/eldis/fieldlist ...

    http://api.ids.ac.uk/openapi/eldis/search/organisations/? ...

License
-------

IDS KS Api is licensed under the MIT License - see the `LICENSE` file for details


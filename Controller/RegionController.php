<?php
 /**
  * ids search implementation
  * @author     Daniele Centamore <daniele.centamore@gmail.com>
  */     
namespace IDS\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RegionController extends Controller
{
    public function indexAction()
    {                                    
         return $this->render('IDSApiBundle:Default:index.html.twig');            
    }
    
   
    
    public function regionsAction(){        
           
            $helper = $this->get('ids_regions_helper');
            $response = $helper->getResponse();        
            
        return $this->render('IDSApiBundle:Default:regions.html.twig', array('response' => $response));       
        
    }
    
    public function regionAction(){        
           
            $helper = $this->get('ids_region_helper');
            $response = $helper->getResponse();        
            
        return $this->render('IDSApiBundle:Default:query.html.twig', array('response' => $response));       
        
    }
  
    
}

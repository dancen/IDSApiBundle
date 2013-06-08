<?php
 /**
  * ids search implementation
  * @author     Daniele Centamore <daniele.centamore@gmail.com>
  */     
namespace IDS\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ThemeController extends Controller
{
    public function indexAction()
    {                                    
         return $this->render('IDSApiBundle:Default:index.html.twig');            
    }
    
   
    public function themesAction(){  
        
            $helper = $this->get('ids_themes_helper');
            $response = $helper->getResponse();        
            
        return $this->render('IDSApiBundle:Default:themes.html.twig', array('response' => $response));       
        
    }
    
    public function themeAction(){   
        
            $helper = $this->get('ids_theme_helper');
            $response = $helper->getResponse();        
            
        return $this->render('IDSApiBundle:Default:query.html.twig', array('response' => $response));       
        
    }
    
  
            
    
    
    
}

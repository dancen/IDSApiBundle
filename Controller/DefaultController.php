<?php

/**
 * ids search implementation
 * @author     Daniele Centamore <daniele.centamore@gmail.com>
 */

namespace IDS\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('IDSApiBundle:Default:index.html.twig');
    }

    public function queryAction() {


        $ids_params = $this->getRequest()->get('ids_action');

        if ($ids_params == 'get_all') {

            $helper = $this->get('ids_all_helper');
            $response = $helper->getResponse();

            return $this->render('IDSApiBundle:Default:query_short.html.twig', array('response' => $response));
        } else if ($ids_params == 'get_one') {

            $helper = $this->get('ids_get_helper');
            $response = $helper->getResponse();

            return $this->render('IDSApiBundle:Default:query_one.html.twig', array('response' => $response));
        } else {

            $helper = $this->get('ids_default_helper');
            $response = $helper->getResponse();

            return $this->render('IDSApiBundle:Default:query.html.twig', array('response' => $response));
        }
    }

}

<?php

namespace IDS\ApiBundle\Model;

use IDS\ApiBundle\Model\Classes\IdsAPI;

/**
 * Description of IdsFactory
 *
 * @author <daniele.centamore@gmail.com>
 */

class IdsFactory {
    
    /**
     * return a IdsAPI object.
     */
    
    public static function create(){
        return new IdsAPI();
    }
}


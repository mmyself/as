<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

        return $this->_redirect($this->getHelper('url')->url(array(
            'module' => 'bidding', 'controller' => 'index', 'action' => 'index'
        ), 'default', true));
    }


}


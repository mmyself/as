<?php

class Bidding_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $biddingService = Bidding_Service_Bidding::getInstance();
        $biddingList    = $biddingService->fetchListAll();
        
        $this->view->biddingList   = $biddingList;
    }

    public function showAction()
    {
        // action body
        $id = $this->getRequest()->getParam('id');
    
        $biddingService = Bidding_Service_Bidding::getInstance();
        $bidding = $biddingService->fetchSingleById($id);
        
        if (!$bidding) 
        {
            return $this->_redirect($this->getHelper('url')->url(array(
                'module' => 'bidding', 'controller' => 'index', 'action' => 'index'
            ), 'default', true));
        }
        
        $this->view->bidding = $bidding;
    }

    public function userAction()
    {
        // action body
    }

    public function losAction()
    {
        // action body
    }

    public function positionAction()
    {
        // action body
    }


}










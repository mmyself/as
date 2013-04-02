<?php

class Bidding_AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function createAction()
	{
	    // get article service
	    $biddingService = Bidding_Service_Bidding::getInstance();

        $id = $biddingService->create($this->getRequest()->getPost());

        if ($id) {
            return $this->_redirect($this->getHelper('url')->url(array(
                'module' => 'bidding', 'controller' => 'admin', 
                'action' => 'update', 'id' => $id
            ), 'default', true));
        }
        

	    // get create form
	    $createForm = $biddingService->getForm('create');
        $createForm->setAction($this->getHelper('url')->url());

	    // pass create form to view
	    $this->view->createForm = $createForm;



	}


}


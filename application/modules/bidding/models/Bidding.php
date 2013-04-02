<?php

class Bidding_Model_Bidding
{
	protected $_id = null;
	protected $_date = null;
	protected $_user = null;
	protected $_title = null;
	protected $_teaser = null;
	protected $_text = null;

	public function setId($id) 
    {
        $id = (int) $id;
        
        if ($id != 0) {
            $this->_id = $id;
        } 
    }
    
    public function getId() 
    {
        return $this->_id;
    }
    
    public function setDate($date) 
    {
        if (is_string($date)) {
            $this->_date = $date;
        } 
    }
    
    public function getDate() 
    {
        return $this->_date;
    }
    
    public function setTitle($title) 
    {
        if (is_string($title)) {
            $this->_title = $title;
        } 
    }
    
    public function getTitle() 
    {
        return $this->_title;
    }

    public function setTeaser($teaser) 
    {
        if (is_string($teaser)) {
            $this->_teaser = $teaser;
        } 
    }
    
    public function getTeaser() 
    {
        return $this->_teaser;
    }

    public function setText($text) 
    {
        if (is_string($text)) {
            $this->_text = $text;
        } 
    }
    
    public function getText() 
    {
        return $this->_text;
    }


    public function toArray()
    {
        $data = array(
            'bidding_id'            => $this->getId(),
            'bidding_date'          => $this->getDate(),
            //'bidding_user'          => $this->getUser()->toArray(),
            'bidding_title'         => $this->getTitle(),
            'bidding_teaser'        => $this->getTeaser(),
            'bidding_text'          => $this->getText(),
        );
    
        return $data;
    }

}


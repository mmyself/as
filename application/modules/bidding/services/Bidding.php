<?php

	class Bidding_Service_Bidding
{
    protected static $_instance = null;
    protected $_forms   = array();
    
    public static function getInstance()
    {
        // check for current object for requested class object
        if (!isset(self::$_instance) || null === self::$_instance)
        {
            // set singleton instance
            self::$_instance = new Bidding_Service_Bidding;
        }
        
        // return service instance
        return self::$_instance;
    }
    
    protected $_mapper = null;
    
    protected $_items = 10;
    
    public function getBiddingMapper()
    {
        if (!isset($this->_mapper)) {
            $this->_mapper = new Bidding_Model_Mappers_Bidding();
        }
        
        return $this->_mapper;
    }
    
    public function fetchSingleById($id)
    {
        return $this->getBiddingMapper()->fetchSingle($id);
    }
    
    public function fetchListAll($page = 1, $items = null)
    {
        $biddingList = $this->getBiddingMapper()->fetchList();
        
        if (is_null($page))
        {
            $page = 1;
        }
        
        if (is_null($items))
        {
            $items = $this->_items;
        }
        
        return array_slice($biddingList, ($page - 1) * $items, $items);
    }
    
    public function pageListAll($page = 1, $items = null)
    {
        $biddingList = $this->getBiddingMapper()->fetchList();
        
        if (is_null($page))
        {
            $page = 1;
        }
        
        if (is_null($items))
        {
            $items = $this->_items;
        }
        
        return array(
            'max' => count($biddingList), 'current' => $page, 'step' => $items
        );
    }

    

    public function getForm($type)
    {
        if (!isset($this->_forms[$type])) {
            switch ($type) {
                case 'create':
                    $class = 'Bidding_Form_BiddingCreate';
                    break;
                default:
                    //throw new Company_Exception('unknown form');
                    echo "unknown form";
            }
            
            $this->_forms[$type] = new $class();
            
        }
        
        return $this->_forms[$type];
    }

    public function create(array $data)
    {
        if (empty($data) || is_null($data['submit_bidding_create'])) {
            return false;
        }

        if (!$this->getForm('create')->isValid($data)) {
            echo ('message_default_check_input');

            return false;
        }

        $cleanData = $this->getForm('create')->getValues();

        try {
            $id = $this->getBiddingMapper()->create($cleanData);
        } catch (Zend_Db_Exception $e) {
            echo ('message_bidding_bidding_notsaved');

            return false;
        }

        return $id;
    }
}

?>
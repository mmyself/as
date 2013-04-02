<?php

class Bidding_Model_DbTable_Los extends Zend_Db_Table_Abstract
{

    protected $_name = 'los';
    protected $_primary = 'los_id';
    protected $_dependentTables = array('Bidding_Model_DbTable_Bidding');

}


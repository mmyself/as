<?php

class Bidding_Model_DbTable_Bidding extends Zend_Db_Table_Abstract
{

    protected $_name = 'bidding';
    protected $_primary = 'bidding_id';
    protected $_referenceMap = array(
        'User_Model_DbTable_Users' => array(
            'columns'       => array('bidding_user'),
            'refTableClass' => 'User_Model_DbTable_Users',
            'refColumns'    => array('user_id')
        ),
    );

}


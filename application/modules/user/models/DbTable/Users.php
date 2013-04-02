<?php

class User_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';
    protected $_primary = 'user_id';
    protected $_dependentTables = array('Blog_Model_DbTable_Bidding');

}


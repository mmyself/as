<?php

class Bidding_Model_Mappers_Bidding
{
    protected $_dbTable = null;
    
    public function getTable()
    {
        if (!isset($this->_dbTable)) {
            $this->_dbTable = new Bidding_Model_DbTable_Bidding();
        }
        return $this->_dbTable;
    }
    
    public function getModel(Zend_Db_Table_Row $row)
    {
        $model = new Bidding_Model_Bidding();
        $model->setId($row->bidding_id);
        $model->setDate($row->bidding_date);
        $model->setTitle($row->bidding_title);
        $model->setTeaser($row->bidding_teaser);
        $model->setText($row->bidding_text);
        
        return $model;
    }
    
    public function fetchSingle($identifier)
    {
        $row = $this->getTable()->fetchRow('bidding_id = "' . (int) $identifier . '"');
    
        if (is_null($row))
        {
            return false;
        }
        
        $model = $this->getModel($row);
        
        return $model;
    }
    
    public function fetchList()
    {
        $select = $this->getTable()->select();
        $select->order('bidding_date ASC');
        
        $rows = $this->getTable()->fetchAll($select);
        
        $list = array();
        
        foreach ($rows as $row) {
            $model = $this->getModel($row);
            
            $list[] = $model;
        }
        
        return $list;
    }

    public function create(array $data)
    {
        $inputData = array(
            'bidding_date'     => date('Y-m-d H:i:s'),
            'bidding_title'    => $data['bidding_title'   ],
            'bidding_teaser'   => $data['bidding_teaser'  ],
            'bidding_text'     => $data['bidding_text'    ],
        );

        $row = $this->getTable()->createRow($inputData);
        $row->save();


        return $row->article_id;
    }
}

?>
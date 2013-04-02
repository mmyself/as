<?php

class Bidding_Form_BiddingCreate extends Zend_Form
{

    public function init()
    {
        
        $this->addElement('Text', 'bidding_title', array(
            'required'       => true,
            'label'          => 'label_bidding_bidding_title',
            'description'    => 'text_bidding_bidding_title',
            'size'           => '128',
            'class'          => 'input38',
            'filters'        => array('StringTrim'),
        ));
        
        $this->addElement('Textarea', 'bidding_teaser', array(
            'required'      => false,
            'label'         => 'label_bidding_bidding_teaser',
            'description'   => 'text_bidding_bidding_teaser',
            'cols'          => '80',
            'rows'          => '5',
            'class'         => 'text38x10',
            'filters'       => array('StringTrim'),
        ));
        
        $this->addElement('Textarea', 'bidding_text', array(
            'required'      => true,
            'label'         => 'label_bidding_bidding_text',
            'description'   => 'text_bidding_bidding_text',
            'cols'          => '80',
            'rows'          => '5',
            'class'         => 'text38x15',
            'filters'       => array('StringTrim'),
        ));
        
        $this->addElement('Submit', 'submit_bidding_create', array(
            'label'         => 'submit_bidding_bidding_create',
        ));
        
        
        $this->getElement('bidding_title')->getDecorator('Description')
            ->setOption('placement', 'prepend');
        $this->getElement('bidding_teaser')->getDecorator('Description')
            ->setOption('placement', 'prepend');
        $this->getElement('bidding_text')->getDecorator('Description')
            ->setOption('placement', 'prepend');
    }


}


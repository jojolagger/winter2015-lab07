<?php

class Order extends CI_Model {
	
	protected $customer = null;
	protected $delivery = null;
	protected $burgers = array();
	protected $special = null;
	
	// Constructor
    public function __construct($orderFile = null) {
        parent::__construct();
		
		if($orderFile == null){
			return;
		}
		
		
        $this->xml = simplexml_load_file(DATAPATH . $orderFile);

        $customer = $this->xml->customer;
		$delivery = $this->xml->delivery;
		$special = $this->xml->special;
		foreach($this->xml->burger as $burger){
			$burgers[] = $burger;
		}
    }

}
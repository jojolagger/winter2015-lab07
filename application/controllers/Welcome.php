<?php

/**
 * Our homepage. Show the most recently added quote.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct()
    {
	parent::__construct();
    }

    //-------------------------------------------------------------
    //  Homepage: show a list of the orders on file
    //-------------------------------------------------------------

    function index()
    {
	$this->load->helper('directory');
	// Build a list of orders
	$listy = directory_map('data', 1);
	$betterListy = array();
	foreach($listy as $file){
		if( substr_compare($file, '.xml', strlen($file)-strlen('.xml'), strlen('.xml')) === 0 && strcmp($file, 'menu.xml')){
			$temp = new stdClass();
			$temp->order = substr($file, 0, strlen($file)-strlen('.xml'));
			$temp->file = $file;
			$betterListy[] = $temp;
		}
	}
	
	// Present the list to choose from
	$this->data['orders'] = $betterListy;
	$this->data['pagebody'] = 'homepage';
	$this->render();
    }
    
    //-------------------------------------------------------------
    //  Show the "receipt" for a specific order
    //-------------------------------------------------------------

    function order($filename)
    {
	// Build a receipt for the chosen order
	$this->load->model('order');
	$data = new Order;
	
	// Present the list to choose from
	$this->data['pagebody'] = 'justone';
	$this->render();
    }
    

}

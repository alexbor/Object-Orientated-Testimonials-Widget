<?php
/*
 *	Author: Alex Bor
 *	URL: https://alexbor.com
 *	This file provided 'as-is' and may be used however.
*/

require_once('db.php'); //Get our database


class App{

	private $config;
	private $db;

	//Runs whenever that class is created, this shall generate our connection.
	function __construct() {
		$this->config = require_once('config.php');
		$this->db = new Db;
		$this->db->connect($this->config['host'], $this->config['username'], $this->config['password'], $this->config['database']);
		if(!$this->db->connected) die("Error connecting to the database");
	}

	public function addTestimonial($clientId, $text){
		$this->db->addTestimonial($_POST['clientId'], $_POST['text']);
	}
	

	public function addClient($clientName, $clientURL){
		$this->db->addClient($clientName, $clientURL);
	}

	public function deleteTestimonial($testimonialId){
		$this->db->deleteTestimonial($testimonialId);
	}

	public function deleteClient($clientId){
		$this->db->deleteClient($_POST['clientId']);
	}

	public function getTestimonials(){
		return $this->db->getTestimonials();
		return;
	}

	public function manageTemplate(){
		$clients = $this->db->getClients();
		$testimonials = $this->db->getTestimonials();
		require_once('manage.php');
	}
}

?>
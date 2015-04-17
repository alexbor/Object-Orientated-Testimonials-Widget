<?php

/*
 *	Author: Alex Bor
 *	URL: https://alexbor.com
 *	This file provided 'as-is' and may be used however.
*/
class Db{

	public $connected = false; //Do we have an active connection?
	private $link = null; //Storing the link to the database
	
	//Create a connection to our database
	public function connect($host, $username, $password, $db){ 
		$this->link = mysqli_connect($host, $username, $password, $db) or die("Error: " . mysqli_error($this->link));
		$this->connected = true;
	}

	//get a singular client
	public function getClient($clientId){
		$return = array();

		if($this->connected == false)
			die("ERROR: Not connected to a database");



		$sql = 'SELECT * FROM clients WHERE clients.client_id = ?';


		$stmt = $this->link->prepare($sql);

		//Setting i here, ensure we're passing in an integer. This helps prevent SQL Injection
		$stmt->bind_param('i', $clientId);

		$stmt->execute();

		$res = $stmt->get_result();

		if($res->num_rows == 0)
			return false;

		while($row = $res->fetch_array()) {
  			return $row; //only care about the first item, there only should be one
		}

	}

	//Get all clients from the clients table
	public function getClients(){
		$return = array();

		if($this->connected == false)
			die("ERROR: Not connected to a database");

		$q = 'SELECT * FROM clients';

		$result = mysqli_query($this->link, $q);
		while($row = mysqli_fetch_array($result)){
			$return[] = $row; //add each item to an array
		}

		return $return;
	}

	//add a client to the database
	public function addClient($clientName, $clientURL){
		$responce = array('error' => true, 'message' => 'An error occured');
		$url = strip_tags($clientURL);
		$name = strip_tags($clientName);


		$sql = 'INSERT INTO `clients` (`client_id`, `name`, `url`) VALUES (NULL, ?, ?)';
		$stmt = $this->link->prepare($sql);
		$stmt->bind_param('ss', $name, $url);

		if(!$stmt->execute()):
			$responce['message'] = "Error inserting into the database";
			die(json_encode($responce));
		endif;

		$responce['error'] = false;
		$responce['message'] = "Successefully Inserted";

		die(json_encode($responce));
	}

	//Deleting a client form the database. Due to the key structure on the testimonials site. This will also delete any connected testimonials.
	public function deleteClient($clientId){
		$responce = array('error' => true, 'message' => 'An error occured');
		$client = $this->getClient($clientId);
		if($client == false){
			$responce['message'] = "Client Doesn't Exist!";
			die(json_encode($responce));
		}

		$sql = 'DELETE FROM `clients` WHERE `client_id` = ?';
		$stmt = $this->link->prepare($sql);
		$stmt->bind_param('i', $clientId);

		if(!$stmt->execute()):
			$responce['message'] = "Error deleting from the database";
			die(json_encode($responce));
		endif;

		$responce['error'] = false;
		$responce['message'] = "Successefully Deleted";

		die(json_encode($responce));		

	}

	//Get a singular testimonial
	public function getTestimonial($testimonialId){
		$return = array();

		if($this->connected == false)
			die("ERROR: Not connected to a database");



		$sql = 'SELECT * FROM testimonials WHERE testimonials.testimonial_id = ?';


		$stmt = $this->link->prepare($sql);

		$stmt->bind_param('i', $testimonialId);

		$stmt->execute();

		$res = $stmt->get_result();

		if($res->num_rows == 0)
			return false;

		while($row = $res->fetch_array()) {
  			return $row;
		}
	}

	//get all testimonials
	public function getTestimonials(){
		$return = array();

		if($this->connected == false)
			die("ERROR: Not connected to a database");



		$q = 'SELECT * FROM testimonials
			  JOIN clients ON testimonials.client_id = clients.client_id';


		$result = mysqli_query($this->link, $q);
		while($row = mysqli_fetch_array($result)){
			$return[] = $row;
		}

		return $return;


	}

	//add a testimonial to the database
	public function addTestimonial($clientId, $text){
		$responce = array('error' => true, 'message' => 'An error occured');
		$client = $this->getClient((int) $clientId);
		$testimonial = strip_tags($text);

		//The client must exist, else the integity of the database won't work.
		if($client == false):
			$responce['message'] = 'Client doesn\'t exist!';
			die(json_encode($responce));
		endif;


		$sql = 'INSERT INTO `testimonials` (`testimonial_id`, `client_id`, `text`) VALUES (NULL, ?, ?)';
		$stmt = $this->link->prepare($sql);
		$stmt->bind_param('is', $client['client_id'], $testimonial);

		if(!$stmt->execute()):
			$responce['message'] = "Error inserting into the database";
			die(json_encode($responce));
		endif;

		$responce['error'] = false;
		$responce['message'] = "Successefully Inserted";

		die(json_encode($responce));
	}

	//Deleting a single testimonial
	public function deleteTestimonial($testimonialId){
		$responce = array('error' => true, 'message' => 'An error occured');
		$testimonial = $this->getTestimonial($testimonialId);

		die(print_r($testimonial));

	}

}

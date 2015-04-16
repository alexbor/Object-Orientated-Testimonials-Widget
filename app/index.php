<?php 

/*
 *	Author: Alex Bor
 *	URL: https://alexbor.com
 *	This file provided 'as-is' and may be used however.
*/

require_once('app.php');

$app = new App;



if(isset($_POST['do'])):
		if($_POST['do'] == 'addTestimonial'){
			$app->addTestimonial($_POST['clientId'], $_POST['text']);
			die();
		}else if($_POST['do'] == 'addClient'){
			$app->addClient($_POST['clientName'], $_POST['clientURL']);
			die();
		}else if($_POST['do'] == 'deleteTestimonial'){
			$app->deleteTestimonial($_POST['testimonialId']);
			die();
		}else if($_POST['do'] == 'deleteClient'){
			$app->deleteClient($_POST['clientId']);
			die();
		}
endif;

$app->manageTemplate();
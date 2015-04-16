<?php 

/*
 *	Author: Alex Bor
 *	URL: https://alexbor.com
 *	This file provided 'as-is' and may be used however.
*/

require_once('app/app.php'); //get our application

$app = new App; //create an instance

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manage Testimonials</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://demo.alexbor.com/global/assets/css/demobase.css" rel='stylesheet'></link>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <style>

  .testimonial_wrap{
  	background: #d3ebff; 
  	border-radius: 6px; 
  	padding: 15px 25px;
  	position: relative;
  	margin: 0 10px;
  }

  .triangle{
	border-color: #d3ebff transparent transparent;
    border-style: solid;
    border-width: 25px 12.5px 0;
    bottom: -19px;
    height: 0;
    left: 3px;
    position: absolute;
    width: 0;
	}


	.client_name{
		display: inline-block;
    	margin-top: 14px;
    	margin: 14px 10px 0;
	}

  </style>

  <body>
<div id="demo_header">
Alex Bor - Demo

<span style="float: right;"><a href="https://alexbor.com/blog/building-pgp-enctypted-contact-form">&lt; Back to turorial</a></span>
</div>

<div class="container">
	<h2>Testimonials</h2>
	<div id="testimonials">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

		  <div class="carousel-inner" role="listbox">
		  <?php
		    		$testimonials = $app->getTestimonials(); //get all the testimonials
		    		$i = 0;
		    		foreach($testimonials as $t):
		    		
		    	?>
		    <div class="item <?php if($i == 0){ echo 'active'; $i++;  }?>">
		    	
		      <div class="testimonial_wrap"><?= $t['text'] ?> <span class="triangle"></span></div>
		      <span class="client_name"><?= $t['name'] ?> - From <a href="<?= $t['url'] ?>"><?= $t['url'] ?></a></span>
		    </div>
		    <?php endforeach; ?>
		  </div>
		</div>
	</div>

	<a style="margin-top: 50px;" href="/app" class="btn btn-default btn-block">Manage Testimonials</a>
</div>







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/js/testimonials.js"></script>

  </body>
</html>

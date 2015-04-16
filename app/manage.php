<?php

/*
 *	Author: Alex Bor
 *	URL: https://alexbor.com
 *	This file provided 'as-is' and may be used however.
*/

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


<div class="container" style="margin-top: 150px;">
	<div class="col-sm-6">
		<a href="#" id="clients" class="btn btn-default btn-block">Clients</a>
	</div>


	<div class="col-sm-6">
		<a href="#" id="testimonials" class="btn btn-default btn-block">Testimonials</a>
	</div>

</div><!-- /.container -->

<div id="clients_block" class="container" style="display: none;">

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>URL</th>
			<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($clients as $c): ?>
		<tr>
			<td><?=$c['client_id']?></td>
			<td><?=$c['name']?></td>
			<td><?=$c['url']?></td>
			<td><a href="#" class="delete_client" data-id='<?=$c['client_id']?>'>X</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>

</table>
<a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#newClient" id="new_testimonial">New Client</a>
</div>

<div id="testimonials_block" class="container" style="display: none;">

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Client Name</th>
			<th>Message</th>
			<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($testimonials as $t): ?>
		<tr>
			<td><?=$t['testimonial_id']?></td>
			<td><?=$t['name']?></td>
			<td><?=$t['text']?></td>
			<td><a href="#" class="delete_testimonial" data-id='<?=$t['testimonial_id']?>'>X</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<a href="#" class="btn btn-default btn-block" id="new_testimonial" data-toggle="modal" data-target="#newTestimonial">New Testimonial</a>
</div>


<!-- Modal -->
<div class="modal fade" id="newClient" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Client</h4>
      </div>
      <div class="modal-body">
       

		<form>
		  <div class="form-group">
		    <label for="clientName">Client Name</label>
		    <input type="text" id="clientName" name="clientName" class="form-control" />
		  </div>
		  <div class="form-group">
		    <label for="clientURL">Client URL</label>
		    <input type="text" id="clientURL" name="clientURL" class="form-control" />
		  </div>

		</form>
	

	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addClient">Add Client</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="newTestimonial" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Testimonial</h4>
      </div>
      <div class="modal-body">
       

		<form>
		  <div class="form-group">
		    <label for="clientForTestimonial">Client</label>
		    
			<select class="form-control" id="clientForTestimonial" name="clientForTestimonial">
				<?php foreach($clients as $c): ?>
				<option value="<?=$c['client_id']?>"><?=$c['name']?></option>
				<?php endforeach; ?>
			</select>

		  </div>
		  <div class="form-group">
		    <label for="testimonialText">Testimonial Text</label>
		    <textarea class="form-control" id="testimonialText" name="testimonialText"></textarea>
		  </div>
		</form>
	

	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addTestimonial">Add Testimonial</button>
      </div>
    </div>
  </div>
</div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/js/app.js"></script>

  </body>
</html>

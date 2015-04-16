$(document).ready(function($) {
	
	$( "#clients" ).on( "click", function() {
		$('#clients_block').slideToggle();
	});

	$( "#testimonials" ).on( "click", function() {
		$('#testimonials_block').slideToggle();
	});


	$('#addTestimonial').on('click', function(){
		clientId = $('#clientForTestimonial').val();
		console.log(clientId);

		testimonialText = $('#testimonialText').val();
		console.log(testimonialText);

		$.ajax({
           type: 'POST',
       dataType: 'json',
           data: 'do=addTestimonial&clientId='+clientId+'&text='+testimonialText,
            url: '/app/index.php',
        success: function(json){
		  		if(json.error == true){
		  			alert(json.message);
		  		} else {
		  			alert(json.message);
		  			 location.reload(); 
		  		}
			}

		});
	});

	$('#addClient').on('click', function(){
		clientName = $('#clientName').val();
		clientURL = $('#clientURL').val();

		$.ajax({
           type: 'POST',
       dataType: 'json',
           data: 'do=addClient&clientName='+clientName+'&clientURL='+clientURL,
            url: '/app/index.php',
        success: function(json){
		  		if(json.error == true){
		  			alert(json.message);
		  		} else {
		  			alert(json.message);
		  			 location.reload(); 
		  		}
			}

		});
	});

	$('.delete_client').on('click', function(e){
		testId = $(this).attr('data-id');

		$.ajax({
           type: 'POST',
       dataType: 'json',
           data: 'do=deleteClient&clientId='+testId,
            url: '/app/index.php',
        success: function(json){
		  		if(json.error == true){
		  			alert(json.message);
		  		} else {
		  			alert(json.message);
		  			 location.reload(); 
		  		}
			}

		});
	})


	$('.delete_testimonial').on('click', function(e){
		testId = $(this).attr('data-id');

		$.ajax({
           type: 'POST',
       dataType: 'json',
           data: 'do=deleteTestimonial&testimonialId='+testId,
            url: '/app/index.php',
        success: function(json){
		  		if(json.error == true){
		  			alert(json.message);
		  		} else {
		  			alert(json.message);
		  			 location.reload(); 
		  		}
			}

		});
	})

	

})
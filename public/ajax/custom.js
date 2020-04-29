$(document).ready(function(){




$('#upload_form').on('submit', function(event){

        event.preventDefault()

		$.ajax({

			url: '/api/upload/file',
			method:"POST",
			data:new FormData(this),
			dataType:'JSON',
			processData: false,
			contentType: false,
			success:function(data){
				$('#message').css('display', 'block');
			    $('#message').html(data.message);
			    $('#message').addClass(data.class_name);
			    $('#uploaded_image').html(data.upload_image);
				
			}

		})
 });



})
$(document).ready(function(){

	$('#create_record').click(function(){

		$('.modal-title').text("Add New Record");
        $('#action_button').val("Add");
        $('#action').val("Add");
		$('#formModal').modal('show')

	})

	//insert and update data
	$('#sample_form').on('submit',function(e){

		e.preventDefault();

		if($('#action').val() == 'Add') {

			$.ajax({
			    url:'/store-data',
				method: 'POST',
				data: new FormData(this),
			    contentType: false,
			    cache:false,
			    processData: false,
			    success:function(data){

			    	var html = '';
				     if(data.errors)
				     {
				      html = '<div class="alert alert-danger">';
				      for(var count = 0; count < data.errors.length; count++)
				      {
				       html += '<p>' + data.errors[count] + '</p>';
				      }
				      html += '</div>';
				     }
				     if(data.success)
				     {
				      html = '<div class="alert alert-success">' + data.success + '</div>';
				      $('#sample_form')[0].reset();
				      $('#user_table').DataTable().ajax.reload();
				      setTimeout(function(){ $('#formModal').modal('hide') }, 5000);
				     }
				     $('#form_result').html(html);

			    }
			})

		}

		 if($('#action').val() == "Edit")
		  {
		   $.ajax({
		    url:'/update-data',
		    method:"POST",
		    data:new FormData(this),
		    contentType: false,
		    cache: false,
		    processData: false,
		    dataType:"json",
		    success:function(data)
		    {
		     var html = '';
		     if(data.errors)
		     {
		      html = '<div class="alert alert-danger">';
		      for(var count = 0; count < data.errors.length; count++)
		      {
		       html += '<p>' + data.errors[count] + '</p>';
		      }
		      html += '</div>';
		     }
		     if(data.success)
		     {
		      html = '<div class="alert alert-success">' + data.success + '</div>';
		      $('#sample_form')[0].reset();
		      $('#store_image').html('');
		      $('#user_table').DataTable().ajax.reload();
		     }
		     $('#form_result').html(html);
		    }
		   });
		  }


	})

	//get single user data
	$(document).on('click', '.edit', function(){
	  var id = $(this).attr('id');
	  $('#form_result').html('');
	  $.ajax({
	   url:"/ajax-crud/"+id+"/edit",
	   dataType:"json",
	   success:function(html){
	    $('#first_name').val(html.data.first_name);
	    $('#last_name').val(html.data.last_name);
	    $('#store_image').html(`<img src="{{ URL::to('/') }}/test/${html.data.image}" style="width: 50px; height: 50px;" class="img-fluid">`);
	    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
	    $('#hidden_id').val(html.data.id);
	    $('.modal-title').text("Edit New Record");
	    $('#action_button').val("Edit");
	    $('#action').val("Edit");
	    $('#formModal').modal('show');
	   }
	  })
	 });


 //delete data
 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"ajax-crud/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
   }
  })
 });



})
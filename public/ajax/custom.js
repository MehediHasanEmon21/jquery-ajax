
$(function(){

	$('.input-daterange').datepicker({
	  todayBtn:'linked',
	  format:'yyyy-mm-dd',
	  autoclose:true
	 });

	 load_data();

	  function load_data(from_date = '', to_date = '')
	 {
		  $('#order_table').DataTable({
		   processing: true,
		   serverSide: true,
		   ajax: {
		    url:'/filter-data',
		    data:{from_date:from_date, to_date:to_date}
		   },
		   columns: [
		    {
		     data:'id',
		     name:'id'
		    },
		    {
		     data:'product_name',
		     name:'product_name'
		    },
		    {
		     data:'product_quantity',
		     name:'product_quantity'
		    },
		   ]
		  });
	 }

	  $('#filter').click(function(){
		  var from_date = $('#from_date').val();
		  var to_date = $('#to_date').val();
		  if(from_date != '' &&  to_date != '')
		  {
		   $('#order_table').DataTable().destroy();
		   load_data(from_date, to_date);
		  }
		  else
		  {
		   alert('Both Date is required');
		  }
		});

	  $('#refresh').click(function(){
		  $('#from_date').val('');
		  $('#to_date').val('');
		  $('#order_table').DataTable().destroy();
		  load_data();
	  });


})
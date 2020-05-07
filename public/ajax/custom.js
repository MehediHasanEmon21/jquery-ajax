$(document).ready(function(){



	 var date = new Date();

	 $('.input-daterange').datepicker({
	  todayBtn: 'linked',
	  format: 'yyyy-mm-dd',
	  autoclose: true
	 });

	 $(document).on('click','#filter',function(){

	 	var from = $('#from_date').val();
	 	var to = $('#to_date').val();

	 	if (from != '' || to != '') {

	 		$.ajax({

	 			url: '/api/fetch',
	 			data: {
	 				from: from,
	 				to: to
	 			},
	 			method: 'POST',
	 			success:function(data){
	 				var output = '';
	 				for(var i = 0; i < data.product.length; i++){
	 					output += `<tr>
            					<td>${data.product[i].product_name}</td>
            					<td>${data.product[i].date}</td>
          						</tr>`
	 				}

	 				$('#tdata').html(output)
	 				$('#total_records').text(data.count)
	 			}

	 		})

	 	}else{
	 		alert('Please Select Date')
	 	}

	 })

	 $(document).on('click','#refresh',function(){

	 	location.reload()

	 })



})
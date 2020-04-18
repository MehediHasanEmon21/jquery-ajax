$(document).ready(function(){


	$(document).on('keyup','#search',function(){

		var query = $(this).val();
		$.ajax({

			url: '/api/getdata',
			data: {
				query : query,
			},
			method: 'POST',
			success:function(data){
				console.log(data);
				var output = '';

				// for( var i = 0; i < data.products.length; i++){
					
				// 	output += `
				// 	<tr>
				// 	<td>${data.products[i].product_name}</td>
    //         		<td>${data.products[i].product_code}</td>
    //         		</tr>`;

				// }

				data.products.forEach( function(product, i) {
					output += `
					<tr>
					<td>${product.product_name}</td>
            		<td>${product.product_code}</td>
            		</tr>`;
				});


				$('#tbl_data').html(output);
				$('#total_records').text(data.product_count);

			}

		});

	})


})
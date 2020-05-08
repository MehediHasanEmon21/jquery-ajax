$(document).ready(function(){


	$(document).on('click','#load_more_button',function(){

		var id = $(this).attr("data-page");
        var element = $(this)
		$.ajax({

			url: '/api/fetch',
			data: {
				id: id
			},
			method: 'POST',
			success:function(data){
				if ( data.last_id > 0) {

						element.attr("data-page", data.last_id);
						var output = '';
						for (var i = 0; i < data.product.length; i++) {
							output += `
								<div class="row">
									<div class="col-md-12">
					              <h3 class="text-info"><b>${data.product[i].product_name}</b></h3>
					              <p>${data.product[i].short_details}</p>
					              <br />
					              <div class="col-md-6">
					               <p><b>${data.product[i].product_quantity}</b></p>
					              </div>
					              <div class="col-md-6" align="right">
					               <p><b>${data.product[i].created_at}</b></p>
					              </div>
					              <br />
					              <hr />
					             </div>
					          </div>`
						}
						$('#load').append(output)

				}else{
					element.text('No Data Found')
					element.removeAttr('data-page')
					element.addClass('alert alert-danger')
				}
			
				console.log(data)

			}

		})

	})



})
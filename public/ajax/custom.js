$(document).ready(function(){

	$(document).on('keyup','#country_name',function(){

		var input = $(this);
		var query = input.val();

		$.ajax({
			url:'/api/getdata',
			method: 'POST',
			data: {
				query : query
			},
			success: function(data){
				$('#countryList').fadeIn();
				$('#countryList').html(data);

			}
		})

	});

	$(document).on('click','li',function(){

		$('#country_name').val($(this).text())
		$('#countryList').fadeOut();

	})




})
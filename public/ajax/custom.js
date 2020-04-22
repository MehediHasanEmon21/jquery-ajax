$(document).ready(function(){


	$(document).on('click','.pagination a', function(event){

		event.preventDefault()
		var page_num = $(this).attr('href').split('page=')[1]
		fetch_data(page_num)

	})

	function fetch_data(num){

		$.ajax({


			url: '/api/pagination/fetch_data?page='+num,
			success: function(data){
				console.log(data)
				$('#table_data').html(data);
			}

		})

	}



})
$(document).ready(function(){


	$(document).on('click','.sorting',function(){

		var column_name = $(this).data('column_name')
		var sort_type = $(this).data('sorting_type')
		var reverse_order = ''

		if (sort_type == 'asc') {
			$(this).data('sorting_type','desc')
			reverse_order = 'desc'
			$('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
		}

		if (sort_type == 'desc') {
			$(this).data('sorting_type','asc')
			reverse_order = 'asc'
			$('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
		}

		$('#hidden_column_name').val(column_name)
		$('#hidden_sort_type').val(sort_type)
		 var page = $('#hidden_page').val();
		 var query = $('#serach').val();

		fetch_data(page,reverse_order,column_name,query)

	})

	$(document).on('click', '.pagination a', function(event){

	  event.preventDefault();
	  var page = $(this).attr('href').split('page=')[1];
	  $('#hidden_page').val(page);
	  var column_name = $('#hidden_column_name').val();
	  var sort_type = $('#hidden_sort_type').val();
	  var query = $('#serach').val();
	  $('li').removeClass('active');
      $(this).parent().addClass('active');
	  fetch_data(page, sort_type, column_name, query);

	 });

	function fetch_data(page,sort_type,sort_by,query){
		$.ajax({

			url: '/api/pagination/fetch?page='+page+'&sort_type='+sort_type+'&sort_by='+sort_by+'&query='+query,
			success:function(data){
				console.log(data)
				$('tbody').html('')
				$('tbody').html(data)

			}

		})
	}

	 $(document).on('keyup', '#serach', function(){
		  var query = $('#serach').val();
		  var column_name = $('#hidden_column_name').val();
		  var sort_type = $('#hidden_sort_type').val();
		  var page = $('#hidden_page').val();
		  fetch_data(page, sort_type, column_name, query);
	 });



})
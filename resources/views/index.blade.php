
<!DOCTYPE html>
<html>
 <head>
  <title>Laravel Live Data Search with Sorting & Pagination using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Laravel Live Data Search with Sorting & Pagination using Ajax</h3><br />
   <div class="row">
    <div class="col-md-9">

    </div>
    <div class="col-md-3">
     <div class="form-group">
      <input type="text" name="serach" id="serach" class="form-control" />
     </div>
    </div>
   </div>
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
       <th width="38%" class="sorting" data-sorting_type="asc" data-column_name="product_name" style="cursor: pointer">Product Name <span id="product_name_icon"></span></th>
      </tr>
     </thead>
     <tbody>
      @include('paginate_data')
     </tbody>
    </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
   </div>
  </div>
 </body>
</html>


<script src="{{ asset('ajax/custom.js') }}"></script>








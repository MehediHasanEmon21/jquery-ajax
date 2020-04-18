<!DOCTYPE html>
<html>
 <head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Live search in laravel using AJAX</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Customer Data</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records">{{ $products->count() }}</span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Product Name</th>
         <th>Code</th>
        </tr>
       </thead>
       <tbody id="tbl_data">

         @foreach($products as $key=>$pro)
          <tr>
            <td>{{ $pro->product_name }}</td>
            <td>{{ $pro->product_code }}</td>
          </tr>
          @endforeach
       
       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>

<script src="{{ asset('ajax/custom.js') }}"></script>


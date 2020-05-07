<!DOCTYPE html>
<html>
 <head>
  <title>Date Range Fiter Data in Laravel using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Date Range Fiter Data in Laravel using Ajax</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-5">Sample Data - Total Records - <b><span id="total_records">{{ count($products) }}</span></b></div>
      <div class="col-md-5">
       <div class="input-group input-daterange">
           <input type="text" name="from_date" id="from_date" readonly class="form-control" />
           <div class="input-group-addon">to</div>
           <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
       </div>
      </div>
      <div class="col-md-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th width="35%">Product Name</th>
         <th width="50%">Date</th>
        </tr>
       </thead>
       <tbody id="tdata">
          @foreach($products as $product)
          <tr>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->date }}</td>
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








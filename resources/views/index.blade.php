<html>
 <head>
  <title>Load More Data in Laravel using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Load More Data in Laravel using Ajax</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Product Data</h3>
    </div>
    <div class="panel-body">
      <div id="load">
      @foreach($products as $product)
          <div class="row">

             <div class="col-md-12">
              <h3 class="text-info"><b>{{ $product->product_name }}</b></h3>
              <p>{!! substr($product->product_details, 0, 300) !!}</p>
              <br />
              <div class="col-md-6">
               <p><b>{{ $product->product_quantity }}</b></p>
              </div>
              <div class="col-md-6" align="right">
               <p><b>{{ $product->created_at }}</b></p>
              </div>
              <br />
              <hr />
             </div>
              @php
                $last_id = $product->id;
              @endphp
          </div>
        @endforeach
      </div>
        <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-page="{{ $last_id }}" id="load_more_button">Load More</button>
       </div>
    </div>
   </div>
   <br />
   <br />
  </div>
 </body>
</html>


<script src="{{ asset('ajax/custom.js') }}"></script>








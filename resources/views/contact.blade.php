<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery Form Validation in Laravel with Send Email</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <style>
    .error
    {
     color:#FF0000;
    }
    </style>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">jQuery Form Validation in Laravel with Send Email</h3>
     <br />
     @if($message = Session::get('success'))

      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
      @endif
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">Contact Us</h3>
      </div>
      
      <div class="panel-body">
       <form id="contact_form" method="post" action="{{ url('contact_us/submit') }}">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name Detail">
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email Detail">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" id="message" placeholder="Enter Message Detail"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Send" />
              </div>
            </form>
      </div>
     </div>
        </div>
 </body>
</html>


<script>
$(document).ready(function(){

 if($("#contact_form").length > 0)
  {
    $('#contact_form').validate({
      rules:{
        name : {
          required : true,
          maxlength : 50
        },
        email : {
          required : true,
          maxlength : 50, 
          email : true
        },
        message : {
          required : true,
          minlength : 50,
          maxlength : 500
        }
      },
      messages : {
        name : {
          required : 'Enter Name Detail',
          maxlength : 'Name should not be more than 50 character'
        },
        email : {
          required : 'Enter Email Detail',
          email : 'Enter Valid Email Detail',
          maxlength : 'Email should not be more than 50 character'
        },
        message : {
          required : 'Enter Message Detail',
          minlength : 'Message Details must be minimum 50 character long',
          maxlength : 'Message Details must be maximum 500 character long'
        }
      }
    });
  }

});
</script>
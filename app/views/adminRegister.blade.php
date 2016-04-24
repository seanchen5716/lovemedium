<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Airnb</title>

    <!-- Bootstrap -->
    <link href="{{URL::to('editor/css/normalize.css')}}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{URL::to('editor/css/all.css')}}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{URL::to('editor/css/dante-editor.css')}}" media="screen" rel="stylesheet" type="text/css">
    <script src="{{URL::to('editor/js/deps.js')}}" type="text/javascript"></script><style type="text/css"></style>
    <script src="{{URL::to('editor/js/dante-editor.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom CSS -->
    <!--<link href="css/animate.css" rel="stylesheet">-->
  <!-- Custom CSS -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @if(Session::get('error'))
        <center><div id="div1" style="display:none;border:1px solid #ddd;top:-2px;border-radius: 4px;padding: 30px 0px;width: 400px;background-color:white;  position: absolute;z-index: 1000;color: #d9534f;left:0px;right:0px;margin: 0px auto;padding: 25px;font-size: 20px;
}">{{Session::get('error')}}</div></center>
        @endif
        @if(Session::get('success'))
            <center><div id="div1" style="display:none;border:1px solid #ddd;top:-2pxborder-radius: 4px;padding: 30px 0px;width: 400px;background-color:white;  position: absolute;z-index: 1000;color: #02b875;left:0px;right:0px;margin: 0px auto;padding: 25px;font-size: 20px;
}">{{Session::get('success')}}</div></center>
        
        @endif
  <div class="signin-content signup" style="margin: 0px;">

              <div>
                <h2 style="  margin-left: 45%;" >Medium</h2>
              <br>
              <br>
                <h4 style="  margin-left: 40%;">Enter your credentials to sign up</h4>
                <br>
              </div>
                <form method="POST" action="{{URL::to('superadmin/create')}}">
                  <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Username" value="{{Input::old('username')}}" required>
                    <input type="" name="email" class="form-control" id="exampleInputEmail1" placeholder="yourname@example.com">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="admin" required>
                  </div>
                  <button type="submit" class="btn btn-default btn-green" style="border-radius: 50px;padding: 5px 14px;">Sign Up</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 50px;padding: 5px 14px;">Cancel</button>
                </form>
              </div>
  <div class="left-footer" >
  </div >


<script type="text/javascript">

$(function(){

$("#div1").slideDown("slow");

setTimeout(function(){ $("#div1").slideUp("slow");}, 3000);
});


</script>

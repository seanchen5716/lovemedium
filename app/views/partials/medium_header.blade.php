<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Medium</title>

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

    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php $session=2;?>
  	@if(Session::get('error'))
  	<?php $session=0; ?>
        <center><div id="div1" style="display:none;border:1px solid #ddd;border-radius: 4px;padding: 30px 0px;width: 400px;background-color:white;  position: absolute;z-index: 1000;color: #d9534f;left:0px;right:0px;margin: 0px auto;padding: 25px;font-size: 20px;
}">{{Session::get('error')}}</div></center>
<?php $session=1; ?>
        @endif
        @if(Session::get('success'))
        <?php $session=0; ?>
        		<center><div id="div1" style="display:none;border:1px solid #ddd;border-radius: 4px;padding: 30px 0px;width: 400px;background-color:white;  position: absolute;z-index: 1000;color: #02b875;left:0px;right:0px;margin: 0px auto;padding: 25px;font-size: 20px;
}">{{Session::get('success')}}</div></center>
<?php $session=1;?> 
        @endif
		<!-- Outer Starts -->


		<div class="outer">
			<!-- Header Starts -->
			<div class="header">
				<nav class="navbar">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="{{route('login')}}"><img src="{{asset('img/logo.png')}}" alt="" /></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav nav-text">
						<li class="active"><a data-toggle="tab" href="#home">Latest Picks <span class="sr-only">(current)</span></a></li>
						<li><a data-toggle="tab" href="#top">Top Stories</a></li>
						@if(Sentry::check())
						<li><a data-toggle="tab" href="#bkmrk_pg">Bookmarks</a></li>
						@else
						<li><a class="head-modal" data-toggle="modal" data-target="#myModal">Bookmarks</a></li>
						@endif
					  </ul>
					 
					  <ul class="nav navbar-nav navbar-right">
						<li>
							<form class="navbar-form" method="GET" action="{{route('search')}}">
								<div class="input-group add-on">
								  <div class="input-group-btn">
									<button class="btn btn-default btn-submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								  </div>
								  <input type="text" class="form-control search-form" placeholder="Search Medium" name="search">
								</div>
							</form>
						</li>
						<li>
							@if(!Sentry::check())
							<a class="btn head-modal head-modal"  data-toggle="modal" data-target="#myModal">Write a Story</a>
							@else
							<a href="{{route('blog_editor')}}" class="btn">Write a Story</a>
							@endif
						</li>
						@if(Sentry::check())
						<li>
							<a  class="btn-account" id="user_acc" data-toggle="collapse" style="display: inline-block;width: 35px;height: 35px;line-height: 33px;padding: 0px;text-align: center;color: #ccc;border-radius: 100%;border: 1px solid #ccc;margin: 8px 5px 0px;font-size: 18px;"><i class="fa fa-user"></i></a>
						</li>
                        @else
						<li>
							<a  class="btn btn-signin btn-green head-modal" data-toggle="modal" data-target="#myModal" style="color: #02b875; border-color: #02b875;">Sign In / Sign Up</a>
						</li>
						@endif
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
			</div>
				
					<div class='arrow_box account' id="acc_box" style="right: -43px;width: 280px;">
						<ul>
							<li><a href="{{route('blog_editor')}}" style="text-decoration: none; color:inherit">New Story</li>
							<li><a href="{{route('drafts')}}" style="text-decoration: none; color:inherit">Drafts and stories</li>
						</ul>
						<hr/>
						<ul style="font-size: 12px;">
							<li><a href="{{route('profile')}}" style="text-decoration: none; color:inherit">Profile</li>
							<li><a href="{{route('settings_medium')}}" style="text-decoration: none; color:inherit">Settings</li>
							<li><a href="{{route('logout')}}" style="text-decoration: none; color:inherit">Sign Out</li>
						</ul>
					</div>
			<div class="modal fade" id="myModal" style="padding-right: 0px !important;">
			<div class="modal-dialog">
				<div class="modal-content" style="padding: 220px 0px;">
					<div class="modal-header" style="position: relative;top: -200px;border: 0px;padding: 15px 50px;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body text-center">
						<div class="first-content">
							<div class="main-content">
								<img src="{{asset('img/logo-black.png')}}" alt="" style="width: 100px;" />
								<h2>Medium</h2>
								<h4>Sign in to Medium or create an account</h4>
								<a class=" btn btn-green sign-link" style="border-radius: 50px;padding: 5px 14px;">Sign In</a>
								<a  class="btn btn-green signup-link" style="border-radius: 50px;padding: 5px 14px;">Sign Up</a>
							</div>
							
							<div class="signin-content signin" style="margin: 0px;">
								<h2>Medium</h2>
								<h4>Enter your credentials to sign in</h4>
								<form method="POST" action="{{route('login')}}">
									<div class="form-group">
										<input type="" name="email" class="form-control" id="exampleInputEmail1" placeholder="yourname@example.com">
										<input type="password" name="password" class="form-control" placeholder="Password" value="admin" required>
									</div>
									<button type="submit" class="btn btn-default btn-green" style="border-radius: 50px;padding: 5px 14px;">Sign in</button>
									<button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 50px;padding: 5px 14px;">Cancel</button>
								</form>
							</div>

							<div class="signin-content signup" style="margin: 0px;">
								<h2>Medium</h2>
								<h4>Enter your credentials to sign up</h4>
								<form method="POST" action="{{route('register')}}">
									<div class="form-group">
										<input name="username" type="text" class="form-control" placeholder="Username" value="{{Input::old('username')}}" required>
										<input type="" name="email" class="form-control" id="exampleInputEmail1" placeholder="yourname@example.com">
										<input type="password" name="password" class="form-control" placeholder="Password" value="admin" required>
									</div>
									<button type="submit" class="btn btn-default btn-green" style="border-radius: 50px;padding: 5px 14px;">Sign Up</button>
									<button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 50px;padding: 5px 14px;">Cancel</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">

$(function(){

$("#div1").slideDown("slow");
var i= <?php echo $session; ?>;
if(i==0)
setTimeout(function(){ $("#div1").slideUp("slow");}, 3000);
});


</script>

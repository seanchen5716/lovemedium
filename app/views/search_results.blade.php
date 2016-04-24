<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Airnb</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
    <!--<link href="css/animate.css" rel="stylesheet">-->
	<!-- Custom CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	@if(Session::get('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
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
					  <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" /></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					 
					  <ul class="nav navbar-nav navbar-right">
						<li>
							<form class="navbar-form" method="POST" action="{{route('searchm')}}">
								<div class="input-group add-on">
								  <div class="input-group-btn">
									<button class="btn btn-default btn-submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								  </div>
								  <input type="text" class="form-control search-form" placeholder="Search Medium" name="search">
								</div>
							</form>
						</li>
						<li>
							<a href="#" class="btn">Write a Story</a>
						</li>
						@if(Sentry::check())
						<li>
							<a href="#" class="btn-notify" style="display: inline-block;width: 35px;height: 35px;line-height: 33px;padding: 0px;text-align: center;color: #ccc;border-radius: 100%;border: 1px solid #ccc;margin: 8px 5px 0px;font-size: 18px;"><i class="fa fa-bell-o"></i></a>
						</li>
						<li>
							<a href="#" class="btn-account" style="display: inline-block;width: 35px;height: 35px;line-height: 33px;padding: 0px;text-align: center;color: #ccc;border-radius: 100%;border: 1px solid #ccc;margin: 8px 5px 0px;font-size: 18px;"><i class="fa fa-user"></i></a>
						</li>
                        @else
						<li>
							<a href="#" class="btn btn-signin btn-green" data-toggle="modal" data-target="#myModal" style="color: #02b875; border-color: #02b875;">Sign In / Sign Up</a>
						</li>
						@endif
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
					<div class='arrow_box notification'>
						<ul>
							<li>Sed ut perspiciatis unde omnis iste</li>
							<li>natus error sit volup tatem accusa ntium</li>
							<li>At vero eos et accus amus et iusto odio</li>
							<li>de Fini bus Bono rum et Malo rum</li>
						</ul>
					</div>
					<div class='arrow_box account' style="right: -43px;width: 280px;">
						<ul>
							<li><a href="#" style="text-decoration: none; color:inherit">New Story</li>
							<li><a href="#" style="text-decoration: none; color:inherit">Drafts</li>
						</ul>
						<hr/>
						<ul style="font-size: 12px;">
							<li><a href="#" style="text-decoration: none; color:inherit">Profile</li>
							<li><a href="#" style="text-decoration: none; color:inherit">Settings</li>
							<li><a href="{{route('logout')}}" style="text-decoration: none; color:inherit">Sign Out</li>
						</ul>
					</div>
				</div>	
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
								<img src="img/logo-black.png" alt="" style="width: 100px;" />
								<h2>Medium</h2>
								<h4>Sign in to Medium or create an account</h4>
								<a href="#" class=" btn btn-green sign-link" style="border-radius: 50px;padding: 5px 14px;">Sign In</a>
								<a href="#" class="btn btn-green signup-link" style="border-radius: 50px;padding: 5px 14px;">Sign Up</a>
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


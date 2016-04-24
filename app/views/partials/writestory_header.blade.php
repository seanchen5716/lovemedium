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
    <style>
    	article{
    		margin-top: 0px;
    	}
    	.main-content p{
    		margin: 0px;
    	}
    	.arrow_box.publish:after, .arrow_box.publish:before {
		  left: 83%;
		}
		.arrow_box.more:after, .arrow_box.more:before {
		  left: 71%;
		}
		.arrow_box.more {
		  margin-right: 8px;
		}

    </style>

  </head>
  <body>
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
					  <a class="navbar-brand navbar-black" href="{{route('login')}}"><img src="{{asset('img/logo-black.png')}}" alt="" /></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav nav-text nav-profile">
						<li></li>
					  </ul>
					 
					  <ul class="nav navbar-nav navbar-right">
						<li>
							<a  class="btn btn-green btn-publish">Publish <i class="fa fa-angle-down"></i></a>
						</li>
						<li>
							<a  class="btn-drop btn-account"><i class="fa fa-user"></i></a>
						</li>
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>	
				
				<!-- Arrow Box -->
				<div class="arrow_box publish clearfix">
					<h5>Ready to publish?</h5>	
					<span style="color: #aaa;">Add or change tags (up to 3) so your story reaches more people:</span>
					<form id="publish_form" method="POST" action="{{route('publish')}}">
					<input type="text" class="form-control" name="tag_name" rows="3" placeholder="Add a tag...">
					<input type="hidden" name="story_id" value="{{$id}}">
					<hr>
					<span style="color: #aaa;position: relative;top: 5px;">Ready to Publish</span>
					<button class="btn btn-green btn-sm pull-right" style="border-radius: 50px;" type="submit">Publish</button>
					</form>
				</div>	
				
						<div class='arrow_box account' style="right: -43px;width: 280px;">
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
				
			</div>	
			
			<!-- Header Ends -->
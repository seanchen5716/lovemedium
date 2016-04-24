<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Medium</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Custom CSS -->
    <!--<link href="css/animate.css" rel="stylesheet">-->
	<!-- Custom CSS -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- Custom CSS -->
    <link href="{{asset('css/style_draft.css')}}" rel="stylesheet">
	
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
		<!-- Outer Starts -->
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
						@if(Sentry::check())
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
				<div class="story-box">
					<div class="item">
						<div class="container-fluid">
							<div class="col-md-2">
							
							</div>
								<div class="col-md-8" style="margin-top: 5%">
									<div class="col-md-6">
										<div class="line-bar">
											<h1>
												Your stories
											</h1>
										</div>
									</div>
									<div class="col-md-6">
										<div class="line-bar">
											<ul>
												<a href="{{route('blog_editor')}}" class="btn">Write a Story</a>
											</ul>
										</div>
									</div>
									@if(count($stories)>0)
									@foreach($stories as $story)
									<div class="col-md-12 content_main">
									 <?php $html=$story->content;
									       $doc = new Htmldom($html);
	      								   $title=$doc->find('.graf--first',0);
	      								   if($title != NULL && $title->innertext != NULL && $title->innertext!='</br>' && $title->innertext!='<br>')
	      								   $var=$title->plaintext;
	      								   else
	      								   $var="Untitled";
	      								   $type=$story->type;
	      								   $last_updated=strtotime($story->updated_at);
	      								   if($type==2)
	      								   $text="Last updated at ".date('F jS Y', $last_updated);
	      								   else if($type==1)
	      								   $text="Published";
	      								   ?>
											<a href="{{route('display-story',array($story->id))}}" style="text-decoration: none; color:inherit">
											<h3><b>{{$var}}</b></h3>
											</a>
										<div class="read_time">
											<span class="edit">
												{{$text}}
											</span>
											<span class="down" data-toggle="dropdown" style="padding-left: 10px; font-size: 14px; ">
												<i class="fa fa-angle-down"></i>
											 </span>
											
											<ul class="dropdown-menu" style="margin-left:<?php echo (strlen($text)*6)?>px">
											  <li><a href="{{route('edit-story',array($story->id))}}">Edit</a></li>
											  <li><a href="{{route('delete',array($story->id))}}">Delete</a></li>
											</ul>
										</div>
									</div>
									@endforeach
									@endif
									
								</div>
							<div class="col-md-2">
							
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		
		
		<!-- Modal -->
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


	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
	
	<script>
		$(document).ready(function(){
			$(".modal-body .signin-content").hide();
			$(window).scroll(function(){
				var scroll = $(window).scrollTop();
				if (scroll >= 650) {
					$(".header").removeClass("non-active").addClass("active");
				}else {
					$(".header").removeClass("active");
				}
			});
			
			$("a.sign-link").click(function(e){
				e.preventDefault();
				$(".modal-body .main-content").hide();
				$(".modal-body .signin-content").show();
			});

			$("a.btn-account").click(function(e){
				e.preventDefault();
				if(!($(".account").hasClass("active"))){
					$(".account").fadeIn().addClass("active");	
					$(".notification").fadeOut().removeClass("active");
				}
				else{
					$(".account").fadeOut().removeClass("active");	
				}
			});
		});	
	</script>
  </body>
</html>
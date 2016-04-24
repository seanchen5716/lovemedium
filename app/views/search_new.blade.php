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
	<link rel="stylesheet" href="{{asset('css/bootstrap.vertical-tabs.min.css')}}">
	<!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    	.cr-content .cs-item img {
		  width: 60px;
		  height: 60px;
		  margin-top: -4px;
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
						
					  </ul>
					 
					  <ul class="nav navbar-nav navbar-right">
						<li>
							@if(!Sentry::check())
							<a href="#" class="btn"  data-toggle="modal" data-target="#myModal">Write a Story</a>
							@else
							<a href="{{route('blog_editor')}}" class="btn">Write a Story</a>
							@endif
						</li>
						@if(Sentry::check())
						<li>
							<a href="#" class="btn-account" style="display: inline-block;width: 35px;height: 35px;line-height: 33px;padding: 0px;text-align: center;color: #ccc;border-radius: 100%;border: 1px solid #ccc;margin: 8px 5px 0px;font-size: 18px;"><i class="fa fa-user"></i></a>
						</li>
                        @else
						<li>
							<a href="#" class="btn btn-signin btn-green head-modal" data-toggle="modal" data-target="#myModal" style="color: #02b875; border-color: #02b875;">Sign In / Sign Up</a>
						</li>
						@endif
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>	
				
				<!-- Arrow Box -->
			
				<div class='arrow_box account' style="right: -43px;width: 280px;">
					<ul>
						<li><a href="{{route('blog_editor')}}" style="text-decoration: none; color:inherit">New  Story</a></li>
						<li><a href="{{route('drafts')}}" style="text-decoration: none; color:inherit">Drafts and stories</a></li>
						
					</ul>
					<hr/>
					<ul style="font-size: 12px;">
						<li><a href="{{route('profile')}}" style="text-decoration: none; color:inherit">Profile</a></li>
						<li><a href="{{route('settings_medium')}}" style="text-decoration: none; color:inherit">Settings</a></li>
						<li><a href="{{route('logout')}}" style="text-decoration: none; color:inherit">Logout</a></li>
						 
					</ul>
				</div>

	<!-- 			<div class='arrow_box account' style="right: -43px;width: 280px;">
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
					</div> -->
				
			</div>	
			
			<!-- Header Ends -->
			
			<!-- Main Content Starts -->
			<div class="main-content">
				<div class="cd-top search-page">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<form class="search-form">
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="Search">
									</div>
								</form>
							</div>
						</div>
						<!--<div class="row">
							<div class="col-md-12">
								<!-- Content Left -->
								<!--<div class="c-display" style="padding: 0px 80px;margin: 0px auto;">
									<div class="c-head" style="margin-top: 60px;">
										<div class="c-top clearfix">
											<div class="cl-head pull-left">
												<img src="img/user.jpeg" alt="">
												<div class="user-details" style="margin-top: -8px;">
													<h5>
														Phil Kerpen <br>
														<span>Draft</span>
													</h5>
												</div>
											</div>
										</div>
									</div>
								</div>-->
							<!--</div>
						</div>-->
						
						
					
						<div class="row">
							<div  class="col-sm-12">
								<div class="col-md-2 col-sm-2 col-xs-2"> <!-- required for floating -->
									<!-- Nav tabs -->
									<ul class="nav nav-tabs tabs-left tabs-search">
										<li class="active clearfix">
											<a href="#stories" id="all" data-toggle="tab">All 
												<i class="fa fa-angle-right pull-right"></i>
											</a>
										</li>
										<li class="clearfix people">
											<a href="#users" id="people" data-toggle="tab">People 
												<i class="fa fa-angle-right pull-right"></i>
											</a>
										</li>
										<li class="clearfix tag">
											<a href="#tags" id="tag" data-toggle="tab">Tags 
												<i class="fa fa-angle-right pull-right"></i>
											</a>
										</li>
									</ul>
								</div>

								<div class="col-md-10 col-sm-10 col-xs-10">
									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="stories">
											<div class="row">
												<div class="col-md-8">
													<div class="cs-left">
														<h6>Stories</h6>
														<!-- Content Item -->
														@if(count($all_stories)>0)
														@foreach($all_stories as $story) 
														<div class="cl-item" style="padding: 0px;">
															<!-- Content Head -->
														<?php $html=$story->content;
														 $rec=Recommendation::where('story_id',$story->id)->get();
														 $rec_count=count($rec);
														 $comments=Comment::where('story_id',$story->id)->get();
														 $comment_count=count($comments);
													 	   $bkmrk_flag=0;
													 	   $body='';
													       $user=User::find($story->user_id);
											              if(Sentry::check())
											              {
											              $bookmark=Bookmark::where('story_id',$story->id)->where('user_id',Sentry::getUser()->id)->first();
											              if($bookmark != NULL)
											              $bkmrk_flag=1;
												       	   }
													       $doc = new Htmldom($html);
					      								   $title=$doc->find('.graf--first',0);
					      								   if($title && $title->innertext != NULL && $title->innertext!='</br>' && $title->innertext!='<br>')
					      								   $var=htmlentities($title->outertext);
					      								   else
					      								   $var="<h3> Untitled </h3>";
					      								   for($i=0;$i<substr_count($html,'<p');$i++)
						  								   {
						  								   $body=$doc->find("p",$i);
						  								   if($body->innertext!=NULL && $body->innertext!='</br>' && $body->innertext!='<br>')
						  								   break;
						  								   }
						  								   if($body)
					      								   $str_bd=$body->innertext;
					      								   else
					      								   $str_bd="No story content";
					      								   if (str_word_count($str_bd, 0) > 40) {
					      								       $words = str_word_count($str_bd, 2);
					      								       $pos = array_keys($words);
					      								       $text = substr($str_bd, 0, $pos[40]) . '......';
					      								       $flag=0;
					      								      }
					      								   else
					      								   {
					      								   	$text=$str_bd;
					      								   	$flag=1;
					      								   }
					      								   ?>

															<div class="cl-head">
																<a href="{{route('userpage',array($user->id))}}" style="text-decoration:none">
																<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
																<img src="{{asset($image)}}" alt="" />
																<div class="user-details">
																	<h5>
																		{{$user->username}} <br/>
																		
																	</h5>
																</div>
																</a>
															</div>
															<!-- Content Image -->
												
															<!-- Content -->
															<div class="cl-content">
																<a href="{{route('display-story',array($story->id))}}" style="text-decoration: none; color:inherit">
																{{html_entity_decode($var)}} <br>
																{{$text}}</a>
																
															</div>
															<!-- Content Footer -->
															<div class="cl-footer clearfix">
																<h5 class="pull-left">
																	@if($flag==0)
																	<a href="{{route('display-story',array($story->id))}}" style="color: #00ab6b;">Read more</a> 
																	@endif
																	<input type="hidden" id="id_val" value="{{$story->id}}">
																	@if(Sentry::check())
																	@if($bkmrk_flag==0)
																	<a href="#" class="btn-bookmark" onclick="bookmark({{$story->id}});" ><i id="{{$story->id}}" style="color:#808080"  class="fa fa-bookmark"></i></a>
																	@else
																	<a href="#" class="btn-bookmark" onclick="bookmark({{$story->id}});"><i id="{{$story->id}}"style="color:#00ab6b" class="fa fa-bookmark bookmark"></i></a>
																	@endif
																	@else
																	<a href="#" class="btn-bookmark" data-toggle="modal" data-target="#myModal"><i id="bookmark" style="color:#808080"  class="fa fa-bookmark"></i></a>
																	@endif
																</h5>
																<div class="pull-right">
																	<a href="{{route('display-story',array($story->id))}}" style="color: #ccc;">
																		<i class="fa fa-heart"></i>
																		<span>{{$rec_count}}</span>
																	</a>
																	<a href="{{route('display-story',array($story->id))}}">
																	<i class="fa fa-comment"></i>
																	<span>{{$comment_count}}</span>
																	</a>
																</div>
															</div>
															<hr>
														</div>
														@endforeach
														@else
														<div> No Stories Available </div>
														@endif
														
													</div>
												</div>
									
											</div>
										</div>
										<div class="tab-pane" id="users">
											
											<div class="row">
												<div class="col-md-9">
													<div class="cs-left cs-people">
														<h6>People</h6>
														<div class="cr-content clearfix">
															@if(count($users)>0)
															@foreach($users as $user)
															<?php
															$follow_flag=1;
															$logged_in=1;
			                                                if (Sentry::check())
														     {
														       $user_id=Sentry::getUser()->id;
															   $follow=Follow::where('type',2)->where('type_id',$user->id)->where('user_id',$user_id)->first();
														       if($follow != NULL)
														       $follow_flag=0;
														       $logged_in=0;
														     }
														     ?>
															<div class="cs-item clearfix">
																<a href="{{route('userpage',array($user->id))}}" style="text-decoration:none">
																<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
																<img src="{{asset($image)}}" alt="" />
																<div class="cs-content">
																	<h5>{{$user->username}}</h5>
																	<p>{{$user->bio}}</p>
																</div>
															</a>
																@if($logged_in==0)
																<div class="button pull-right">
																	@if($follow_flag==1)
																	<a class="btn btn-green" typ="user" id="{{$user->id}}" onclick="follow_fun({{$user->id}});" style="border-radius: 50px;">Follow</a>
																	@elseif($follow_flag==0)
																	<a class="btn btn-success" typ="user" id="{{$user->id}}" onclick="follow_fun({{$user->id}});" style="border-radius: 50px;">Following</a>
																	@endif
																</div>
																@endif
															</div>
															@endforeach
															@else
															<div> No Users Available </div>
															@endif
															
														</div>
													</div>
												</div>
											</div>
								
										</div>
										<div class="tab-pane" id="tags">
											<div class="row">
												<div class="col-md-9">
													<div class="cs-left">
														<h6>Tags</h6>
														@if(count($tags)>0)
														@foreach($tags as $tag)
														<div class="cr-content cr-public cs-public clearfix">
															<?php
															$follow_flag=1;
															$logged_in=1;
			                                                if (Sentry::check())
														     {
														       $user_id=Sentry::getUser()->id;
															   $follow=Follow::where('type',1)->where('type_id',$tag->id)->where('user_id',$user_id)->first();
														       if($follow != NULL)
														       $follow_flag=0;
														       $logged_in=0;
														     }
														     ?>
															<div class="cs-item clearfix" style="margin-left: -5%;margin-top: 8px;">
																<a href="{{route('tags',array($tag->id))}}" style="text-decoration:none;color:#333">
																<div class="cs-content">
																	<h5>{{$tag->name}}</h5>
																</div>
																@if($logged_in==0)
																<div class="button pull-right">
																	@if($follow_flag==1)
																	<a class="btn btn-green" typ="tag" id="tag{{$tag->id}}" onclick="follow_tag({{$tag->id}});" style="border-radius: 50px;">Follow</a>
																	@elseif($follow_flag==0)
																	<a class="btn btn-success" typ="tag" id="tag{{$tag->id}}" onclick="follow_tag({{$tag->id}});" style="border-radius: 50px;">Following</a>
																	@endif
																</div>
																@endif
															</div>
															
														</div>
														@endforeach
															@else
															<div> No Tags Available </div>
															@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<!-- Main Content Ends -->
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
			$(".modal-body .signin").hide();
			$(".modal-body .signup").hide();
			$(window).scroll(function(){
				var scroll = $(window).scrollTop();
				if (scroll >= 650) {
					$(".header").removeClass("non-active").addClass("active");
				}else {
					$(".header").removeClass("active");
				}
			});

			$(".modal-body .signup").hide();
			$(window).scroll(function(){
				var scroll = $(window).scrollTop();
				if (scroll >= 650) {
					$(".header").removeClass("non-active").addClass("active");
				}else {
					$(".header").removeClass("active");
				}
			});

			$("a.head-modal").click(function(e){
				e.preventDefault();
				$(".modal-body .main-content").show();
				$(".modal-body .signin").hide();
				$(".modal-body .signup").hide();
			});
			
			$("a.sign-link").click(function(e){
				e.preventDefault();
				$(".modal-body .main-content").hide();
				$(".modal-body .signin").show();
			});
			$("a.signup-link").click(function(e){
				e.preventDefault();
				$(".modal-body .main-content").hide();
				$(".modal-body .signup").show();
			});
			$("a.btn-notify").click(function(e){
				e.preventDefault();
				if(!($(".notification").hasClass("active"))){
					$(".notification").fadeIn().addClass("active");	
					$(".account").fadeOut().removeClass("active");
					$(".publish").fadeOut().removeClass("active");
					$(".more").fadeOut().removeClass("active");	
				}
				else{
					$(".notification").fadeOut().removeClass("active");	
				}
			});
			
			$("a.btn-account").click(function(e){
				e.preventDefault();
				if(!($(".account").hasClass("active"))){
					$(".account").fadeIn().addClass("active");	
					$(".notification").fadeOut().removeClass("active");
					$(".publish").fadeOut().removeClass("active");
					$(".more").fadeOut().removeClass("active");	
				}
				else{
					$(".account").fadeOut().removeClass("active");	
				}
			});
			
			$("a.btn-publish").click(function(e){
				e.preventDefault();
				if(!($(".publish").hasClass("active"))){
					$(".publish").fadeIn().addClass("active");	
					$(".account").fadeOut().removeClass("active");	
					$(".notification").fadeOut().removeClass("active");
					$(".more").fadeOut().removeClass("active");
					
				}
				else{
					$(".publish").fadeOut().removeClass("active");
				}
			});
			
			$("a.btn-more").click(function(e){
				e.preventDefault();
				if(!($(".more").hasClass("active"))){
					$(".more").fadeIn().addClass("active");	
					$(".account").fadeOut().removeClass("active");	
					$(".notification").fadeOut().removeClass("active");
					$(".publish").fadeOut().removeClass("active");	
				}
				else{
					$(".more").fadeOut().removeClass("active");	
				}
			});
			
			$("a.help").click(function(e){
				e.preventDefault();
				$(".help-list").addClass("active");	
				$(this).addClass("active");
				$(".main-list").css("display", "none");	
			});
			
			$(".btn-bookmark").click(function(e){
				e.preventDefault();
				if(!($(this).hasClass("active"))){
					$(this).children("i").css("color", "#00ab6b");
					$(this).addClass("active");
				}
				else{
					$(this).children("i").css("color", "#ccc");
					$(this).removeClass("active");
				}
			});
			
			$(".cd-response .form-display a").click(function(e){
				e.preventDefault();
				//alert("hello");
				$(this).parents(".text-disabled").addClass("hidden");
				$(".display-editor").addClass("active");
			});
			
			$(".display-editor a.plus-icon").click(function(e){
				e.preventDefault();
				//alert("hello");
				if(!($(this).hasClass("active"))){
					$(this).addClass("active").children("i").addClass("fa-times").removeClass("fa-plus");
					$(".display-icons").addClass("active");
					$(".display-hidden").addClass("hidden");
				}
				else{
					$(this).removeClass("active").children("i").removeClass("fa-times").addClass("fa-plus");
					$(".display-icons").removeClass("active");
					$(".display-hidden").removeClass("hidden");	
				}
			});
			
			$("a.btn-response-show").click(function(e){
				e.preventDefault();
				//alert("hello");
					$(this).addClass("active").children("i").addClass("fa-times").removeClass("fa-plus");
					$(".display-response").addClass("active");
					$(".cd-respond").addClass("hidden");
			});

			$('.account').mouseleave(function(){
		  	$(".account").fadeOut().removeClass("active");	
		  });


			
		});	

      function follow_fun(id)
       {
       	 var user_id=id
   	 	 var text=$("#"+user_id).text();
   	 	 if(text == 'Follow')
   	 	  {
   	 	  	$.ajax({
   	 	  		type:"POST",
   	 	  		url: "{{route('follow')}}",
   	 	  		data:{'tag_id': user_id,'type':2},
   	 	  		success:function(data)
   	 	  		{
   	 	  			$("#"+user_id).removeClass("btn btn-green");
   	        		$("#"+user_id).addClass("btn btn-success");
   	 	  			$("#"+user_id).text('Following');
   	 	  		
   	 	  		}
   	 	  	});
   	 	  }
   	 	  else if(text=='Following')
   	 	  {
   	 	  	 $.ajax({
   	 	  		type:"POST",
   	 	  		url: "{{route('unfollow')}}",
   	 	  		data:{'tag_id': user_id,'type':2},
   	 	  		success:function(data)
   	 	  		{
   	 	  			$("#"+user_id).removeClass("btn btn-success");
   	        		$("#"+user_id).addClass("btn btn-green");
   	 	  			$("#"+user_id).text('Follow');
   	 	  		}
   	 	  	});
   	 	  }
       }

       function follow_tag(id)
       {
       	 var tag_id=id
   	 	 var text=$("#tag"+tag_id).text();
   	 	 if(text == 'Follow')
   	 	  {
   	 	  	$.ajax({
   	 	  		type:"POST",
   	 	  		url: "{{route('follow')}}",
   	 	  		data:{'tag_id': tag_id,'type':1},
   	 	  		success:function(data)
   	 	  		{
   	 	  			$("#tag"+tag_id).removeClass("btn btn-green");
   	        		$("#tag"+tag_id).addClass("btn btn-success");
   	 	  			$("#tag"+tag_id).text('Following');
   	 	  			// location.reload();
   	 	  			// $(".tag").addClass('active');
   	 	  			// $("#tag").attr("aria-expanded","true");
   	 	  		}
   	 	  	});
   	 	  }
   	 	  else if(text=='Following')
   	 	  {
   	 	  	 $.ajax({
   	 	  		type:"POST",
   	 	  		url: "{{route('unfollow')}}",
   	 	  		data:{'tag_id': tag_id,'type':1},
   	 	  		success:function(data)
   	 	  		{
   	 	  			$("#tag"+tag_id).removeClass("btn btn-success");
   	        		$("#tag"+tag_id).addClass("btn btn-green");
   	 	  			$("#tag"+tag_id).text('Follow');
   	 	  			// location.reload();
   	 	  			// $(".tag").addClass('active');
   	 	  			// $("#tag").attr("aria-expanded","true");
   	 	  		}
   	 	  	});
   	 	  }
       }

       function bookmark(id)
		{
			var story_id=id;
				if($("#"+story_id).hasClass("bookmark"))
				{
				$.ajax({
			   		type:"POST",
			   		url:"{{route('unbookmark')}}",
			   		data:{'story_id' : story_id},
			   		success:function(data)
			   		{
			   			$("#"+story_id).css("color","#808080");
			   			$("#"+story_id).removeClass("bookmark")
			   		}
			   	});	
			   }
			   else
			   {
			   	$.ajax({
					type:"POST",
					url:"{{route('bookmark')}}",
					data:{'story_id': story_id},
					success:function(data)
					{
						$("#"+story_id).css("color", "#00ab6b");
						$("#"+story_id).addClass("bookmark")
					}

				});
			   }
		}
	</script>
  </body>
</html>
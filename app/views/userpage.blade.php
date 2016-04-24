@include('partials.header3')

<style>
.btn-bookmark{
			margin-left:1%;
    		color: #ccc;
    	}
  </style>
			
			<!-- Main Content Starts -->
			<div class="main-content">
				<div class="cd-top">
					<div class="content-display">
						<div class="profile-head other-user-profile text-center">
							<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
							<img src="{{asset($image)}}" alt="" />
							<h2>{{$user->username}}</h2>
							<h5>{{$user->bio}}</h5>
							<div class="following-outer container">
								<div class="row">
									<div class="col-md-6 col-pad">
										<h5>Following</h5>
										<h3>{{$following}}</h3>
									</div>
									<div class="col-md-6 col-pad">
										<h5>Followers</h5>
										<h3>{{$followers}}</h3>
									</div>
								</div>
								<div class="button">
								@if(Sentry::check())
								
									@if($follow_flag==1)
									<a  id="follow" class="btn btn-green" style="border-radius: 50px;">Follow</a>
									@elseif($follow_flag==0)
									<a  id="follow" class="btn btn-success" style="border-radius: 50px;">Following</a>
									@endif
								
								@endif
								      <?php

								        $throttle = Sentry::findThrottlerByUserId($user->id);
								      

								      ?>
								      @if(Sentry::check())
								      @if(Sentry::getUser()->hasAccess('admin'))
								      @if($throttle->isBanned())
								        <a href="{{URL::to('unban/'.$user->id)}}" class="btn btn-success" style="border-radius: 50px;"> Unban </a> </td>
								      @else
								    	@if($user->id!=Sentry::getUser()->id)
								         <a href="{{URL::to('ban/'.$user->id)}}" class="btn btn-green" style="border-radius: 50px;"> Ban </a> 
								    	@endif
								    
								      @endif
								      @endif
								      @endif
								</div>

							</div>
						</div>
						
		
					</div>
				</div>
			</div>
			<!-- Main Content Ends -->
		</div>
		
								<div class="profile-content">
							@if(count($rec_stories)>0)
							<div class="profile-item cl-item">
								<div class="text-center">
									<a class="profile-text" style="">most recommended story</a>	
								</div>
								
								
								<div class="container">
								@foreach($rec_stories as $story)
									
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
      								   <div class="cl-item">
									<div class="cl-head clearfix">
										<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
										<img src="{{asset($image)}}" alt="">
										<div class="user-details" style="margin-top: -8px;">
											<h5>
												{{$user->username}} 
											</h5>
										</div>
									</div>
									<div class="cl-content">
									<a href="{{route('display-story',array($story->id))}}" style="text-decoration: none; color:inherit">
										{{html_entity_decode($var)}} <br>
									{{$text}}</a>
									</div>
									<!-- Content Footer -->

									<div class="cl-footer clearfix">
										@if($flag==0)
										<h5 class="pull-left">
											<a href="{{route('display-story',array($story->id))}}" style="color: #00ab6b;">Read more</a> 
										</h5>
										@endif
										<input type="hidden" id="id_val" value="{{$story->id}}">
										@if(Sentry::check())
										@if($bkmrk_flag==0)
										<a  class="btn-bookmark" onclick="myFun({{$story->id}});" ><i id="{{$story->id}}" style="color:#808080;"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
										@else
										<a  class="btn-bookmark" onclick="myFun({{$story->id}});"><i id="{{$story->id}}"style="color:#00ab6b" class="fa fa-bookmark bkmrk{{$story->id}}  bookmark"></i></a>
										@endif
										@else
										<a  class="btn-bookmark" data-toggle="modal" data-target="#myModal"><i id="bookmark" style="color:#808080"  class="fa fa-bookmark"></i></a>
										@endif
										<div class="pull-right">
											<a href="{{route('display-story',array($story->id))}}" style="text:decoration:none;color: #808080;">
												<i class="fa fa-heart"></i>
												<span>{{$rec_count}}</span>
											</a>
											<a href="{{route('display-story',array($story->id))}}"  style="text:decoration:none;color: #808080;">
											<i class="fa fa-comment"></i>
											<span>{{$comment_count}}</span>
											</a>
										</div>
									</div>
									</div>
									<br>
								@endforeach

								</div>
								
							</div>
							@endif
							@if(count($stories)>0)
							<div class="profile-item">
								
								<div class="text-center">
									<a  class="profile-text" style="">latest stories</a>	
								</div>
								<div class="container">
							@foreach($stories as $story)
								
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
									<div class="pi-content">
										<div class="cl-item">
										<div class="cl-head clearfix">
											<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
											<img src="{{asset($image)}}" alt="">
											<div class="user-details" style="margin-top: -8px;">
												<h5>
													{{$user->username}}
											
												</h5>
											</div>
										</div>
									<div class="cl-content">
									<a href="{{route('display-story',array($story->id))}}" style="text-decoration: none; color:inherit">
										{{html_entity_decode($var)}} <br>
									{{$text}}</a>
									</div>
									<!-- Content Footer -->
									<br>
									<div class="cl-footer clearfix">
										@if($flag==0)
										<h5 class="pull-left">
											<a href="{{route('display-story',array($story->id))}}" style="color: #00ab6b;">Read more</a> 
										</h5>
										@endif
										<input type="hidden" id="id_val" value="{{$story->id}}">
										@if(Sentry::check())
										@if($bkmrk_flag==0)
										<a  class="btn-bookmark" onclick="myFun({{$story->id}});" ><i id="{{$story->id}}" style="color:#808080"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
										@else
										<a  class="btn-bookmark" onclick="myFun({{$story->id}});"><i id="{{$story->id}}"style="color:#00ab6b" class="fa fa-bookmark bkmrk{{$story->id}} bookmark"></i></a>
										@endif
										@else
										<a class="btn-bookmark" data-toggle="modal" data-target="#myModal"><i id="bookmark" style="color:#808080"  class="fa fa-bookmark"></i></a>
										@endif
										<div class="pull-right">
											<a href="{{route('display-story',array($story->id))}}" style="text:decoration:none;color: #808080;">
												<i class="fa fa-heart"></i>
												<span>{{$rec_count}}</span>
											</a>
											<a href="{{route('display-story',array($story->id))}}" style="text:decoration:none;color: #808080;">
											<i class="fa fa-comment"></i>
											<span>{{$comment_count}}</span>
											</a>
										</div>
									</div>
									
									<br>
								
									</div>
								</div>
									@endforeach
									</div>
									</div>
									@else
									<div style="margin-left: 45%;">No Stories posted yet..</div>
									@endif	
									
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
				if (scroll >= 70) {
					$(".c-right").addClass("active");
				}else {
					$(".c-right").removeClass("active");
				}
			});
			
			$("a.sign-link").click(function(e){
				e.preventDefault();
				$(".modal-body .main-content").hide();
				$(".modal-body .signin-content").show();
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
			
			$(".bookmark").click(function(e){
				e.preventDefault();
				if(!($(this).hasClass("active"))){
					$(this).children("i").addClass("fa-bookmark").removeClass("fa-bookmark-o");
					$(this).addClass("active");
				}
				else{
					$(this).children("i").addClass("fa-bookmark-o").removeClass("fa-bookmark");
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
			
			$("a.btn-edit").click(function(e){
				e.preventDefault();
				$(this).parents(".edit-outer").addClass("hidden");
				$(this).parents(".setting-item").children(".setting-email-form").addClass("active");
			});
			
			$("a.btn-save").click(function(e){
				e.preventDefault();
				//alert("hello");
				$(this).parents(".profile-head").children(".following-outer").css("display","block");
				$(this).parents(".profile-head").children(".edit-form").removeClass("active");
			});
			
			$("a.btn-cancel").click(function(e){
				e.preventDefault();
				//alert("hello");
				$(this).parents(".profile-head").children(".following-outer").css("display","block");
				$(this).parents(".profile-head").children(".edit-form").removeClass("active");
			});
			
			$("a.btn-password").click(function(e){
				e.preventDefault();
				//alert("hello");
				$(this).parents(".edit-outer").addClass("hidden");
				$(this).parents(".setting-item").children(".setting-password-form").addClass("active");
			});
			
			$("a.edit-profile-btn").click(function(e){
				e.preventDefault();
				//alert("hello");
				$(this).parents(".profile-head").children("h2").css("display","none");
				$(this).parents(".profile-head").children(".following-outer").css("display","none");
				$(this).parents(".profile-head").children(".edit-form").addClass("active");
			});
			
		});	
	
	
	$("#follow").click(function()
	{
	  var text=$("#follow").text();
	  if(text == 'Follow')
	  {
	  	$.ajax({
	  		type:"POST",
	  		url: "{{route('follow')}}",
	  		data:{'tag_id': "{{$user->id}}",'type':2},
	  		success:function(data)
	  		{
	  			$("#follow").removeClass("btn btn-green");
       		 	$("#follow").addClass("btn btn-success");
	  			$('#follow').text('Following');
	  			location.reload();
	  		}
	  	});
	  }
	  else if(text=='Following')
	  {
	  	 $.ajax({
	  		type:"POST",
	  		url: "{{route('unfollow')}}",
	  		data:{'tag_id': "{{$user->id}}",'type':2},
	  		success:function(data)
	  		{
	  			$("#follow").removeClass("btn btn-success");
       		 	$("#follow").addClass("btn btn-green");
	  			$('#follow').text('Follow');
	  			location.reload();
	  		}
	  	});
	  }
	  
	});
	
	</script>
	<script>

		function myFun(id)
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
			   			$(".bkmrk"+story_id).css("color","#808080");
			   			$(".bkmrk"+story_id).removeClass("bookmark");
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
						$(".bkmrk"+story_id).css("color", "#00ab6b");
						$(".bkmrk"+story_id).addClass("bookmark");
					}

				});
			   }
		}
				

		</script>
  </body>
</html>
@include('partials.header2')			
			<!-- Main Content Starts -->
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

    <?php 
          $user_id=$story->user_id;
          $user=User::find($user_id);?>

			<div class="main-content">
				<div class="cd-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<!-- Content Left -->
								<div class="c-display" style="padding: 0px 80px;max-width: 800px;margin: 0px auto;">
									<div class="c-head" style="margin-top: 60px;">
										<div class="c-top clearfix" style="margin-left:-10%">
											<a href="{{route('userpage',array($story->user_id))}}" style="text-decoration:none">
											<div class="cl-head pull-left">
												<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
												<img src="{{asset($image)}}" alt="">
												<div class="user-details" style="margin-top: -8px;">
													<h5>
														{{$user->username}} <br>
														
													</h5>
												</div>
											</div>
										</a>
											<div class="pull-right">
												<i class="fa fa-heart" style="color: #ccc;margin-right: 3px;"></i>
												<p style="display: inline;margin: 0px;color: #ccc;font-size: 13px;"><a  style="color: #ccc;"><a  id ="head_rec" style="color: #ccc;">{{$rec_count}} people</a> recommended</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			 <div id="display-story" style="margin-left:-5%;" edit="false">
   					 {{$story->content}}
				</div>
					<div class="content-display">
					<div class="container" style="max-width: 800px;">
					
							
							<div class="cd-item clearfix">
								<div class="cd-item-icon pull-left">
									@if(!Sentry::check())
									<a  data-toggle="modal" data-target="#myModal"><i class="<?php if($flag==0)echo "fa fa-heart-o";else echo "fa fa-heart" ?>" style=""></i> <span id="rec_span">{{$rec_count}}</span></a>
									<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-comment-o" style="color: rgba(0,0,0,0.6);"></i> <span id="comment_span">{{count($comments)}}</span> </a>
									@else
									
									<a style="text-decoration:none"><i id="recommend" class="<?php if($flag==0)echo "fa fa-heart-o";else echo "fa fa-heart" ?>" style=""></i> <span id="rec_span">{{$rec_count}}</span></a>
									<a id="comment" href="#"><i class="fa fa-comment-o" style="color: rgba(0,0,0,0.6);"></i> <span id="comment_span">{{count($comments)}}</span> </a>
									@endif

								</div>
								@if(Sentry::check())
								<?php $crr_user=User::find(Sentry::getUser()->id);
									  $current_user=$crr_user->username;
									  $image=($crr_user->picture)?$crr_user->picture:Config::get('app.default_dp');
								?>
								<input type="hidden" id="currentname" value="{{$current_user}}">
								<input type="hidden" id="image" value="{{$image}}">
								@endif
								<input type="hidden" id="username" value="{{$user->username}}">
								<div class="cd-item-right-icon pull-right">
									@if(Sentry::check())
										@if($bkmrk_flag==0)
										<a href="#" class="btn-bookmark"><i id="bookmark" style="color:#808080"  class="fa fa-bookmark"></i></a>
										@else
										<a href="#" class="btn-bookmark"><i id="bookmark" style="color:#00ab6b" class="fa fa-bookmark bookmark"></i></a>
										@endif
										@else
										<a href="#" class="btn-bookmark" data-toggle="modal" data-target="#myModal"><i id="bookmark" style="color:#808080"  class="fa fa-bookmark"></i></a>
										@endif
										  <?php

										    $throttle = Sentry::findThrottlerByUserId($user->id);
										  ?>
										  @if(Sentry::check())
										  @if(Sentry::getUser()->hasAccess('admin'))
										    <a href="{{route('delete-story',array($story->id))}}" class="btn btn-success" style="border-radius: 50px;"> Delete </a> </td>
										  @endif
										  @endif
								</div>
							</div>
							
							<hr>
							
							<div class="cd-response clearfix">
								<div class="text-disabled clearfix" id="text_comment">
									<span class="circle"><i class="fa fa-user"></i></span>
									<div class="form-group form-display">
										@if(Sentry::check())
										<a class="response" href="#">
											<input type="text" class="form-control" placeholder="Write a response..." >
										</a>
										@else
										<a href="#" data-toggle="modal" data-target="#myModal">
											<input type="text" class="form-control" placeholder="Write a response..." >
										</a>
										@endif

									</div>
								</div>
								<div class="display-editor clearfix">
									<div class="form-write clearfix">
										<span  class="circle" style="float: none;"><i class="fa fa-user"></i></span> <strong><?php if(Sentry::check()) echo Sentry::getUser()->username ;?></strong>
									</div>
									
									<div class="display-hidden">
										<div class="form-group form-display">
											<textarea id="comment_txt" class="form-control" rows="3"></textarea>
										</div>
									</div>
									<div class="btn-group">
										<button class="btn btn-green" id="comment_submit" type="submit" style="border-radius: 50px;">Publish</button>
									</div>
								</div>
							</div> 	
							
							<hr>
							
							<h5 style="color: #000;margin-top: 50px;">Responses</h5>
							<hr>
						
							<div class="cd-respond clearfix">
								<br/>
								<a href="#" class="btn btn-default btn-response-show" type="submit" style="border-radius: 50px;margin: 15px 0px;">Show Response</a>
							</div>
							
							<div class="display-response clearfix" id="response">
							@foreach($comments as $comment)
							<?php $user=User::find($comment->user_id);?>
								<div class="dr-item">
									<div class="cl-head">
										<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
										<img src="{{asset($image)}}" alt="">
										<div class="user-details" style="margin-top: -8px;">
											<h5>
												{{$user->username}} <br>
											</h5>
										</div>
										<p style="margin: 20px 0px;">{{$comment->content}}</p>
									</div>
								</div>
								
								<hr>
							 @endforeach
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- Main Content Ends -->
		</div>
		


	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
    editor = new Dante.Editor(
            {
                id:"{{$story->id}}",
                el: "#display-story",
                debug: false,
                upload_url: "{{route('upload-story-image')}}",
                oembed_url: "{{Config::get('app.embedly_app_oembed_url') . '?key=' . Config::get('app.embedly_app_key') . '&url='}}",
                extract_url: "{{Config::get('app.embedly_app_extract_url') . '?key=' . Config::get('app.embedly_app_key') . '&url='}}"
            }
    )
    editor.start()
    </script>
	
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
			
						$(".modal-body .signup").hide();
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
				}
				else{
					$(".account").fadeOut().removeClass("active");	
				}
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
			
			$(".response").click(function(e){
				e.preventDefault();
				$(this).parents(".text-disabled").addClass("hidden");
				$(".display-editor").addClass("active");

			});
			
			$("#comment").click(function(e){
				e.preventDefault();
				if($('#username').val()!=-1)
				{
				//alert("hello");
				$("#text_comment").addClass("hidden");
				$(".display-editor").addClass("active");
				}
			});
			
			
			$("a.btn-response-show").click(function(e){
				e.preventDefault();
				//alert("hello");
					$(this).addClass("active").children("i").addClass("fa-times").removeClass("fa-plus");
					$(".display-response").addClass("active");
					$(".cd-respond").addClass("hidden");
			});

			$("a.head-modal").click(function(e){
				e.preventDefault();
				$(".modal-body .main-content").show();
				$(".modal-body .signin").hide();
				$(".modal-body .signup").hide();
			});
				

			$("#comment_submit").click(function(){
				var html=document.getElementById("response").innerHTML;
				$.ajax({
			    type:"POST",
			    url:"{{route('update-comment')}}",
			    data:{'story_id' : "{{$story->id}}",'comment' : $("#comment_txt").val()},
			    success:function(data)
			    {
			    	$(".display-editor").removeClass("active");	
			    	$("#text_comment").removeClass("hidden");
			    	var img_value=$('#image').val();
				    html +="<div class='dr-item'><div class='cl-head'><img src='{{asset('')}}"+img_value+"' alt=''><div class='user-details' style='margin-top: -8px;''><h5>"+$('#currentname').val()+"<br></h5></div><p style='margin: 20px 0px;'>"+$('#comment_txt').val()+"</p>";

					document.getElementById("response").innerHTML = html;
					$("#comment_span").text(data);
			    	
			    }

			  });
		  });

			    $('#recommend').click(function(){
			    if($("#recommend").hasClass("fa fa-heart-o"))
			    {
			        $("#recommend").attr('disabled','disabled');
			        $("#recommend").removeClass("fa fa-heart-o");
			        $("#recommend").addClass("fa fa-heart");
			        $.ajax({
			        type:"POST",
			        url:"{{route('recommend')}}",
			        data:{'story_id': "{{$story->id}}"},
			        success:function(data)
			        {
			            $("#recommend").removeAttr('disabled');
			            $("#rec_span").text(data);
			            $("#head_rec").text(data);
			        }
			    });
			    }
			    else
			    {
			        $("#recommend").attr('disabled','disabled');
			        $("#recommend").removeClass("fa fa-heart");
			        $("#recommend").addClass("fa fa-heart-o"); 
			        $.ajax({
			        type:"POST",
			        url:"{{route('undo-recommend')}}",
			        data:{'story_id': "{{$story->id}}"},
			        success:function(data)
			        {
			            $("#recommend").removeAttr('disabled');
			            $("#rec_span").text(data);
			            $("#head_rec").text(data);
			        }
			    });  
			    }
			 
			});

			  $("a.btn-bookmark").click(function(e){
				e.preventDefault();
				if($("#bookmark").hasClass("bookmark"))
				{
				$.ajax({
			   		type:"POST",
			   		url:"{{route('unbookmark')}}",
			   		data:{'story_id' : "{{$story->id}}"},
			   		success:function(data)
			   		{
			   			$("#bookmark").css("color","#808080");
			   			$("#bookmark").removeClass("bookmark")
			   		}
			   	});	
			   }
			   else
			   {
			   	$.ajax({
					type:"POST",
					url:"{{route('bookmark')}}",
					data:{'story_id': "{{$story->id}}"},
					success:function(data)
					{
						$("#bookmark").css("color", "#00ab6b");
						$("#bookmark").addClass("bookmark")
					}

				});
			   }

			
			});
			
		});	
	</script>
  </body>
</html>
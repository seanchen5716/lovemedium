@include('partials.header3')

<style>
.btn-bookmark{
			margin-left:1%;
    		color: #ccc;
    	}
  </style>
			
			<!-- Main Content Starts -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
							<!-- Content Left -->
							<div class="c-left" style="padding: 0px 80px;">
							
								<div class="c-head" style="margin-top: 60px;">
									<div class="c-top clearfix">
										<div class="pull-left">
											<span>Tagged in</span>
											<h3>{{$name}}</h3>
										</div>
										@if(Sentry::check())
										<div class="pull-right" >
											@if($follow_flag==1)
											<a  id="follow" class="btn btn-green" style="border-radius: 50px;">Follow</a>
											@elseif($follow_flag==0)
											<a  id="follow" class="btn btn-success" style="border-radius: 50px;">Following</a>
											@endif
										</div>
										@endif
									</div>
									
									<!-- Nav tabs -->
									<ul class="nav nav-tabs">
										<li class="active"><a href="#top" data-toggle="tab">Home</a></li>
									</ul>
								</div>
								@if(count($stories)>0)
							    @foreach($stories as $story) 
								<!-- Tab panes -->
								<div class="tab-content" style="margin-top: 60px;">
									<div class="tab-pane active" id="top">
										<!-- Content Item -->
										<div class="cl-item" style="padding: 0px;">
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
											<!-- Content Head -->
											<div class="cl-head">
												<a href="{{route('userpage',array($story->user_id))}}" style="text-decoration:none">
												<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
												<img src="{{asset($image)}}" alt="" />
												<div class="user-details">
													<h5>
														{{$user->username}} <br/>
													</h5>
												</div>
											</a>
											</div>
											<!-- Content -->
											<div class="cl-content">
												<a href="{{route('display-story',array($story->id))}}" style="text-decoration: none; color:inherit">
											{{html_entity_decode($var)}} <br>
											{{$text}}</a>
											</div>
											<!-- Content Footer -->
											<div class="cl-footer clearfix">
												@if($flag==0)
												<h5 class="pull-left">
													<a href="{{route('display-story',array($story->id))}}" style="text-decoration: none;" style="color: #00ab6b;">Read more</a> 
												</h5>
												@endif
												@if(Sentry::check())
												@if($bkmrk_flag==0)
												<a class="btn-bookmark" onclick="myFun({{$story->id}});" ><i id="{{$story->id}}" style="color:#808080"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
												@else
												<a  class="btn-bookmark" onclick="myFun({{$story->id}});"><i id="{{$story->id}}"style="color:#00ab6b" class="fa fa-bookmark bkmrk{{$story->id}} bookmark"></i></a>
												@endif
												@else
												<a  class="btn-bookmark head-modal" data-toggle="modal" data-target="#myModal"><i id="bookmark" style="color:#808080"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
												@endif
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
 								
									</div>
								</div>
								@endforeach
								@else
								<div> No Stories Available </div>
								@endif
							</div>
						</div>
						
						
						<div class="col-md-4 col-pad content-right">
							<div class="c-right c-tag">
								<div class="cr-top clearfix">
									<hr>
									<h5 class="pull-left">Featured Tags</h5>
								</div>
								
								<div class="cr-content clearfix">
									@if(count($tags)>0)
									@foreach($tags as $tag)
									<a href="{{route('tags',array($tag->id))}}">{{$tag->name}}</a>	
									@endforeach
									@endif
								</div>	
								
								
		
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Main Content Ends -->
		</div>
		

	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
 <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
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
			
			
		});	
	</script>
	<script>
	$("#follow").click(function()
	{
	  var text=$("#follow").text();
	  if(text == 'Follow')
	  {
	  	$.ajax({
	  		type:"POST",
	  		url: "{{route('follow')}}",
	  		data:{'tag_id': "{{$tag_id}}",'type':1},
	  		success:function(data)
	  		{
	  			$("#follow").removeClass("btn btn-green");
       		 	$("#follow").addClass("btn btn-success");
	  			$('#follow').text('Following');;
	  		}
	  	});
	  }
	  else if(text=='Following')
	  {
	  	 $.ajax({
	  		type:"POST",
	  		url: "{{route('unfollow')}}",
	  		data:{'tag_id': "{{$tag_id}}",'type':1},
	  		success:function(data)
	  		{
	  			$("#follow").removeClass("btn btn-success");
       		 	$("#follow").addClass("btn btn-green");
	  			$('#follow').text('Follow');;
	  		}
	  	});
	  }
	  
	});
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
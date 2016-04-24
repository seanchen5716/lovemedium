@extends('layout')

@section('content')

<style>
.btn-bookmark{
			margin-left:1%;
    		color: #ccc;
    	}
  </style>
			
			<!-- Header Ends -->
			
			<!-- Main Content Starts -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-7">
							<!-- Content Left -->
							<div class="c-left ">
								<!-- Content Item -->
								<div class="tab-content">
								    <div id="home" class="tab-pane fade in active">
								 @if(count($stories)>0)
								 @foreach($stories as $story) 

								<div class="cl-item">
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
      								   if (str_word_count($str_bd, 0) > 100) {
      								       $words = str_word_count($str_bd, 2);
      								       $pos = array_keys($words);
      								       $text = substr($str_bd, 0, $pos[100]) . '......';
      								       $flag=0;
      								      }
      								   else
      								   {
      								   	$text=$str_bd;
      								   	$flag=1;
      								   }
      								   ?>
      								<a href="{{route('userpage',array($story->user_id))}}" style="text-decoration:none">
									<div class="cl-head">
									   <?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
										<img src="{{asset($image)}}" alt="" />
										<div class="user-details">
											<h5>
												{{$user->username}} <br/>
												
											</h5>
										</div>
									</div>
									</a>
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
											<a href="{{route('display-story',array($story->id))}}" style="text-decoration:none;color: #00ab6b;">Read more</a> 
										</h5>
										@endif
										<input type="hidden" id="id_val" value="{{$story->id}}">
										@if(Sentry::check())
										@if($bkmrk_flag==0)
										<a  class="btn-bookmark" onclick="myFun({{$story->id}});" ><i id="{{$story->id}}" style="color:#808080"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
										@else
										<a class="btn-bookmark" onclick="myFun({{$story->id}});"><i id="{{$story->id}}"style="color:#00ab6b" class="fa fa-bookmark bkmrk{{$story->id}} bookmark"></i></a>
										@endif
										@else
										<a class="btn-bookmark head-modal" data-toggle="modal" data-target="#myModal"><i id="bookmark" style="color:#808080"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
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
									
									<br>
								</div>
								@endforeach
								@else
								<div style="margin-top: 3%;"> No Stories Available </div>
								@endif
								<!-- Content Item -->
								</div>

						    <div id="top" class="tab-pane fade">
						    @if(count($top_stories)>0)
							@foreach($top_stories as $story) 

								<div class="cl-item">
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
      								   if (str_word_count($str_bd, 0) > 100) {
      								       $words = str_word_count($str_bd, 2);
      								       $pos = array_keys($words);
      								       $text = substr($str_bd, 0, $pos[100]) . '......';
      								       $flag=0;
      								      }
      								   else
      								   {
      								   	$text=$str_bd;
      								   	$flag=1;
      								   }
      								   ?>
                                    <a href="{{route('userpage',array($story->user_id))}}" style="text-decoration:none">
									<div class="cl-head">
										<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
										<img src="{{asset($image)}}" alt="" />
										<div class="user-details">
											<h5>
												{{$user->username}} <br/>
												
											</h5>
										</div>
									</div>
									</a>
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
											<a href="{{route('display-story',array($story->id))}}" style="color: #00ab6b;">Read more</a> 
										</h5>
										@endif
										<input type="hidden" id="id_val" value="{{$story->id}}">
										@if(Sentry::check())
										@if($bkmrk_flag==0)
										<a class="btn-bookmark" onclick="myFun({{$story->id}});" ><i id="{{$story->id}}" style="color:#808080"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
										@else
										<a  class="btn-bookmark" onclick="myFun({{$story->id}});"><i id="{{$story->id}}"style="color:#00ab6b" class="fa fa-bookmark bkmrk{{$story->id}} bookmark"></i></a>
										@endif
										@else
										<a class="btn-bookmark head-modal" data-toggle="modal" data-target="#myModal"><i id="bookmark" style="color:#808080"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
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
									
									<br>
								</div>
								@endforeach
								@else
								<div style="margin-top: 3%;"> No Stories Available </div>
								@endif
  
						    </div>
						    <div id="bkmrk_pg" class="tab-pane fade">
						    @if(count($bm)>0)
  							@foreach($bm as $bkmrk) 

							<div class="cl-item">
								<!-- Content Head -->
							 <?php
							 	   $story=Story::where('id',$bkmrk->story_id)->first();
							 	   $html=$story->content;
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
								   if (str_word_count($str_bd, 0) > 100) {
								       $words = str_word_count($str_bd, 2);
								       $pos = array_keys($words);
								       $text = substr($str_bd, 0, $pos[100]) . '......';
								       $flag=0;
								      }
								   else
								   {
								   	$text=$str_bd;
								   	$flag=1;
								   }
								   ?>
								<a href="{{route('userpage',array($story->user_id))}}" style="text-decoration:none">
								<div class="cl-head">
									<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
									<img src="{{asset($image)}}" alt="" />
									<div class="user-details">
										<h5>
											{{$user->username}} <br/>
											
										</h5>
									</div>
								</div>
								</a>
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
										<a href="{{route('display-story',array($story->id))}}" style="color: #00ab6b;">Read more</a> 
									</h5>
									@endif
									<input type="hidden" id="id_val" value="{{$story->id}}">
									@if(Sentry::check())
										@if($bkmrk_flag==0)
										<a class="btn-bookmark" onclick="myFun({{$story->id}});" ><i id="{{$story->id}}" style="color:#808080"  class="fa fa-bookmark bkmrk{{$story->id}}"></i></a>
										@else
										<a class="btn-bookmark" onclick="myFun({{$story->id}});"><i id="{{$story->id}}"style="color:#00ab6b" class="fa fa-bookmark bkmrk{{$story->id}} bookmark"></i></a>
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
								
								<br>
							</div>
							@endforeach
							@else
							<div style="margin-top: 3%;"> No bookmarked Stories </div>
							@endif
						    </div>
							  </div>
							</div>
						</div>
						
						
						<div class="col-md-5 col-pad content-right">
							<div class="c-right">
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
								<div class="cr-advertise">
									<img src="{{asset('img/advertise.png')}}" alt="" />
									<div class="cr-adv-content">
										<h3>Anyone can write on Medium.</h3>
										@if(!Sentry::check())
										<a class="head-modal" data-toggle="modal" data-target="#myModal">Start writing</a>
										@else
										<a href="{{route('blog_editor')}}" >Start writing</a>
										@endif

									</div>
								</div>
								
								<div class="cr-bottom">
									<div class="cr-top clearfix" style="padding: 0px 0px 20px;">
										<hr>
										<h5 class="pull-left">Top stories on medium</h5>	
									</div>

									<div class="cr-listing">
										<?php $i=0; ?>
										     @if(count($top_stories)>0)
											 @foreach($top_stories as $story)
											 <?php
											 $i++;?>
											 @if($i<=5)
										<div class="cr-item">
											<span>{{$i}}</span>
									    <?php
									    $html=$story->content;
								        $user=User::find($story->user_id);
								        $doc = new Htmldom($html);
	  								    $title=$doc->find('.graf--first',0);
	  								    if($title && $title->innertext != NULL && $title->innertext!='</br>' && $title->innertext!='<br>')
	  								    $var=$title->plaintext;
	  								    else
	  								    $var="Untitled";
	  								    if($var == '')
	  								    $var="Untitled"; ?>
											<div class="cr-list-content">
												<a href="{{route('display-story',array($story->id))}}" style="text-decoration:none;color: #333;font-size: 18px;">{{$var}}</a>
												<br/>
												<a href="{{route('userpage',array($story->user_id))}}" style="text-decoration:none;color: #aaa;">{{$user->username}}</a>
											</div>
										</div>
										@endif
										@endforeach
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Main Content Ends -->
		</div>
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

@stop
		
@include('partials.writestory_header')
			
			<!-- Main Content Starts -->
			<div class="main-content" style="margin-left:-9%">
				<div class="cd-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<!-- Content Left -->
								<div class="c-display" style="padding: 0px 80px;max-width: 800px;margin: 0px auto;">
									<div class="c-head" style="margin-top: 60px;">
										<div class="c-top clearfix">
											<div class="cl-head pull-left">
												<?php $image=($user->picture)?$user->picture:Config::get('app.default_dp');?>
												<img src="{{asset($image)}}" alt="">
												<div class="user-details" style="margin-top: -8px;">
													<h5>
														{{$user->username}} <br>
													</h5>
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
					
					
					
			<div id="new-story" style="margin-left:-5%;" edit="true">
			</div>
		
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
    editor = new Dante.Editor(
            {
                id:"{{$id}}",
                el: "#new-story",
                debug: false,
                upload_url: "{{route('upload-story-image')}}",
                store_url: "{{route('save-story')}}",
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
			
			$("a.btn-response-show").click(function(e){
				e.preventDefault();
				//alert("hello");
					$(this).addClass("active").children("i").addClass("fa-times").removeClass("fa-plus");
					$(".display-response").addClass("active");
					$(".cd-respond").addClass("hidden");
			});
			
		});	
	</script>
  </body>
</html>
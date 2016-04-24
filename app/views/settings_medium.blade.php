@include('partials.header3')
			
			<!-- Main Content Starts -->
			<div class="main-content">
				<div class="cd-top">
					<div class="content-display">
						<div class="container" style="max-width: 800px;">
							<div class="settings">
								<h1>Settings</h1>
								<div class="setting-item clearfix">
									<h6>Email Settings</h6>
									<hr>
									<div class="edit-outer clearfix" id="outer_email">
										<div class="setting-details">
											<h4>Your email</h4>
											<p>{{$user->email}}</p>
										</div>
										<div class="button pull-right">
											<a href="#" class="btn btn-default btn-edit" style="border-radius: 50px;margin-top:25px;">Edit Email</a>
										</div>
									</div>	
									<div class="setting-email-form setting-form" id="set_email">
										<form>
											<div class="row">
												<div class="col-md-9">
													<div class="form-group">
														<label>Email address</label>
														<input type="email" class="form-control" id="email" placeholder="Email" value="{{$user->email}}">
													</div>
												</div>
												<div class="col-md-3 clearfix">
													<div class="form-group pull-right">		
														<button type="submit" id="email_save" class="btn btn-green btn-save">Save</button>
														<button type="submit" id="email_cancel" class="btn btn-default btn-cancel">Cancel</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									
									<div class="edit-outer clearfix" id="outer_pass">
										<div class="setting-details">
											<h4>Your Password</h4>
											<p>********</p>
										</div>
										<div class="button pull-right">
											<a href="#" class="btn btn-default btn-password" style="border-radius: 50px;margin-top:25px;">Edit Password</a>
										</div>
									</div>	
									<div class="setting-password-form setting-form" id="set_pass">
										<form>
											<div class="row">
												<div class="col-md-9">
													<div class="form-group">
														<label>Password</label>
														<input type="password" id="password" class="form-control" placeholder="Password" value="******">
													</div>
												</div>
												<div class="col-md-3 clearfix">
													<div class="form-group pull-right">		
														<button type="submit" id="pass_save" class="btn btn-green btn-save">Save</button>
														<button type="submit" id="pass_cancel" class="btn btn-default btn-cancel">Cancel</button>
													</div>
												</div>
											</div>
										</form>
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


	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js'}}"></script>
	
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
				$("#outer_email").addClass("hidden");
				$("#set_email").addClass("active");
			});
			
			$("#email_cancel").click(function(e){
				e.preventDefault();
				//alert("hello");
				$("#outer_email").removeClass("hidden");
				$("#set_email").removeClass("active");;
			});
			
			$("#pass_cancel").click(function(e){
				e.preventDefault();
				//alert("hello");
				$("#outer_pass").removeClass("hidden");
				$("#set_pass").removeClass("active");
			});
			
			$("a.btn-password").click(function(e){
				e.preventDefault();
				$("#outer_pass").addClass("hidden");
				$("#set_pass").addClass("active");
			});

			$("#pass_save").click(function(e) {
				e.preventDefault();
				var password=$("#password").val();
				$.ajax({
					type:"POST",
					url:"{{route('edit_password')}}",
					data:{'password': password},
					success:function(data)
					{
					if(data==0)
					  {
						$("#outer_pass").removeClass("hidden");
						$("#set_pass").removeClass("active");
					  }
					else
					  {
					  	alert("password cannot be empty");
					  }

					}
					});

			});

			$("#email_save").click(function(e) {
				e.preventDefault();
				var email=$("#email").val();
				$.ajax({
					type:"POST",
					url:"{{route('edit_email')}}",
					data:{'email': email},
					success:function(data)
					{
					if(data==0)
					  {
						$("#outer_email").removeClass("hidden");
						$("#set_email").removeClass("active");
						location.reload();
					  }
					else
					  {
					  	alert("Enter correct email id");
					  }
					}

					});

			});
			
		});	

			
	</script>
  </body>
</html>
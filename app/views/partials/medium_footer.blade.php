	<!-- Modal -->
		
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

		  $('.account').mouseleave(function(){
		  	$(".account").fadeOut().removeClass("active");	
		  });


		});	
	      
	</script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>iLab | A Lab to fulfill the Young Innovators Dreams</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content=""> 

	<!-- Favicon -->
	<link rel="shortcut icon" href="../favicon.ico">

	<!-- Web Fonts -->
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=cyrillic,latin">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:100,300,500,700&amp;subset=latin,cyrillic">
	<link rel="stylesheet" type="text/css" href="assets/img/abelpro.otf">
	<link rel="stylesheet" type="text/css" href="assets/img/abelpro-bold.otf">

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<link rel="stylesheet" href="assets/css/blocks.css">
	<link rel="stylesheet" href="assets/css/one.style.css">

	<!-- CSS Footer -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/footers/footer-v7.css">

	<!-- CSS Implementing Plugins -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

	<link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/animate.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/line-icons.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/pace-flash.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/owl-carousel2/assets/owl.carousel.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/architecture.style.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
</head>

<body id="body" data-spy="scroll" data-target=".one-page-header" class="demo-lightbox-gallery">
	<!--=== Header ===-->
	<nav class="one-page-header one-page-header-style-2 navbar navbar-default navbar-fixed-top architecture-nav one-page-nav-scrolling one-page-nav__fixed" role="navigation">
		<div class="container">
			<div class="page-scroll">
				<a class="logo-link navbar-brand logo-left" href="<?=site_url()?>">
					<img class="default-logo" src="<?=base_url()?>assets/img/logo.png" alt="Logo">
					<img class="shrink-logo" src="<?=base_url()?>assets/img/logo.png" alt="Logo">
				</a>
			</div>

			<div class="container no-padding-left ">
				<div class="row collapse navbar-collapse navbar-ex1-collapse">

					<div class="col-md-2 no-side-padding col-md-offset-5">
						<div class="center-block logo page-scroll">
							<a class="logo-link navbar-brand logo-centered" href="<?=site_url()?>">
								<img class="default-logo" src="<?=base_url()?>assets/img/logo.png" alt="Logo" style="margin: -10px; padding: 0px;">
								<img class="shrink-logo" src="<?=base_url()?>assets/img/logo.png" alt="Logo" style="margin: -10px; padding: 0px;">
							</a>
						</div>
					</div>

					<div class="col-md-5 no-side-padding">
						
					</div>
				</div>
			</div>
		</div>
		<!-- /.container -->
	</nav>
	<!--=== End Header ===-->

	<!-- Promo block BEGIN -->
	<section class="promo-section" id="intro" style="height: 450px;">
		<div class="breadcrumbs-v3 img-v3 text-center">
			<div class="container">
				<h1>Welcome to the world of Innovation...</h1>
				<!-- <p>Discover more about us</p> -->
			</div><!--/end container-->
		</div>
	</section>
	<!-- Promo block END -->

	<!--About Section-->
	<section id="about">
		<div class="container content-lg">
			<div class="g-heading-v7 text-center g-mb-70">
				<h2 class="h2">All Categories</h2>
			</div>

			<!-- all for your comfort blocks -->
			<div class="row equal-height-columns">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6 arch-service">
						<div class="arch-service-in img-hover-1 equal-height-column">
							<span aria-hidden="true"><img src="<?=base_url()?>assets/img/health-01.png" style="height: 25%; width: 30%; color: white;" alt="" class="img img-responsive"></span>
							<h3>Health</h3>
							<a href="#projects" class="arch-service-btn" onclick="changeProduct('Health');">Show products</a>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-6 arch-service">
						<div class="arch-service-in img-hover-2 equal-height-column">
							<span aria-hidden="true"><img src="<?=base_url()?>assets/img/agriculture-01.png" style="height: 25%; width: 30%; color: white;" alt="" class="img img-responsive"></span>
							<h3>Agriculture</h3>
							<a href="#projects" class="arch-service-btn" onclick="changeProduct('Agriculture');">Show products</a>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-6 arch-service">
						<div class="arch-service-in img-hover-3 equal-height-column">
							<span aria-hidden="true"><img src="<?=base_url()?>assets/img/disability-01.png" style="height: 25%; width: 30%; color: white;" alt="" class="img img-responsive"></span>
							<h3>Disability</h3>
							<a href="#projects" class="arch-service-btn" onclick="changeProduct('Disability');">Show products</a>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-6 arch-service">
						<div class="arch-service-in img-hover-4 equal-height-column">
							<span aria-hidden="true"><img src="<?=base_url()?>assets/img/environment-01.png" style="height: 25%; width: 30%; color: white;" alt="" class="img img-responsive"></span>
							<h3>Environment</h3>
							<a href="#projects" class="arch-service-btn" onclick="changeProduct('Environment');">Show products</a>
						</div>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6 arch-service">
						<div class="arch-service-in img-hover-1 equal-height-column">
							<span aria-hidden="true"><img src="<?=base_url()?>assets/img/ekshop-logo.png" style="height: 25%; width: 30%; color: white;" alt="" class="img img-responsive"></span>
							<h3>Ek-Shop</h3>
							<a href="http://ekshop.gov.bd/" class="arch-service-btn">View</a>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-6 arch-service">
						<div class="arch-service-in img-hover-3 equal-height-column">
							<span aria-hidden="true"><img src="<?=base_url()?>assets/img/education-01.png" style="height: 25%; width: 30%; color: white;" alt="" class="img img-responsive"></span>
							<h3>Education</h3>
							<a class="arch-service-btn" href="#projects" onclick="changeProduct('Education');">Show products</a>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-6 arch-service">
						<div class="arch-service-in img-hover-2 equal-height-column">
							<span aria-hidden="true"><img src="<?=base_url()?>assets/img/industry-01.png" style="height: 25%; width: 30%; color: white;" alt="" class="img img-responsive"></span>
							<h3>Industry</h3>
							<a href="#projects" class="arch-service-btn" onclick="changeProduct('Industry');">Show products</a>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-6 arch-service">
						<div class="arch-service-in img-hover-1 equal-height-column">
							<span aria-hidden="true"><img src="<?=base_url()?>assets/img/hill-01.png" style="height: 25%; width: 30%; color: white;" alt="" class="img img-responsive"></span>
							<h3>Hill Tracts</h3>
							<a class="arch-service-btn" href="#projects" onclick="changeProduct('Hill Tracks');">Show products</a>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!--End of About Section-->

		<!--Services Section-->
		<section id="services">
			<div class="container-fluid bg-color-com service-section">
				<div class="container content-md">

					<div class="row g-mb-70 g-heading-v7 text-center">
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
							<h2 class="h2 g-color-white g-mb-30"><em class="block-name">What we do</em> We create innovative things</h2>
						</div>
					</div>

					<div class="slideshow-container">

						<div class="shadow-wrapper margin-bottom-10">
							<div class="carousel slide carousel-v1 box-shadow shadow-effect-2" id="myCarousel" >
								<ol class="carousel-indicators">
									<li class="rounded-x active" data-target="#myCarousel" data-slide-to="0" ></li>
									<li class="rounded-x" data-target="#myCarousel" data-slide-to="1"></li>
									<li class="rounded-x" data-target="#myCarousel" data-slide-to="2"></li>
									<li class="rounded-x" data-target="#myCarousel" data-slide-to="3"></li>
								</ol>

								<div class="carousel-inner" data-ride="carousel" data-interval="2000">
									<div class="item active">
										<img class="img-responsive" src="<?=base_url()?>assets/img/ambulanceSS.jpg" alt="">
									</div>
									<div class="item">
										<img class="img-responsive" src="<?=base_url()?>assets/img/telemedicineSS.jpg" alt="">
									</div>
									<div class="item">
										<img class="img-responsive" src="<?=base_url()?>assets/img/infant_incubatorSS.jpg" alt="">
									</div>
									<div class="item">
										<img class="img-responsive" src="<?=base_url()?>assets/img/blindstickSS.jpg" alt="">
									</div>
								</div>

								<div class="carousel-arrow">
									<a data-slide="prev" href="#myCarousel" class="left carousel-control">
										<i class="fa fa-angle-left"></i>
									</a>
									<a data-slide="next" href="#myCarousel" class="right carousel-control">
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div style="text-align:center">
						<span class="dot"></span> 
						<span class="dot"></span> 
						<span class="dot"></span> 
					</div>
				</div>
			</div>
		</section>
		<!--End of Services Section-->

		<!--Projects Section-->
		<section id="projects">
			<div class="container-fluid no-side-padding content-md">
				<div class="health-container">
					<div class="container g-heading-v7 text-center g-mb-70">
						<h2 class="h2" id="category_name">Health</h2>
					</div>
					<!-- Projects cube-portfolio/ what we did -->
					<div id="products_list">
						
						
					</div>
				</div>
			</div>
		</section>
		<!--End of Projects Section-->

		<!--Awards Section-->
		<section id="awards">
			<div class="container-fluid bg-color-com awards-section">
				<div class="container content-md">
					<div class="row">
						<div class="col-md-3">

						</div>

						<!-- awards -->
						<div class="col-md-6 g-heading-v7 text-center">
							<h2 class="h2 g-color-white g-mb-30"><em class="block-name">Who we are</em> About iLab</h2>
							<p class="g-mb-30">Innovation Lab is a specialized lab where young generation, technicians, researchers, teachers and students can do all kinds of research to implement their innovative ideas and get all the help.</p>
							<p> The main purpose of Innovation Lab is to promote innovative work, to increase the technology of technology by integrating technology-driven people, implement innovative concepts and projects to ensure faster and easier service to the citizen, reduce public welfare and enrich domestic technology.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End of Awards Section-->

		<!--Contact Section-->
		<section id="contact">
			<div class="container content-md g-heading-v7 text-center">
				<h2 class="h2 g-mb-70"><em class="block-name">Contact us</em> Keep in touch</h2>

				<!-- form and contatc information -->
				<div class="row">
					<div class="col-md-9 col-sm-6 form no-side-padding">
						<form action="#" method="post" id="sky-form3" class="sky-form contact-style">
							<fieldset>
								<div class="row margin-bottom-30">
									<div class="col-md-6 col-md-offset-0">
										<div>
											<input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
										</div>
									</div>
									<div class="col-md-6 col-md-offset-0">
										<div>
											<input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone">
										</div>
									</div>
								</div>

								<div class="row margin-bottom-30">
									<div class="col-md-6 col-md-offset-0">
										<div>
											<input type="text" name="email" id="email" class="form-control" placeholder="Email *">
										</div>
									</div>

									<div class="col-md-6 col-md-offset-0">
										<div>
											<input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
										</div>
									</div>
								</div>

								<div class="row margin-bottom-30">
									<div class="col-md-12 col-md-offset-0">
										<div>
											<textarea rows="4" name="message" id="message" class="form-control g-textarea-noresize" placeholder="Message"></textarea>
										</div>
									</div>
								</div>

								<p><button type="submit" class="btn-u btn-u-lg btn-u-bg-default btn-u-upper">Send Message</button></p>
							</fieldset>

							<div class="message">
								<i class="rounded-x fa fa-check"></i>
								<p>Your message was successfully sent!</p>
							</div>
						</form>
					</div>

					<div class="col-md-3 col-sm-6 contact-list">
						<ul class="list-unstyled margin-bottom-30">
							<li><span aria-hidden="true" class="glyphicon glyphicon-map-marker icon"></span></li>
							<li class="first-item">Address</li>
							<li class="second-item">National Museum of Science & Technology, 1207, Shahid Shahabuddin Shorok, Dhaka</li>
						</ul>

						<ul class="list-unstyled margin-bottom-30">
							<li><span aria-hidden="true" class="glyphicon glyphicon-phone-alt icon"></span></li>
							<li class="first-item">Phone number</li>
							<li class="second-item">+8181616</li>
						</ul>

						<ul class="list-unstyled margin-bottom-30">
							<li><span aria-hidden="true" class="glyphicon glyphicon-envelope icon"></span></li>
							<li class="first-item">Email</li>
							<li class="second-item">info@ilab.com</li>
						</ul>
					</div>
				</div>
			</div>

			<!-- copyrights -->
			<div class="copyrights container-fluid page-scroll">
				<div clas="container">
					<a class="footer-logo" href="<?=site_url()?>">
						<img class="img-responsive" src="assets/img/logo.png" alt="Logo">
					</a>
					<ul class="list-inline footer-list">
						<li><a href="http://ilab.gov.bd/"><i class="fa fa-globe"></i></a></li>
						<li><a href="https://www.facebook.com/a2ilab/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UC5zxvzsVFvKfaCpJO66-Hug/featured"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
			</div>
		</section>
		<!--End of Contact Section-->

		<!-- JS Global Compulsory -->
		<script src="<?=base_url()?>assets/css/plugins/jquery/jquery.min.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/jquery/jquery-migrate.min.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- JS Implementing Plugins -->
		<script src="<?=base_url()?>assets/css/plugins/smoothScroll.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/jquery.easing.min.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/pace/pace.min.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/owl-carousel2/owl.carousel.min.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/modernizr.js"></script>
		<script src="<?=base_url()?>assets/css/plugins/backstretch/jquery.backstretch.min.js"></script>

		<!-- JS Page Level-->
		<script src="<?=base_url()?>assets/js/one.app.js"></script>
		<script src="<?=base_url()?>assets/js/plugins/pace-loader.js"></script>
		<script src="<?=base_url()?>assets/js/plugins/owl-carousel2.js"></script>
		<script src="<?=base_url()?>assets/js/plugins/cube-portfolio-lightbox.js"></script>
		<script src="<?=base_url()?>assets/js/plugins/promo.js"></script>
		<script src="<?=base_url()?>assets/js/forms/contact.js"></script>

		<script>
			$(function() {
				App.init();
				OwlCarousel.initOwlCarousel();
				ContactForm.initContactForm();
				changeProduct('Health');
			});
		</script>

		<script >
			function changeProduct(category){
				console.log(category);
				$('#category_name').html(category);;
				if (category) {
					$.ajax({
						url : "<?=site_url('home/load_product');?>",
						method: 'post',
						data: {"category": category},            
						success : function(response){
							if (response != 0) {
								$('#products_list').html(response);

							}else{
								$('#products_list').html('');
								//alert('Something went wrong!');
							}

						}  
					});
				}
				else{
					alert('Something went wrong!');
				}

			}
		</script>

	</body>
	</html>

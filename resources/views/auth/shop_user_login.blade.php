<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="EAGSHOP">
		<meta name="author" content="EAGSHOP">
		<title> EAGSHOP - ავტორიზაცია </title>

		<link rel="icon" type="image/png" href="images/fav.png">

		<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<link href='{{ asset('front/vendor/unicons-2.0.1/css/unicons.css') }}' rel='stylesheet'>
		<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">
		<link href="{{ asset('front/css/night-mode.css') }}" rel="stylesheet">
		<link href="{{ asset('front/css/step-wizard.css') }}" rel="stylesheet">

		<link href="{{ asset('front/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
		<link href="{{ asset('front/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
		<link href="{{ asset('front/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
		<link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/semantic/semantic.min.css') }}">
	</head>
<body>

<div class="sign-inup">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="sign-form">
					<div class="sign-inner">
				
						<div class="sign-logo" id="logo">
							<a href="index.html">
								<img src="{{ asset('front/images/logo.svg') }}" alt="">
							</a>

							<a href="index.html">
								<img class="logo-inverse" src="{{ asset('front/images/dark-logo.svg') }}" alt="">
							</a>
						</div>

						<div class="form-dt">
							<div class="form-inpts checout-address-step">
							
								<form action="{{ route('auth.shop_login') }}" method="POST">
									@csrf
									<div class="form-title">
										<h6> ავტორიზაცია </h6>
									</div>

									@if(session()->has('success'))
										<div class="alert alert-success">
											{{ session('success') }}
										</div>
									@endif

									@if(Session::has('info'))
										<div class="alert alert-info">
											{{ session('info') }}
										</div>
									@endif
									
									<div class="form-group pos_rel">
										<input 	name="email" type="text" 
												placeholder="თქვენი ელ-ფოსტა" 
												class="form-control lgn_input @error('email') is-invalid @enderror" value="{{ old('email') }}">
										@error('email')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong> {{ $message }} </strong>
		                                    </span>
		                                @enderror
									</div>
									
									<div class="form-group pos_rel">
										<input 	name="password" 
												type="password" 
												placeholder="თქვენი პაროლი" 
												class="form-control lgn_input @error('password') is-invalid @enderror">
										@error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong> {{ $message }} </strong>
		                                    </span>
		                                @enderror
									</div>

									<button class="login-btn hover-btn" type="submit"> 
										ავტორიზაცია 
									</button>
								</form>

							</div>
						
							<div class="password-forgor">
								<a href="{{ route('auth.shop_user_register') }}"> 
									დაგავიწყდა პაროლი ? 
								</a>
							</div>

							<div class="signup-link">
								<p> არ გაქვს ანგარიში ? - 
									<a href="{{ route('auth.shop_user_register') }}"> 
										დარეგისტრირდი ახლავე 
									</a>
								</p>
							</div>

						</div>

					</div>
				</div>
					<div class="copyright-text text-center mt-3">
						<i class="uil uil-copyright"></i> 
						Copyright 2021 - {{ now()->year }} <b> EAGSHOP </b> . 
						ყველა უფლება დაცულია
					</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/vendor/OwlCarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('front/vendor/semantic/semantic.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>
<script src="{{ asset('front/js/product.thumbnail.slider.js') }}"></script>
<script src="{{ asset('front/js/offset_overlay.js') }}"></script>
<script src="{{ asset('front/js/night-mode.js') }}"></script>
</body>
</html>
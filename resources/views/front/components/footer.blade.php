<footer class="footer">
	<div class="footer-first-row">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<ul class="call-email-alt">
						<li>
							<a href="#" class="callemail">
								<i class="uil uil-dialpad-alt"></i>
								+995 571 051 269
							</a>
						</li>

					</ul>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="social-links-footer">
						<ul>
							
							<li>
								<a href="#">
									<i class="fab fa-facebook-f"></i>
								</a>
							</li>

							<li>
								<a href="#">
									<i class="fab fa-twitter"></i>
								</a>
							</li>

							<li>
								<a href="#">
									<i class="fab fa-linkedin-in"></i>
								</a>
							</li>

							<li>
								<a href="#">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-second-row">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="second-row-item">
						<h4>Categories</h4>
						<ul>
							<li>
								<a href="#"> Fruits and Vegetables </a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="second-row-item">
						<h4>Useful Links</h4>
						<ul>
							<li>
								<a href="about_us.html"> About US </a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="second-row-item">
						<h4>Top Cities</h4>
						<ul>
							<li>
								<a href="#"> Gurugram </a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
		
					<div class="second-row-item-payment">
						<h4> გადახდის მეთოდები </h4>
						<div class="footer-payments">
							<ul id="paypal-gateway" class="financial-institutes">
								<li class="financial-institutes__logo">
									<img alt="Visa" title="Visa" src="{{ asset('front/images/footer-icons/pyicon-6.svg') }}">
								</li>
								<li class="financial-institutes__logo">
									<img alt="Visa" title="Visa" src="{{ asset('front/images/footer-icons/pyicon-1.svg') }}">
								</li>
								<li class="financial-institutes__logo">
									<img alt="MasterCard" title="MasterCard" src="{{ asset('front/images/footer-icons/pyicon-2.svg') }}">
								</li>
								<li class="financial-institutes__logo">
									<img alt="American Express" title="American Express" src="{{ asset('front/images/footer-icons/pyicon-3.svg') }}">
								</li>
								<li class="financial-institutes__logo">
									<img alt="Discover" title="Discover" src="{{ asset('front/images/footer-icons/pyicon-4.svg') }}">
								</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<div class="footer-last-row">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-bottom-links">
						<ul>
							<li>
								<a href="{{ route('front.index') }}"> მთავარი </a>
							</li>

							<li>
								<a href="{{ route('front.index') }}"> კონტაქტი </a>
							</li>

							<li>
								<a href="{{ route('front.index') }}"> წესები და პირობები </a>
							</li>
						</ul>
					</div>
					<div class="copyright-text">
						<i class="uil uil-copyright"></i> 
						Copyright 2020 - {{ now()->year }} <b> EAGSHOP.GE </b>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
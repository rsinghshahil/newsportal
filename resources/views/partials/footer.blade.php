		<!-- FOOTER -->
		<footer id="footer">
			<!-- Top Footer -->
			<div id="top-footer" class="section">
				<!-- CONTAINER -->
				<div class="container">
					<!-- ROW -->
					<div class="row">
						<!-- Column 1 -->
						<div class="col-md-4">
							<!-- footer about -->
							<div class="footer-widget about-widget">
								<div class="footer-logo">
                                    <a href="#" class="logo"><img src="./img/logo DJ.png" alt="logo" style="height:90px;width:135px"></a>
									<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
								</div>
							</div>
							<!-- /footer about -->

							<!-- footer social -->
							<div class="footer-widget social-widget">
								<div class="widget-title">
									<h3 class="title">Follow Us</h3>
								</div>
								<ul>
									<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="google"><i class="fa fa-google"></i></a></li>
									<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
									<li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
							<!-- /footer social -->

							<!-- footer subscribe -->
							<div class="footer-widget subscribe-widget">
								<div class="widget-title">
									<h2 class="title">Subscribe to Newslatter</h2>
								</div>
								<form>
									<input class="input" type="email" placeholder="Enter Your Email">
									<button class="input-btn">Subscribe</button>
								</form>
							</div>
							<!-- /footer subscribe -->
						</div>
						<!-- /Column 1 -->

						<!-- Column 2 -->
						<div class="col-md-4">
							<!-- footer article -->
							<div class="footer-widget">
								<div class="widget-title">
									<h2 class="title">Featured Posts</h2>
								</div>

								<!-- ARTICLE -->
								<article class="article widget-article">
								@foreach ($footernews as $post )
									
								
									<div class="article-img">
										<a href="{{url('/show/'.$post->url)}}">
											<img src="{{asset($post->image)}}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="{{url('/show/'.$post->url)}}">{!! str_limit($post->headline,50,'....') !!}</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i>{{$post->created_at->format('j F, Y')}} </li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								@endforeach

								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /footer article -->
						</div>
						<!-- /Column 2 -->

						<!-- Column 3 -->
						<div class="col-md-4">
							<!-- footer galery -->
							<div class="footer-widget galery-widget">
								<div class="widget-title">
									<h2 class="title">Flickr Photos</h2>
								</div>
								<ul>
									<li><a href="#"><img src="./img/img-widget-3.jpg" alt=""></a></li>
									<li><a href="#"><img src="./img/img-widget-4.jpg" alt=""></a></li>
									<li><a href="#"><img src="./img/img-widget-5.jpg" alt=""></a></li>
									<li><a href="#"><img src="./img/img-widget-6.jpg" alt=""></a></li>
									<li><a href="#"><img src="./img/img-widget-7.jpg" alt=""></a></li>
									<li><a href="#"><img src="./img/img-widget-8.jpg" alt=""></a></li>
									<li><a href="#"><img src="./img/img-widget-9.jpg" alt=""></a></li>
									<li><a href="#"><img src="./img/img-widget-10.jpg" alt=""></a></li>
								</ul>
							</div>
							<!-- /footer galery -->

							<!-- footer tweets -->
							<div class="footer-widget tweets-widget">
								<div class="widget-title">
									<h2 class="title">Recent Tweets</h2>
								</div>
								<ul>
									<li class="tweet">
										<i class="fa fa-twitter"></i>
										<div class="tweet-body">
											<p><a href="#"></a> Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis <a href="#"></a></p>
										</div>
									</li>
								</ul>
							</div>
							<!-- /footer tweets -->
						</div>
						<!-- /Column 3 -->
					</div>
					<!-- /ROW -->
				</div>
				<!-- /CONTAINER -->
			</div>
			<!-- /Top Footer -->

			<!-- Bottom Footer -->
			<div id="bottom-footer" class="section">
				<!-- CONTAINER -->
				<div class="container">
					<!-- ROW -->
					<div class="row">
						<!-- footer links -->
						<div class="col-md-6 col-md-push-6">
							<ul class="footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Advertisement</a></li>
								<li><a href="#">Privacy</a></li>
							</ul>
						</div>
						<!-- /footer links -->

						<!-- footer copyright -->
						<div class="col-md-6 col-md-pull-6">
							<div class="footer-copyright">
								<span>
                                    Copyright &copy;
                                    <script>document.write(new Date().getFullYear());</script>
                                All rights reserved <i class="fa fa-briefcase" aria-hidden="true"></i> by <a href="{{url('/')}}" target="_blank">DJ Group Of Company</a>
                                </span>
							</div>
						</div>
                        <!-- /footer copyright -->

					</div>
					<!-- /ROW -->
				</div>
				<!-- /CONTAINER -->
			</div>
			<!-- /Bottom Footer -->
		</footer>
		<!-- /FOOTER -->

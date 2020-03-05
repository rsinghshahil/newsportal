@extends('layouts.apps')
@section('content')
@if($count == '0')
		<p>No Post yet related to this category</p>

@else
<!-- SECTION -->
<div class="section">
<!-- CONTAINER -->
<div class="container">
	<!-- ROW -->
	<div class="row">
		<!-- Main Column -->
		<div class="col-md-12">
			<!-- section title -->
			<div class="section-title">
				<h2 class="title">Trending Posts</h2>
			
			</div>
			<!-- /section title -->

			<!-- Tab content -->
			<div class="tab-content">
				<!-- tab1 -->
				<div id="tab1" class="tab-pane fade in active">
					<!-- row -->
					<div class="row">
						<!-- Column 1 -->
						@foreach ($trend as $post )
						<div class="col-md-3 col-sm-6">
							<!-- ARTICLE -->
							
							<article class="article">
								<div class="article-img">
									<a href="{{ url('/show/'.$post->url)  }}">
										<img src="{{asset($post->image)}}" alt="">
									</a>
									<ul class="article-info">
										<li class="article-type"><i class="fa fa-camera"></i></li>
									</ul>
								</div>
								<div class="article-body">
									<h4 class="article-title"><a href="{{ url('/show/'.$post->url)  }}">{!! str_limit($post->headline,45) !!}</a></h4>
									<ul class="article-meta">
										<li><i class="fa fa-clock-o"></i>{{$post->created_at->format('j F, Y')}} </li>
										<li><i class="fa fa-comments"></i> 33</li>
									</ul>
								</div>
							</article>	
							
							
							<!-- /ARTICLE -->
						</div>
						@endforeach
						<!-- /Column 1 -->
					</div>
					<!-- /row -->

				</div>
				<!-- /tab1 -->
			</div>
			<!-- /tab content -->
		</div>
		<!-- /Main Column -->
	</div>
	<!-- /ROW -->
</div>
<!-- /CONTAINER -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
<!-- CONTAINER -->
<div class="container">
	<!-- ROW -->
	<div class="row">
		<!-- Main Column -->
		<div class="col-md-8">
			<!-- row -->
			<div class="row">
				<!-- Column 1 -->
				<div class="col-md-6 col-sm-6">
					<!-- section title -->
					<div class="section-title">
						<h2 class="title">Politics</h2>
					</div>
					<!-- /section title -->

					<!-- ARTICLE -->
					<article class="article">@foreach ($largePoliticNews as $post )
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
							<ul class="article-info">
								<li class="article-type"><i class="fa fa-camera"></i></li>
							</ul>
						</div>
						<div class="article-body">
						
							
						
							<h3 class="article-title"><a href="{{ url('/show/'.$post->url)  }}" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,30) !!}</a></h3>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i>{{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
							<p>{!! str_limit($post->content,100) !!}</p>
							
						</div>
						@endforeach
					</article>
					<!-- /ARTICLE -->

					<!-- ARTICLE -->
					<article class="article widget-article">
					@foreach ($smallPoliticNews as $post )
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
						</div>
						<div class="article-body">
							<h4 class="article-title"><a href="{{ url('/show/'.$post->url)  }}" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,30,'....') !!}</a></h4>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					@endforeach
						
					</article>
					<!-- /ARTICLE -->
				</div>
				<!-- /Column 1 -->

				<!-- Column 2 -->
				<div class="col-md-6 col-sm-6">
					<!-- section title -->
					<div class="section-title">
						<h2 class="title">Sports</h2>
					</div>
					<!-- /section title -->

					<!-- ARTICLE -->
					<article class="article">@foreach ($largeSportNews as $post )
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
							<ul class="article-info">
								<li class="article-type"><i class="fa fa-camera"></i></li>
							</ul>
						</div>
						<div class="article-body">
						
							
						
							<h3 class="article-title"><a href="{{ url('/show/'.$post->url)  }}" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,30) !!}</a></h3>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
							<p>{!! str_limit($post->content,100) !!}</p>
							
						</div>
						@endforeach
					</article>
					<!-- /ARTICLE -->

					<!-- ARTICLE -->
					<article class="article widget-article">
					@foreach ($smallSportNews as $post )
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
						</div>
						<div class="article-body">
							<h4 class="article-title"><a href="{{ url('/show/'.$post->url)  }}" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,30,'....') !!}</a></h4>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					@endforeach
						
					</article>
					<!-- /ARTICLE -->
				</div>
				<!-- /Column 2 -->
			</div>
			<div class="row">
				<!-- Column 1 -->
				<div class="col-md-6 col-sm-6">
					<!-- section title -->
					<div class="section-title">
						<h2 class="title">Lifestyle</h2>
					</div>
					<!-- /section title -->

					<!-- ARTICLE -->
					<article class="article">@foreach ($largePoliticNews as $post )
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
							<ul class="article-info">
								<li class="article-type"><i class="fa fa-camera"></i></li>
							</ul>
						</div>
						<div class="article-body">
						
							
						
							<h3 class="article-title"><a href="{{ url('/show/'.$post->url)  }}" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,30) !!}</a></h3>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
							<p>{!! str_limit($post->content,100) !!}</p>
							
						</div>
						@endforeach
					</article>
					<!-- /ARTICLE -->

					<!-- ARTICLE -->
					<article class="article widget-article">
					@foreach ($smallPoliticNews as $post )
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
						</div>
						<div class="article-body">
							<h4 class="article-title"><a href="{{ url('/show/'.$post->url)  }}" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,30,'....') !!}</a></h4>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					@endforeach
						
					</article>
					<!-- /ARTICLE -->
				</div>
				<!-- /Column 1 -->

				<!-- Column 2 -->
				<div class="col-md-6 col-sm-6">
					<!-- section title -->
					<div class="section-title">
						<h2 class="title">Health</h2>
					</div>
					<!-- /section title -->

					<!-- ARTICLE -->
					<article class="article">@foreach ($largeSportNews as $post )
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
							<ul class="article-info">
								<li class="article-type"><i class="fa fa-camera"></i></li>
							</ul>
						</div>
						<div class="article-body">
						
							
						
							<h3 class="article-title"><a href="{{ url('/show/'.$post->url)  }}" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,30) !!}</a></h3>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
							<p>{!! str_limit($post->content,100) !!}</p>
							
						</div>
						@endforeach
					</article>
					<!-- /ARTICLE -->

					<!-- ARTICLE -->
					<article class="article widget-article">
					@foreach ($smallSportNews as $post )
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
						</div>
						<div class="article-body">
							<h4 class="article-title"><a href="{{ url('/show/'.$post->url)  }}" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,30,'....') !!}</a></h4>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					@endforeach
						
					</article>
					<!-- /ARTICLE -->
				</div>
				<!-- /Column 2 -->
			</div>
			<!-- /row -->

		

			<!-- row -->
			<div class="row">
				<!-- Column 1 -->
				<div class="col-md-4 col-sm-4">
					<!-- ARTICLE -->
					<article class="article">
						<div class="article-img">
							<a href="#">
								<img src="./img/img-md-1.jpg" alt="">
							</a>
							<ul class="article-info">
								<li class="article-type"><i class="fa fa-file-text"></i></li>
							</ul>
						</div>
						<div class="article-body">
							<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					</article>
					<!-- /ARTICLE -->
				</div>
				<!-- /Column 1 -->

				<!-- Column 2 -->
				<div class="col-md-4 col-sm-4">
					<!-- ARTICLE -->
					<article class="article">
						<div class="article-img">
							<a href="#">
								<img src="./img/img-md-2.jpg" alt="">
							</a>
							<ul class="article-info">
								<li class="article-type"><i class="fa fa-file-text"></i></li>
							</ul>
						</div>
						<div class="article-body">
							<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					</article>
					<!-- /ARTICLE -->
				</div>
				<!-- /Column 2 -->

				<!-- Column 3 -->
				<div class="col-md-4 col-sm-4">
					<!-- ARTICLE -->
					<article class="article">
						<div class="article-img">
							<a href="#">
								<img src="./img/img-md-3.jpg" alt="">
							</a>
							<ul class="article-info">
								<li class="article-type"><i class="fa fa-file-text"></i></li>
							</ul>
						</div>
						<div class="article-body">
							<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					</article>
					<!-- /ARTICLE -->
				</div>
				<!-- /Column 3 -->
			</div>
			<!-- /row -->
		</div>
		<!-- /Main Column -->

		<!-- Aside Column -->
		<div class="col-md-4">
			<!-- Ad widget -->
			<div class="widget center-block ">
				<img class="center-block" src="https://nagariknews.nagariknetwork.com/uploads/media/350X200_SUZUKIKHUSIKOOFFERFRAMEMAIN_GIF_20200213182557.gif" alt="">
			</div>
			<!-- /Ad widget -->

			<!-- social widget -->
			<div class="widget social-widget">
				<div class="widget-title">
					<h2 class="title" style="color: #F24F63;">Stay Connected</h2>
				</div>
				<ul>
					<li><a href="#" class="facebook"><i class="fa fa-facebook"></i><br><span>Facebook</span></a></li>
					<li><a href="#" class="twitter"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
					<li><a href="#" class="google"><i class="fa fa-google"></i><br><span>Google+</span></a></li>
					<li><a href="#" class="instagram"><i class="fa fa-instagram"></i><br><span>Instagram</span></a></li>
					<li><a href="#" class="youtube"><i class="fa fa-youtube"></i><br><span>Youtube</span></a></li>
					<li><a href="#" class="rss"><i class="fa fa-rss"></i><br><span>RSS</span></a></li>
				</ul>
			</div>
			<!-- /social widget -->

			<!-- subscribe widget -->
			<div class="widget subscribe-widget">
				<div class="widget-title">
					<h2 class="title">Subscribe to Newslatter</h2>
				</div>
				<form>
					<input class="input" type="email" placeholder="Enter Your Email">
					<button class="input-btn">Subscribe</button>
				</form>
			</div>
			<!-- /subscribe widget -->

			<!-- article widget -->
			<div class="widget">
				<div class="widget-title">
					<h2 class="title" style="color: #F24F63;">Most Read</h2>
				</div>

				<!-- owl carousel 3 -->
				<div id="owl-carousel-3" class="owl-carousel owl-theme center-owl-nav">
					<!-- ARTICLE -->
					@foreach ($largePoliticNews as $post )
					<article class="article">
						<div class="article-img">
							<a href="{{ url('/show/'.$post->url)  }}">
								<img src="{{asset($post->image)}}" alt="">
							</a>
							<ul class="article-info">
								<li class="article-type"><i class="fa fa-file-text"></i></li>
							</ul>
						</div>
						<div class="article-body">
							<h4 class="article-title"><a href="{{ url('/show/'.$post->url)  }}">{{$post->headline}}</a></h4>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					</article>	
					@endforeach
					
					<!-- /ARTICLE -->

					
				</div>
				<!-- /owl carousel 3 -->

				<!-- ARTICLE -->
				@foreach ($smallPoliticNews as $post )
					
				@endforeach
				<article class="article widget-article">
					<div class="article-img">
						<a href="{{ url('/show/'.$post->url)  }}">
							<img src="{{asset($post->image)}}" alt="">
						</a>
					</div>
					<div class="article-body">
						<h4 class="article-title"><a href="{{ url('/show/'.$post->url)  }}">{{$post->headline}}</a></h4>
						<ul class="article-meta">
							<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
							<li><i class="fa fa-comments"></i> 33</li>
						</ul>
					</div>
				</article>
				<!-- /ARTICLE -->
			</div>
			<!-- /article widget -->
			<!-- Ad widget -->
			<div class="widget center-block ">
				<img class="center-block" src="https://nagariknews.nagariknetwork.com/uploads/media/350X200_SUZUKIKHUSIKOOFFERFRAMEMAIN_GIF_20200213182557.gif" alt="">
			</div>
			<!-- /Ad widget -->
		</div>
		<!-- /Aside Column -->
	</div>
	<!-- /ROW -->
</div>
<!-- /CONTAINER -->
</div>
<!-- /SECTION -->

<!-- AD SECTION -->
<div class="visible-lg visible-md">
<img class="center-block" src="https://www.onlinekhabar.com/wp-content/uploads/2019/11/1140x100_Online-khabar.gif" alt="">
</div>
<!-- /AD SECTION -->


<!-- SECTION -->
<div class="section">
<!-- CONTAINER -->
<div class="container">
	<!-- ROW -->
	<div class="row">
		<!-- Main Column -->
		<div class="col-md-8">
			<!-- section title -->
			<div class="section-title">
				<h2 class="title">Popular Posts</h2>
			</div>
			<!-- /section title -->
			@foreach ($popular as $post )
			<!-- ARTICLE -->
			<article class="article row-article">
				<div class="article-img">
					<a href="{{ url('/show/'.$post->url)  }}">
						<img src="{{asset($post->image)}}" alt="{{$post->headline}}">
					</a>
				</div>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href="{{ url('/show/'.$post->url)  }}">News</a></li>
						<li class="article-type"><i class="fa fa-file-text"></i></li>
					</ul>
					<h3 class="article-title"><a href="{{ url('/show/'.$post->url)  }}">{{$post->headline}}</a></h3>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
						<li><i class="fa fa-comments"></i> 33</li>
					</ul>
					<p>{!! str_limit($post->content,100,'....') !!}</p>
				</div>
			</article>
			<!-- /ARTICLE -->	
			@endforeach
			

		</div>
		<!-- /Main Column -->

		<!-- Aside Column -->
		<div class="col-md-4">
			<!-- article widget -->
			<div class="widget">
				<div class="widget-title">
					<h2 class="title" style="color: #F24F63;">Featured Posts</h2>
				</div>

				<!-- owl carousel 4 -->
				<div id="owl-carousel-4" class="owl-carousel owl-theme">
					<!-- ARTICLE -->
					@foreach ( $featured as $post)
					<article class="article thumb-article">
						<div class="article-img">
							<img src="{{asset($post->image)}}" alt="">
						</div>
						<div class="article-body">
							<ul class="article-info">
								<li class="article-category"><a href="{{ url('/show/'.$post->url)  }}">News</a></li>
								<li class="article-type"><i class="fa fa-file-text"></i></li>
							</ul>
							<h3 class="article-title"><a href="{{ url('/show/'.$post->url)  }}">{{$post->headline}}</a></h3>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
								<li><i class="fa fa-comments"></i> 33</li>
							</ul>
						</div>
					</article>	
					@endforeach
					
					<!-- /ARTICLE -->
				</div>
				<!-- /owl carousel 4 -->
			</div>
			<!-- /article widget -->

			<!-- galery widget -->
			<div class="widget galery-widget">
				<div class="widget-title">
					<h2 class="title" style="color: #F24F63;">Photos</h2>
				</div>
				
				<ul>
				@foreach ($photos as $post)
					<li><a href="{{ url('/show/'.$post->url)  }}"><img src="{{asset($post->image)}}" alt=""></a></li>
					@endforeach
				</ul>	
				
				
			</div>
			<!-- /galery widget -->

			<!-- tweets widget -->
			<div class="widget tweets-widget">
				<div class="widget-title">
                        <h2 class="title" style="color: #F24F63;">Recent News</h2>
                    </div>
                    <ul>
                    @foreach ($recents as $post )
                    
                        <li class="tweet">
                            <i class="fa fa-file-text"></i>
                            <div class="tweet-body">
                                <p><a href="{{url('/show/'.$post->url)}}"> {{$post->headline}}</a></p>
                            </div>
                        </li>
                        
                        
                    @endforeach
                    </ul>
                    </div>>
			<!-- /tweets widget -->
		</div>
		<!-- /Aside Column -->
	</div>
	<!-- /ROW -->
</div>
<!-- /CONTAINER -->
</div>
<!-- /SECTION -->
@endif

@endsection
@section('js')
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection

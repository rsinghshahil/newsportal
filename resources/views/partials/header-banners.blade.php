		<!-- Owl Carousel 1 -->
		<div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
			<!-- ARTICLE -->
			@foreach ($headerNews as $post)
			<article class="article thumb-article">
				<div class="article-img">
					<img src="{{asset($post->image)}}" alt="">
				</div>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href="#">News</a></li>
						<li class="article-type"><i class="fa fa-camera"></i></li>
					</ul>
					<h2 class="article-title"><a href="#">{{$post->headline}}</a></h2>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i>{{$post->created_at}}</li>
						<li><i class="fa fa-comments"></i> 33</li>
					</ul>
				</div>
			</article>
			@endforeach
			<!-- /ARTICLE -->
        {{-- {{ dd($banners)}} --}}
		<div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">

            <!-- ARTICLE -->
            @foreach($banners as $banner)
                <article class="article thumb-article">
                    <div class="article-img">
                        <img src="{{asset($banner->image)}}" alt="Headline">
                    </div>
                    <div class="article-body">
                        <ul class="article-info">
                            <li class="article-category"><a href="{{url('/show/'.$banner->url)}}">News</a></li>
                            <li class="article-type"><i class="fa fa-camera"></i></li>
                        </ul>
                    <h2 class="article-title"><a href="{{url('/show/'.$banner->url)}}">{{$banner->headline}}</a></h2>
                        <ul class="article-meta">
                            <li><i class="fa fa-clock-o"></i> {{$banner->created_at->format('j F, Y')}}</li>
                            <li><i class="fa fa-comments"></i> 33</li>
                        </ul>
                    </div>
                </article>
            @endforeach

			{{-- <article class="article thumb-article">
				<div class="article-img">
					<img src="./img/img-lg-2.jpg" alt="">
				</div>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href="#">News</a></li>
						<li class="article-type"><i class="fa fa-file-text"></i></li>
					</ul>
					<h2 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h2>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
						<li><i class="fa fa-comments"></i> 33</li>
					</ul>
				</div>
            </article>

			<article class="article thumb-article">
				<div class="article-img">
					<img src="./img/img-lg-3.jpg" alt="">
				</div>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href="#">News</a></li>
						<li class="article-type"><i class="fa fa-camera"></i></li>
					</ul>
					<h2 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h2>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
						<li><i class="fa fa-comments"></i> 33</li>
					</ul>
				</div>
			</article> --}}
			<!-- /ARTICLE -->
		</div>

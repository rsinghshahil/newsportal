@extends('layouts.pages')
@section('content')
    		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
			<!--Breadcum-->
			<div class="breadcumb">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background:#EF233C;">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
						<li class="breadcrumb-item active">Politics</li>
					</ol>
				</nav>
			</div>
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-12">
						<!-- section title -->
						<div class="section-title">
							<h2 class="title">Politics</h2>
							<!-- tab nav -->
							<ul class="tab-nav pull-right">
								<li class="active"><a data-toggle="tab" href="#tab1">All</a></li>
							</ul>
							<!-- /tab nav -->
						</div>
						<!-- /section title -->

						<!-- Tab content -->
						<div class="tab-content">
							<!-- tab1 -->
							<div id="tab1" class="tab-pane fade in active">
								<!-- row -->
								
								<div class="row">
								@foreach($lNews as $post)
									<!-- Column 1 -->
									<div class="col-md-3 col-sm-6">
										<!-- ARTICLE -->
										<article class="article">
											<div class="article-img">
												<a href="#">
													<img src="{{asset($post->image)}}" alt="">
												</a>
												<ul class="article-info">
													<li class="article-type"><i class="fa fa-camera"></i></li>
												</ul>
											</div>
											<div class="article-body">
												<h4 class="article-title"><a href="#" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,20,'....') !!}</a></h4>
												<ul class="article-meta">
													<li><i class="fa fa-clock-o"></i>{{$post->created_at}}</li>
													<li><i class="fa fa-comments"></i> 33</li>
												</ul>
											</div>
										</article>
										<!-- /ARTICLE -->
									</div>
									<!-- /Column 1 -->
@endforeach
									
								</div>
								
								<!-- /row -->

								<!-- row -->
								
									
								
								<div class="row">
								@foreach ($sNews as $post)
									<!-- Column 1 -->
									<div class="col-md-4 col-sm-6">
										<!-- ARTICLE -->
										<article class="article widget-article">
											<div class="article-img">
												<a href="#">
													<img src="{{asset($post->image)}}" alt="">
												</a>
											</div>
											<div class="article-body">
												<h4 class="article-title"><a href="#" data-toggle="tooltip" title="{{$post->headline}}">{!! str_limit($post->headline,25,'....') !!}</a></h4>
												<ul class="article-meta">
													<li><i class="fa fa-clock-o"></i>{{$post->created_at}}</li>
													<li><i class="fa fa-comments"></i> 33</li>
												</ul>
											</div>
										</article>
										<!-- /ARTICLE -->

										
									</div>
									<!-- /Column 1 -->

									@endforeach
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


@endsection
@section('js')
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection
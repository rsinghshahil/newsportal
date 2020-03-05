@extends('layouts.pages')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-8">
             <article class="article">
                <div class="article-img">
                    <img src="{{asset($post->image)}}" alt="">
                    <ul class="article-info">
                        <li class="article-type"><i class="fa fa-camera"></i></li>
                    </ul>
                </div>
                <div class="article-body">
                 <h3 class="article-title"><a href="#" data-toggle="tooltip" title="{! str_limit($post->headline) !}">{!! str_limit($post->headline) !!}</a></h3>
                    <ul class="article-meta">
                        <li><i class="fa fa-clock-o"></i> {{$post->created_at->format('j F, Y')}}</li>
                        <li><i class="fa fa-comments"></i> 33</li>
                    </ul>
                    <p>{!! $post->content !!}</p>
                    
                </div>
            </article>
                
            </div>
            <!-- /Main Column -->

            <!-- Aside Column -->
            <div class="col-md-4">
            <article class="article">
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
                    </div>
                </div>
                </article>
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




@endsection
@section('js')
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection

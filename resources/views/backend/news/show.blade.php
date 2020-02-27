@extends('backend.layouts.app')
 
@section('main-section')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left" style="margin-left: 100px;">
          <h2> Show Post</h2>
      </div>
      <div class="pull-right" style="margin-right: 100px;">
          <a class="btn btn-primary" href="{{ route('admin.news.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
      </div>
  </div>
</div>
  
<div class="card col-lg-10" style="margin: auto;margin-top: 30px;padding: 15px;">
  <img class="card-img-top" src="{{asset($post->image)}}" alt="Featured image" style="height: 350px;">
  <div class="card-body">
    <h5 class="card-title">{{ $post->headline}}</h5>
    
    <h5 class="card-title"  style="border:1px solid;padding: 2px;width: fit-content;border-radius: 16px;background:#1F6A">{{ $post->category}}</h5>
    
    <p class="card-text">{!!$post->content !!}</p>
  </div>
</div>
@endsection

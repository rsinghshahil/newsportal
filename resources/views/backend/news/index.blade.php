@extends('backend.layouts.app')
 
@section('main-section')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="margin-left:50px;">Posts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.add-news.create') }}"  style="margin-right:50px;"> Add News</a>
            </div>
        </div>
    </div>
   
    <!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif-->
   
    <table class="table table-hover" style="width:95%;margin: 0 auto;margin-top:2%">
    <thead class="thead-dark">
        <tr>
            <th  scope="col">No</th>
            <th  scope="col">Title</th>
            <th  scope="col" style="height:10px">Content</th>
            <th  scope="col">Featured_image</th>
            <th  scope="col">Created</th>
            <th  scope="col">Updated</th>
            <th width="250px" scope="col">Action</th>
        </tr>
    </thead>
        @foreach ($news as $post)
        <tbody>
        <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>{!! str_limit($post->headline,15,'....') !!}</td>
            <td>{!! str_limit($post->content,50,'.....') !!}</td>
            <td> <img src="{{asset($post->image)}}" width="100px;" height="50px;"></td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td>
                    <a class="btn btn-info" href="{{ route('admin.add-news.show',$post->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('admin.add-news.edit',$post->id) }}">Edit</a>
   
                    <a class="btn btn-danger" href="{{ url('admin/add-news/delete/'.$post->id) }}">Delete</a>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
  
   {!! $news->links() !!}
      
@endsection
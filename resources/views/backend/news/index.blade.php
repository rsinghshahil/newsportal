@extends('backend.layouts.app')
 
@section('main-section')
    <div class="row">
        <div class="col-md-12" style="margin-bottom:1em">
            <div class="pull-left">
                <h3><u class="text-info">Manage Posts</u></h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.add-news.create') }}"><span class="fa fa-plus"></span> New Post</a>
            </div>
        </div>
    </div>
    <div class="card" style="border:1px solid grey;padding:5px; font-size:12px">
        <table class="table table-hover" id="dtMaterialDesignExample">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th width="250px">Content</th>
                    <th>Category</th>
                    <th>Featured_image</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($news as $post)
            <tbody>
            <tr>
                <th>{{ ++$i }}</th>
                <td>{!! str_limit($post->headline,15,'....') !!}</td>
                <td>{!! str_limit($post->content,50,'.....') !!}</td>
                <td>-------</td>
                <td> <img src="{{asset($post->image)}}" width="110px;" height="40px;"></td>
                <td>{{$post->created_at}}</td>
                
                <td>
                    <a class="btn btn-sm btn-outline-info" href="{{ url('admin/add-news/show/'.$post->id)  }}">Show</a>
                    <a class="btn btn-sm btn-outline-primary" href="{{ url('admin/add-news/edit/'.$post->id) }}">Edit</a>
                    <a class="btn btn-sm btn-outline-danger" href="{{ url('admin/add-news/delete/'.$post->id) }}">Delete</a>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>
  
   {{-- {!! $news->links() !!} --}}
      
@endsection

@section('js')
<script>
    //$('#newslist').DataTable();
    //$('.dataTables_length').addClass('bs-select');
    $(document).ready(function () {
  $('#dtMaterialDesignExample').DataTable();
  $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample_wrapper select').removeClass(
  'custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});
</script> 
 
@endsection
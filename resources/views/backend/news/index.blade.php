@extends('backend.layouts.app')

@section('main-section')
    <div class="row">
        <div class="col-md-12" style="margin-bottom:1em">
            <div class="pull-left">
                <h3><u class="text-info">Manage Posts</u></h3>
            </div>
            <div class="pull-right">
                <a class="au-btn au-btn-icon au-btn--blue" href="{{ route('admin.news.create') }}"><i class="zmdi zmdi-plus"></i></span> New Post</a>
            </div>
        </div>
    </div>
    <div class="card" style="border:1px solid grey;padding:5px; font-size:16px">
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
            <tbody>
            @foreach ($news as $post)
            <tr>
                <th>{{ ++$i }}</th>
                <td  data-toggle="tooltip" data-placement="right" title="{!! ($post->headline) !!}">{!! str_limit($post->headline,10,'....') !!}</td>
                <td>{!! str_limit($post->content,30,'.....') !!}</td>
                <td>{{$post->category}}</td>
                <td> <img src="{{asset($post->image)}}" width="110px;" height="40px;"></td>
                <td>{{$post->created_at}}</td>

                <td>
                    <a  href="{{ url('admin/news/show/'.$post->url)  }}"  data-toggle="tooltip" data-placement="bottom" title="View"><i class="fas fa-eye"></i></a>
                    <a href="{{ url('admin/news/edit/'.$post->id) }}"  data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-edit" style="color: #29b6f6;"></i></a>
                    <a href="{{ url('admin/news/delete/'.$post->id) }}"  data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash"  style="color: #f05050"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
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

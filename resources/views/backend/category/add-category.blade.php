@extends('backend.layouts.app')
@section('main-section')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row" style="margin-bottom:2.5em">
            <div class="col-md-12">
                <table class="table-hover" id="category" style="width:inherit">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $items)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$items->name}}</td>
                                @if(count($items->subcategories) > 0)
                                    <td>is parent category</td>
                                    <td>{{$items->description}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#largeModal">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                        @foreach ($items->subcategories as $k => $item)
                                            <tr>
                                                <td colspan="2"></td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#largeModal">Edit</button>
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                @elseif(count($items->subcategories) == 0)
                                        <td>N/a</td>
                                        <td>{{$items->description}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#largeModal">Edit</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                @endif
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Category & SubCategory</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('admin.add-category.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="">
                                    <label for="select" class=" form-control-label">Category</label>
                                    <select name="pcategory_id" id="select" class="form-control">
                                        <option value="0" selected disabled>Please select Category</option>
                                        @foreach ($categories as $items)
                                            <option value="{{$items->id}}" style="font-weight:bold">{{$items->name}}</option>
                                            @foreach($items->subcategories as $item)
                                                @if ($item != null)
                                                <option value="{{$item->id}}" style="font-weight:300">{{$item->name}}</option>
                                                <option style="font-size: 1pt; background-color: #a9b3c9;" disabled>&nbsp;</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label for="sub_category" class="form-control-label">Sub/Category</label>
                                    <input type="text" id="sub_category" name="sub_category" placeholder="sub/category" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label for="name" class=" form-control-label">Description</label>
                                    <input type="text" id="description" name="description" placeholder="description" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Modal -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
                            zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
                            resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
                            genus Equus, along with other living equids.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
<script>
    // $(document).ready( function () {
        // $('#category').DataTable();

        $('.editt').on('click',function(){
            $('#myModal').show()
            alert('a')
        });
    // } );
</script>
@endsection

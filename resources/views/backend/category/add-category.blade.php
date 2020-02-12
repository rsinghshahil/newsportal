@extends('backend.layouts.app')
@section('main-section')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row" style="margin-bottom:2.5em">
            <div class="col-md-12" style="margin-bottom:1em">
                <h3><u class="text-info">Manage Category & Sub-category</u></h3>
                 <button class="btn btn-md btn-success" style="float:right" data-toggle="modal" data-target="#addlargeModal"><span class="fa fa-plus"></span> Sub/Category</button>
                 
            </div>
            <div class="col-md-12" style="border:1px solid grey;padding:5px">
                <table class="table-hover" id="category" style="width:inherit">
                    <thead class="table-dark">
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
                                <tr id="parent-{{ $items->id }}">
                                    <td>{{$key + 1}}</td>
                                    <td>{{$items->name}}</td>
                                @if(count($items->subcategories) > 0)
                                    <td>is parent category</td>
                                    <td>{{$items->description}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info edit1" data-toggle="modal" data-target="#largeModal"
                                                data-id="{{$items->id}}"
                                                data-sid="null"
                                                data-category="{{$items->name}}"
                                                data-description="{{$items->description}}">
                                                Edit
                                            </button>
                                        <a class="btn btn-sm btn-danger delete-btn" href="javascript:void(0)" data-method="DELETE" url="{{route('admin.add-category.destroy',$items->id)}}" id="{{$items->id}}">Delete</a>
                                    </td>
                                        @foreach ($items->subcategories as $k => $item)
                                            <tr id="parent-{{ $item->id }}">
                                                <td colspan="2"></td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#largeModal"
                                                        data-id="{{$items->id}}"
                                                        data-sid="{{$item->id}}"
                                                        data-subcategory="{{$item->name}}"
                                                        data-description="{{$item->description}}">
                                                        Edit</button>
                                                    <a class="btn btn-sm btn-danger delete-btn" href="javascript:void(0)" data-method="DELETE" url="{{route('admin.add-category.destroy',$item->id)}}" id="{{$item->id}}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                @elseif(count($items->subcategories) == 0)
                                        <td>N/a</td>
                                        <td>{{$items->description}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#largeModal"
                                                data-id="{{$items->id}}"
                                                data-sid="null"
                                                data-category="{{$items->name}}"
                                                data-description="{{$items->description}}">
                                                Edit
                                            </button>
                                            <a class="btn btn-sm btn-danger delete-btn" href="javascript:void(0)" data-method="DELETE" url="{{route('admin.add-category.destroy',$items->id)}}" id="{{$items->id}}">Delete</a>
                                                {{-- <a class="btn btn-sm btn-danger" id="{{$items->id}}" url="{{route('admin.add-category.destroy',$items->id)}}" data-method="DELETE" class="delete-btn">Delete</a> --}}
                                            </form>
                                        </td>
                                @endif
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
        <!--Add Modal -->
        <div class="modal fade" id="addlargeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Edit Sub/Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <strong>Add Category & SubCategory</strong>
                                    </div> --}}
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
                                            {{-- <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div> --}}
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!--Edit Modal -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Edit Sub/Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <strong>Add Category & SubCategory</strong>
                                    </div> --}}
                                    <div class="card-body card-block">
                                        <form action="{{route('admin.add-category.update','update')}}" method="post">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <input type="hidden" id="category_id" name="category_id" value="">
                                            <input type="hidden" id="sub_category_id" name="sub_category_id" value="">

                                            <div class="form-group">
                                                <div class="">
                                                    <label for="select" class=" form-control-label">Category</label>
                                                    <select name="pcategory_id" id="select" class="form-control">
                                                        <option value="0" selected >Please select Category</option>
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
                                                    <label for="name" class="form-control-label">Description</label>
                                                    <input type="text" id="description" name="description" placeholder="description" class="form-control">
                                                </div>
                                            </div>
                                            {{-- <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div> --}}
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection

@section('js')
<script>
    $(document).ready( function () {

        // $('#category').DataTable();

        $('.editt').on('click',function(){
            $('#myModal').show()
        });
        $('#largeModal').on('shown.bs.modal', function (event) {
            var cat_id = '';
            var sub_id = '';
            var button = $(event.relatedTarget) // Button that triggered the modal
                cat_id = button.data('id');
                sub_id = button.data('sid');
            var category = button.data('category');
            var subcategory = button.data('subcategory')
            var description = button.data('description');

            console.log('a',cat_id, sub_id, category, description);
            var modal = $(this);

            if(sub_id == null){
                modal.find('.modal-body #select').val(0);
                modal.find('.modal-body #sub_category').val(category);
                modal.find('.modal-body #description').val(description);
                modal.find('.modal-body #category_id').val(cat_id);
                modal.find('.modal-body #sub_category_id').val(0);

            }else{
                modal.find('.modal-body #select').val(cat_id);
                modal.find('.modal-body #sub_category').val(subcategory);
                modal.find('.modal-body #description').val(description);
                modal.find('.modal-body #category_id').val(0);
                modal.find('.modal-body #sub_category_id').val(sub_id);
            }
        });

    } );
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.delete-btn', function(e) {
        var $this = $(this),
            $id = $(this).attr('id');

        if (confirm('Are you sure you want to delete this post?')) {
            $.post({
                type: $this.data('method'),
                url: $this.attr('url'),
            }).done(function (data) {
                location.reload();
            }).fail(function (data) {
                console.log(data);
            });
        }

        e.preventDefault();
    });
    </script>
@endsection

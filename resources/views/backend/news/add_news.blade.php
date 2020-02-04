@extends('backend.layouts.app')

@section('main-section')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Add News</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">News Details</h3>
                            </div>
                            <hr>
                            <form action="{{route('admin.add-news.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Title</label>
                                    <input id="titile" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                                <div>
                                    <label for="images" class="control-label mb-1">Image</label>
                                    <input id="image" name="image" type="file" class="" aria-required="true" aria-invalid="false" value="">
                                </div><br>
                                <div class="form-group">
                                    <label for="category_id" class=" form-control-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <optgroup label="Web">
                                            <option>PHP</option>
                                            <option>CSS</option>
                                            <option>HTML</option>
                                            <option>JavaScript</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="content" class="control-label mb-1">Content</label>
                                    <textarea class="form-control" id="editor" name="content"></textarea>
                                    {{-- <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span> --}}
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        {{-- <i class="fa fa-lock fa-lg"></i>&nbsp; --}}
                                        <span id="payment-button-amount">Publish</span>
                                        {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection

 @section('js')
 <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
 <script src="{{ asset( 'backend/tags/tags.js') }} "></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    // console.log( editor );
                } )
                .catch( error => {
                    // console.error( error );
                } );
    </script>
 @stop

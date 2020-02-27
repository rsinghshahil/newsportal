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
                            <form action="{{route('admin.add-news.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title</label>
                                    <input id="title" name="headline" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div><br>
                                <label for="image" class="control-label mb-1">Featured Image</label><br>
                                <div id="dropFileForm">
                                    <input type="file" name="image" id="fileInput" multiple onchange="addFiles(event)">
                                    <label for="fileInput" id="fileLabel" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
                                                addFiles(event);">
                                        <i class="fa fa-download fa-2x"></i><br>
                                        <span id="fileLabelText">
                                            Choose a file or drag it here
                                        </span>
                                    </label>
                                </div><br>
                                <div class="form-group">
                                    <label for="category_id" class=" form-control-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
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
                                </div><br>
                                <!--<div class="form-group">
                                    <label for="content" class="control-label mb-1">Content</label>
                                    <textarea class="form-control" id="editor" name="content"></textarea>
                                </div>-->
                                <div class="col-sm-12">
                                    <div class="card-box">
                                    <h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
                                    <textarea class="summernote" name="postdescription" required></textarea>
                                    </div>
                                    </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Publish</span>
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
 <script src="{{ asset( 'backend/plugins/summernote/summernote.min.js') }} "></script>
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

    <script type="text/javascript">
    var dropFileForm = document.getElementById("dropFileForm");
    var fileLabelText = document.getElementById("fileLabelText");
    var uploadStatus = document.getElementById("uploadStatus");
    var fileInput = document.getElementById("fileInput");
    var droppedFiles;

    function overrideDefault(event) {
        event.preventDefault();
        event.stopPropagation();
    }

    function fileHover() {
        dropFileForm.classList.add("fileHover");
    }

    function fileHoverEnd() {
        dropFileForm.classList.remove("fileHover");
    }

    function addFiles(event) {
        droppedFiles = event.target.files || event.dataTransfer.files;
        showFiles(droppedFiles);
    }

    function showFiles(files) {
        if (files.length > 1) {
            fileLabelText.innerText = files.length + " files selected";
        } else {
            fileLabelText.innerText = files[0].name;
        }
    }

    function uploadFiles(event) {
        event.preventDefault();
        changeStatus("Uploading...");

        var formData = new FormData();

        for (var i = 0, file;
            (file = droppedFiles[i]); i++) {
            formData.append(fileInput.name, file, file.name);
        }

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(data) {
            //handle server response and change status of
            //upload process via changeStatus(text)
            console.log(xhr.response);
        };
        xhr.open(dropFileForm.method, dropFileForm.action, true);
        xhr.send(formData);
    }

    function changeStatus(text) {
        uploadStatus.innerText = text;
    }
</script>
<script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
 @stop

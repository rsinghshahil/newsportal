@extends('backend.layouts.app') @section('main-section')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter the title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
                        </div>
                    </form>
                    <div ">
                    <button type="submit " class="btn btn-primary btn-sm ">
                        <i class="fa fa-dot-circle-o "></i> Publish</button>
                    <button type="reset " class="btn btn-danger btn-sm ">
                        <i class="fa fa-ban "></i> Clear</button>
                </div>
            </div>
            <div class="col-md-4 ">
            <div class="card ">
                                 
            <div class="card-body card-block ">
                <form action=" " method="post " enctype="multipart/form-data " class="form-horizontal ">
                    <div class="row form-group ">
                        <div class="col col-md-3 ">
                            <label for="select " class=" form-control-label ">Category</label>
                        </div>
                        <div class="col-12 col-md-9 ">
                            <select name="select " id="select " class="form-control ">
                                <option value="0 ">Please select</option>
                                <option value="1 ">Sports</option>
                                <option value="2 ">Politics</option>
                                <option value="3 ">Entertainment</option>
                                <option value="3 ">Lifestyle</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group ">
                    <div class="col col-md-3 ">
                        <label for=" tags " class=" form-control-label ">Add Tags</label>
                    </div>
                    <div class="col-12 col-md-9 ">
                        
                        
                            <div class="tags-input " data-name="tags-input " id="tags ">
                            </div>
                        
                        
                    </div>
                    </div>

                </form>
            
            
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
</div>
<script src="{{ asset( 'backend/ckeditor/ckeditor.js') }} "></script>
<script src="{{ asset( 'backend/tags/tags.js') }} "></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
 @endsection
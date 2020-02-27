@extends('layouts.pages')
@section('content')
 <div class="col-lg-12 col-sm-12 col-md-12" style="background:#fff;">
    <div class="section__title text-center">
        <h2 class="title__line">WE WANT TO HEAR FROM YOU</h2>
    </div>
               
    <div class="col" style="width:60%;margin:0 auto;  margin-bottom:20px">
        <div class="card" >
            <div class="card-body">
                
                <form>
                    <div class="form-group">
                        <label for="exampleInputText1">Full name<sup><i class="fa fa-asterisk" aria-hidden="true" style="color:#ef021e; font-size:6px"></sup></i></label>
                        <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Enter name">
                        <small id="textHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address<sup><i class="fa fa-asterisk" aria-hidden="true" style="color:#ef021e; font-size:6px"></sup></i></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group" class="input-group">
                        <label for="exampleInputText1">Message</label>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Settings</div>
                <div class="card-body">
                    <form method="POST" action="{{route('setting.update')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label>Blog name</label>
                        <input type="text" class="form-control" name="blog_name" value="{{$settings->blog_name}}">
                      </div>

                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone_num" value="{{$settings->phone_num}}">
                      </div>

                       <div class="form-group">
                        <label>blog email</label>
                        <input type="text" class="form-control" name="blog_email"value="{{$settings->blog_email}}">
                      </div>

                       <div class="form-group">
                        <label>address</label>
                        <input type="text" class="form-control" name="address" value="{{$settings->address}}">
                      </div>
                     

                     


                     
                       
                      <button class="btn btn-primary" type="submit">Save</button>        
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection

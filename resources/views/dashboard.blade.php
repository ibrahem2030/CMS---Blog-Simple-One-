@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                  <div class="card-header">User number : </div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{$users}}</h5>
                                    
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                  <div class="card-header">Posts Number :</div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{$posts}}</h5>
                                     <a href="{{route('posts')}}" class="btn btn-primary">Go Posts</a>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                  <div class="card-header">Categories Number : </div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{$categories}}</h5>
                                   <a href="{{route('categories')}}" class="btn btn-primary">Go Posts</a>
                                  </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-4">
                                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                  <div class="card-header">Tags Number : </div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{$tags}}</h5>
                                     <a href="{{route('tags')}}" class="btn btn-primary">Go Posts</a>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                  <div class="card-header">trashed Posts : </div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{$trashedPosts}}</h5>
                                    <a href="{{route('posts')}}" class="btn btn-primary">Go Posts</a>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                  <div class="card-header">Header</div>
                                  <div class="card-body">
                                    <h5 class="card-title">Primary card title</h5>
                                    <p class="card-text"></p>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    
                    
                    
                  
                    
                
           
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

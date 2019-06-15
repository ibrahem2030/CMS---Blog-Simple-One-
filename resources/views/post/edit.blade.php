@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Edit Post</div>
                <div class="card-body">
                    <form method="POST" action="{{route('post.update', ['id' => $post->id ])}}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label>title</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                      </div>
                     <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                          @foreach($categories as $category)
                            @if($category->id == $post->category_id)
                              <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div> 


                      @if(count($tags) !== 0)
                      <div class="form-check">
                        @foreach($tags as $tag)
                          

                              
                              <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}"  
                               @foreach($selectedTags as $stag)
                               @if($tag->id == $stag->id)
                               checked
                               @endif                               
                               @endforeach
                               >

                      
                  
                              <label class="form-check-label" >{{$tag->tag}}</label>     
                              <br>


                        

                    @endforeach

                      </div>
                      <hr>
                      @endif  


                      <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control"  name="content" cols="8" rows="8"> {{$post->content}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Image</label>
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" >
                      </div>  
                      <button class="btn btn-primary" type="submit">Upload</button>        
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

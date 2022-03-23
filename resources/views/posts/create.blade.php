
@extends('posts.layout')

@section('content')
    
    <br>
    <h1 style="margin-left: 45px">New Post</h1>
    <br>

    <div class="form-group" style="margin-left:100px;margin-right:100px">
        
            
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
                  
                    <div class="form-group">
                        <label for="title">Your Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        @if($errors->has('title'))
                        <span class="error">{{$errors->first('title')}}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="2">{{ old('body') }}</textarea>
                        @if($errors->has('body'))
                        <span class="error">{{$errors->first('body')}}</span>
                        @endif
                    </div>
                   
                    <br>
                    <button class="btn btn-block btn-warning">Create Post</button>
                </form>
            
    
    </div>
    <br> <br> <br> <br> <br> <br> <br> 

    @endsection
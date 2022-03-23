
@extends('posts.layout')

@section('content')
    
 
<body class="w3-light-grey" >
<div class="w3-content" style="max-width:1400px" style="">
<div class="w3-row" >
<div class="w3-col l8 s12" >  
<div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container" >    
    <div class="w3-row">
        <br>
        <div class="w3-col m8 s12">
            <h3><b>{{ $post->title }} </b></h3>
        </div>


        <div class="w3-col m4 w3-hide-small">
            <p  align="right"> 
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         
                <a href="{{ route('posts.edit', ['post' => $post->id ]) }}"><i class="fas fa-edit  fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            </p>
        </div> 
    </div>

      <h5>{{ Auth::user()->firstname }}{{ " " }}{{ Auth::user()->lastname }} {{ ", "  }}<span class="w3-opacity">{{ date_format($post->created_at, 'jS M Y') }}</span></h5>
    </div>
 
    <div class="w3-container">
      <p>{{ $post->body }}</p>
      
    </div>
    <div class="w3-col m4 w3-hide-small">
         <p  align="right"> 
            <form action="{{route('posts.destroy', ['post' => $post->id ])}}" method="post">
              
                @csrf
                @method("DELETE")
                <input type="submit" class="btn btn-danger" value="Delete">
            
            </form>         
          </p>

            <br>
 
            <h4> <b> &nbsp;&nbsp;&nbsp;&nbsp;Commentaires</b></h4>    

            <div class="comments-list">

              @foreach( $comments as $comment )

              <div class="w3-col l8 s12" style="width: 750px" >
                <!-- Blog entry -->
                <div class="w3-card-4 w3-margin w3-white">
              
                  <div class="w3-container" >    
                    <div class="w3-row">
                        <br>
                        <div class="w3-col m8 s12">
                          <span class="w3-opacity">{{ date_format($comment->created_at, 'jS M Y') }}</span>
                        </div>        
                      </div>
                   </div> 
               <br>
                  <div class="w3-container">
                    <p>{{ $comment->body }}{{ old('body', $comment->body) }}</p>
                      <div style="text-align: right"> 
                        <form action="{{route('comments.destroy', ['comment' => $comment->id ])}}" method="post">
                          
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-danger" value="Delete">
                        
                        </form>         
                      </div>
                      <br>

                    </div>
                  
        
                </div>
              
                <hr>
              
              </div>

              @endforeach
            </div> 
  </div>

</div></div>
</div>

<br><br><br><br><br>
@endsection
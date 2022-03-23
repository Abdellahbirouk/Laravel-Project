
@extends('posts.layout')

@section('content')
    


<body class="w3-light-grey" >
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>Mon fil d'actualité</b></h1>
  <p>Bienvenue à la page des posts <span class="w3-tag"></span></p>
</header>

<!-- Grid -->
<div class="w3-row" >
  @foreach ($posts as $post) 
      

<div class="w3-col l8 s12" >  
  <!-- Blog entry -->
<div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container" >
     
      <h3><b><a href="{{ route('posts.show', ['post' => $post->id ]) }}" >{{ $post->title }}</a>   </b></h3>

      <h5>{{ Auth::user()->firstname }}{{ " " }}{{ Auth::user()->lastname }} {{ ", "  }}<span class="w3-opacity">{{ date_format($post->created_at, 'jS M Y') }}</span></h5>
    </div>



 <div class="w3-container">
      <p>{{ $post->body }}</p>
       
    </div>
    
  </div>


  <div class="w3-row">
      <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
        <input type="hidden" name="post_id" value="{{ $post->id }}"> 

        <div class="w3-col m8 s12">   
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
          
          <textarea name="body" id=" body" rows="2" cols="67" placeholder="Votre commentaire..." required></textarea>
        </div> 
        
         <div class="w3-col m4 w3-hide-small">

          <span class="w3-padding-large w3-right"><b>
              <input type="submit" name="commantaire" value="Commenter">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b> 
              <span class="w3-tag"></span>
          </span>
        </div>  
      
      </form> 
        
  </div>
  <hr>

</div>


    @endforeach
</div><br>
</div>

@endsection
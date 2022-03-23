<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\StorePost;
use App\Models\Commentaire;
use App\Http\Controllers\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        function genererCode($lenght){
            $char='0123456789abcdefghijklmnepqrstvwxyzAZERTYUIOPSDFGHJKLMWXCVBN';
            $string='';
            for($i=0;$i<$lenght;$i++){
              $string.=$char[rand(0,strlen($char)-1)];
            }
            return $string;
        }
        $code=genererCode(10);  

            $title = $request->input('title');


            $validateData = $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);

            $post->user_id = $request->input('user_id');
            $post->title = $request->input('title');
            $post->permalink = "https://medium.com/justlaravel/".$title.$code;
            $post->body = $request->input('body');
            $post->deleted_at = false;

            $post->save();
            

            
            $request->session()->flash('message', 'Le poste a été créé !!!');
            return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        return view('posts.show', [
            'post' => Post::find($id),
            'comments' =>  Commentaire::Select('*')
                ->where('post_id',$id)
                ->get()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        function genererCode1($lenght){
            $char='0123456789abcdefghijklmnepqrstvwxyzAZERTYUIOPSDFGHJKLMWXCVBN';
            $string='';
            for($i=0;$i<$lenght;$i++){
              $string.=$char[rand(0,strlen($char)-1)];
            }
            return $string;
        }
        $code=genererCode1(10);  
        $title = $request->input('title');

        $post->user_id = $request->input('user_id');
        $post->title = $title;
        $post->permalink = "https://medium.com/justlaravel/".$title.$code;
        $post->body = $request->input('body');
        $post->deleted_at = false;

        $post->save();

        
        $request->session()->flash('message', 'Le poste a été modifier !!!');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request ,$id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
        Commentaire::where('post_id', $id)->delete();
        

        $request->session()->flash('message', 'Le poste a été supprimé !!!');
        return redirect()->route('posts.index');

    }

}

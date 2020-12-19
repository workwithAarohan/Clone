<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostAttr;
use App\Models\User;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        $posts = Post::where('user_id',$user->id)->orderBy('created_at','desc')->get();

        foreach($posts as $post)
        {
            $post->postAttrs = $post->postAttrs->take(1);
        }

        $posts->count = $posts->count();

        return view('posts.index',[
            'user' => $user,
            'posts' => $posts,
        ]);

    }

    public function saved(User $user)
    {
        //
        $posts = Post::where('user_id',$user->id)->orderBy('created_at','desc')->get();

        foreach($posts as $post)
        {
            $post->postAttrs = $post->postAttrs->take(1);
        }

        $posts->count = $posts->count();

        return view('posts.saved',[
            'user' => $user,
            'posts' => $posts,
        ]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        $post = new Post;

        $post->caption = $request->input('caption');
        $post->user_id = auth()->user()->id;

        $post->save();

        if($request->hasFile('image'))
        {       
            foreach($request->image as $image)
            {
                $post_attr = new PostAttr;
                $post_attr->post_id = $post->id;

                $filename = $image->getClientOriginalName();
                $Path = public_path() . '/image/post/';
                $image->move($Path, $filename);
                $post_attr->image= $filename;
                
                $post_attr->save();
            }
        }

        return redirect('/post/'. $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.show',[
            'post' => $post,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    //

    public function index($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::where('user_id',$id)->orderBy('created_at','desc')->get();

        foreach($posts as $post)
        {
            $post->postAttrs = $post->postAttrs->take(1);
        }

        $posts->count = $posts->count();

        return view('profile.index',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function update_profilepic(Request $request, $id)
    {
        $user = User::find($id);

        if($request->hasFile('image'))
        {  
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $Path = public_path() . '/image/profile/';
            $image->move($Path, $filename);
            $user->profile_img= $filename;
        }

        $user->save();

        return redirect()->back();
    }
}

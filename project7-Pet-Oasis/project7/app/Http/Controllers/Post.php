<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Post extends Controller
{

     public function store(Request $request,$post_type)
     {
         $input = $request->all();

         request()->validate([
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'post'  => 'required'
         ]);

         if (!empty(request()->image)) {
             $imageName = time() . '.' . request()->image->getClientOriginalExtension();
             request()->image->move(public_path('images'), $imageName);
         } else {
             $imageName = '';
         }

         $post = array( 'post_text' => request()->input('post'), 'post_image' => $imageName, 'post_type' => $post_type,
          'user_id' => 5);

//         dd($post);
         DB::table('posts')->insert($post);
         $notification = array(
             'message'=>'Successfully Add Post',
             'alert-type'=>'success'
         );

         return redirect('/posts/'.$post_type)->with($notification);
     }



     public function show($post_type=null)
     {
         $requestType = request()->getRequestUri();
         if($requestType != '/posts') {
             $posts = DB::table('posts')
                 ->join('users', 'posts.user_id', '=', 'users.user_id')
                 ->select('users.*', 'posts.*')
                 ->where('posts.post_type', '=', $post_type)
                 ->orderBy('created_at', 'desc')
                 ->get();
         }else {
             $posts = DB::table('posts')
                 ->join('users', 'posts.user_id', '=', 'users.user_id')
                 ->select('users.*', 'posts.*')
                 ->get();
         }


         $comment = DB::table('comments')
             ->join('users','comments.user_id','=','users.user_id')
             ->select('users.*','comments.*')
             ->orderBy('comments.comment_id', 'desc')
             ->get();

         $commentCount = DB::table('comments')
             ->join('users','comments.user_id','=','users.user_id')
             ->select('users.*','comments.*')
             ->orderBy('comments.comment_id', 'desc')
             ->get();


         return view('public.posts')->with('posts',$posts)->with('comments',$comment)->with('commentCount', $commentCount);
     }



     public function single_page($id)
     {
         $posts = DB::table('posts')
             ->join('users', 'posts.user_id', '=', 'users.user_id')
             ->select('users.*', 'posts.*')
             ->where('posts.post_id','=',$id)
             ->get();


         $comment = DB::table('comments')
             ->join('users','comments.user_id','=','users.user_id')
             ->select('users.*','comments.*')
             ->orderBy('comments.comment_id', 'desc')
             ->get();


         return view('public.single_page_post')->with('posts',$posts)->with('comments',$comment);
     }

}

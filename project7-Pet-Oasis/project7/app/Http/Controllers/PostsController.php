<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_type=null)
    {
        $requestType = request()->getRequestUri();
        if($requestType != '/posts') {
            $posts = DB::table('posts')
                ->join('users', 'posts.user_id', '=', 'users.user_id')
                ->where('posts.post_type', '=', $post_type)
                ->orderBy('post_id', 'desc')
                ->get();
        }else {
            $posts = DB::table('posts')
                ->join('users', 'posts.user_id', '=', 'users.user_id')
                ->select('users.*', 'posts.*')
                ->get();
        }

        $comment = DB::table('comments')
            ->join('users','comments.user_id','=','users.user_id')
            ->orderBy('comments.comment_id', 'desc')
            ->get();
        $commentCount = Comment::all();


        return view('public.posts')->with('posts',$posts)->with('comments',$comment)->with('commentCount', $commentCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_type)
    {
        $input = $request->all();

        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post'  => 'required'
        ]);

        if (!empty(request()->image)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        } else {
            $imageName = '';
        }

        $post = new Post();
        $post->post_text = request()->input('post');
        $post->post_image = $imageName;
        $post->post_type = $post_type;
        $post->user_id = Auth::user()->user_id;

        $post->save();
        $notification = array(
            'message'=>'Successfully Add Post',
            'alert-type'=>'success'
        );

//        return redirect('/posts/'.$post_type)->with($notification);
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.user_id')
            ->select('users.*', 'posts.*')
            ->where('posts.post_id','=',$id)
            ->get();


        $comments = DB::table('comments')
            ->where('post_id', $id)
            ->join('users','comments.user_id','=','users.user_id')
            ->orderBy('comments.comment_id', 'desc')
            ->get();


        return view('public.single_page_post')->with('posts',$posts)->with('comments',$comments);
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

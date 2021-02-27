<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$post_id, $post_type)
    {
        $request->validate([
            'comment' => 'required',
        ]);

//        $comment     = $request->input('comment');


        $comment = new Comment();
        $comment->comment_text = request('comment');
        $comment->comment_type = $post_type;
        $comment->post_id = $post_id;
        $comment->user_id = Auth::user()->user_id;
        $comment->save();
//        $comments=array('comment_text'=>$comment,'comment_type'=>$post_type,'post_id'=>$post_id,'user_id'=>$user_id);
//        DB::table('comments')->insert($comments);

        $notification = array(
            'message'=>'Successfully Add your comment!',
            'alert-type'=>'success'
        );

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
    public function destroy($post_type, $id)
    {

        $comment =  Comment::find($id);
        $comment->delete();

        $notification = array(
            'message'=>'Successfully Deleted!',
            'alert-type'=>'warning'
        );

        return back()->with($notification);
    }
}

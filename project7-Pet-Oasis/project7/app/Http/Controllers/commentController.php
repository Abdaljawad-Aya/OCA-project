<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class commentController extends Controller
{

    public function Comment($user_id,$post_id)
    {
        $comments = DB::select('select * from comments where user_id='.$user_id.'and post_id='.$post_id);
        return view('public.posts',['comments'=>$comments]);
    }



    public function storeComment(Request $request,$user_id,$post_id,$post_type)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment     = $request->input('comment');



        $comments=array('comment_text'=>$comment,'comment_type'=>$post_type,'post_id'=>$post_id,'user_id'=>$user_id);
        DB::table('comments')->insert($comments);

        $notification = array(
            'message'=>'Successfully Add your comment!',
            'alert-type'=>'success'
        );

        return back()->with($notification);
    }




    public function Delete($id)
    {
        DB::select('Delete from comments where comment_id='. $id);

        $notification = array(
            'message'=>'Successfully Deleted!',
            'alert-type'=>'warning'
        );

        return back()->with($notification);
    }
}

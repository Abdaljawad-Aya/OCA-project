@extends('public.layout.layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3 mt-5" style="margin: 0 auto">
                <div class="widget categories">
                    <ul class="category-nav">

                        <li class="{{request()->getRequestUri() == '/posts' ? 'active': ''}}"
                        ><a href="/posts">All Posts</a></li>

                        <li class="{{request()->getRequestUri() == '/posts/question' ? 'active': ''}}"
                        ><a href="/posts/question">Question</a></li>

                        <li class="{{request()->getRequestUri() == '/posts/rescue' ? 'active': ''}}"><a
                                href="/posts/rescue">Rescue</a></li>

                        <li class="{{request()->getRequestUri() == '/posts/adopte' ? 'active': ''}}"><a
                                href="/posts/adopte">Adopte</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-9 mt-0">
                @foreach($posts as $post )
                    @if($post->post_id )

                        <div class="single-news" style="padding: 0">
                            <div class="author-box" style="padding: 10px;">
                                <div class="author-box"
                                     style="padding: 10px;display: flex;justify-items: center;align-items: center;margin-top: 0;background:none">
                                    <div class="media" style="margin-bottom: 0;width:60px">
                                        <img src="/images/{{$post->user_image}}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="body">
                                        <h4 class="media-heading m-1">{{$post->user_name}}</h4>
                                        <div class="meta-date m-0">May 12, 2017</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">

                                        <p style="padding:1rem; color: black">{{$post->post_text }}</p>
                                    </div>
                                    <div class="col-lg-6">

                                        @if($post->post_image != null)
                                            <div class="col-12 pos-relative">

                                                <img height="80%" width="80%" src="/images/{{$post->post_image}}" alt=""
                                                     class="img-fluid rounded">

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end single blog -->

                        <div class="leave-comment-box" style="background: RGB(243, 243, 243)">
                            <form action="/storeComment/{{$post->post_id}}/{{$post->post_type}}" class="form-comment"
                                  method="post">
                                @csrf
                                <div
                                    class="row d-flex justify-content-center align-items-center align-content-center mb-0"
                                    style="flex-wrap: wrap">
                                    <div class="container">

                                        <div class="row p-4">
                                            <div class="col-lg-8">
                                                <input style="background: #fff" type="text" id="comment" name="comment"
                                                       class="inputtext form-control" rows="2"
                                                       placeholder="Leave Comments...">
                                            </div>
                                            <div class="col-lg-3">
                                                <button style="padding:0.8rem; border-radius:10px" id="comment"
                                                        type="submit"
                                                        class="btn btn-primary">Post Comment
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end author box -->

                        <div class="comments-box p-3 pb-0" style="background: RGB(243, 243, 243)">

                            <h4 class="title-heading mt-0">Comments <span>({{count($comments)}})</span></h4>
                            @foreach($comments as $comment)
                                @if($comment->post_id === $post->post_id)
                                    <div class="media comment" style="background: RGB(243, 243, 243);padding-bottom: 0">
                                        <img class="mr-3 rounded-circle" alt="80x80"
                                             src="/images/{{$comment->user_image}}"
                                             style="width: 50px; height:50px;">
                                        <div class="media-body">
                                            <h5 class="media-heading mt-0 mb-1">{{$comment->user_name}}<small
                                                    class="date"></small>
                                            </h5>

                                            <div>
                                                <p style="color:black">{{$comment->comment_text}}</p>
                                            </div>
                                        </div>
                                        @auth
                                            @if(\Illuminate\Support\Facades\Auth::user()->user_id === $comment->user_id)
                                                <div>
                                                    <a href="/posts/{{$comment->comment_type}}/delete/{{$comment->comment_id}}"><i
                                                            style="color:red">Delete</i></a>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- {{$comments->links()}}--}}
                    <!-- end comment -->
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;
use App\like;
use App\comlike;
use App\comment;
use App\user;
use App\notice;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(){
        $posts = post::orderBy('created_at','desc')->get();
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }
        return view('post.index', ['posts' => $posts,'notice'=>$notice]);
    }


    public function edit_post($id){
        $posts = post::find($id);
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }
        if( Auth::user()->id == $posts->user_id || Auth::user()->admin == 1){
        return view('editpost', ['posts' => $posts,'notice'=>$notice]);
        }else{
            return redirect()->back();
        }
    }

    public function update_post($id){
        request()->validate([
            'title' => 'required',
         ]);
        $posts = post::find($id);
        $posts->title = request('title');

        $posts->save();
        return redirect()->route('home')->with("success","Your post has been Updated Thank you for using FACELibya...");
    }
    public function delete_post($id)
    {
        $posts = post::find($id);
        if( Auth::user()->id == $posts->user_id || Auth::user()->admin == 1){

        comment::where('post_id',$id)->delete();
        notice::where('post_id',$id)->delete();
        like::where('post_id',$id)->delete();
         post::find($id)->delete();
        }

        return redirect()->route('home')->with("success","Your post has been Deleted Thank you for using FACELibya...");
     }


     public function delete_comment($id)
     {
         $comment = comment::find($id);
         $post = post::find($comment->post_id);
         if( Auth::user()->id == $comment->user_id || Auth::user()->id == $post->user_id){
         $post->count--;
         $comment->delete();
         comlike::where('comment_id',$id)->delete();
         $post->save();
         }
 
          return redirect()->back();
      }



    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();

                $post->count2--;
                $post->save();

                return null;
            }
        } else {
            $like = new Like();

            if(Auth::user()->id != $post->user->id){
                $notice = new notice;
                $notice->user_name = $user->name;
                $notice->what = true;
                $notice->state = true;
                $notice->user_id = $post->user->id;
                $notice->post_id = $post_id;
                $notice->save();
            }
            $post->count2++;
            $post->save();

        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }



    public function ComLikeCom(Request $request)
    {
        $comment_id = $request['commentId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $comment = comment::find($comment_id);
        if (!$comment) {
            return null;
        }
        $user = Auth::user();
        $like = $user->Comlikes()->where('comment_id', $comment_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();

                $comment->count--;
                $comment->save();

                return null;
            }
        } else {
            $like = new comLike();

            $comment->count++;
            $comment->save();

        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->comment_id = $comment->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }




    public function singlepost($id){
        $posts = post::find($id);
        $comment = comment::orderBy('created_at','desc')->where('post_id',$id)->get();
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }

        return view('post',['posts'=>$posts, 'comment'=>$comment,'notice'=>$notice]);
    }

    public function store(){
     
        request()->validate([
            'title' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);

        $post =new post;
        $post->title= request('title');
        $post->user_id= Auth::user()->id;
        if(request()->file('img')){
        $post->img = request()->file('img')->store('public');
        $post->img = str_replace('public', '', $post->img); 
        }
        
        $post->save();
        return redirect()->route('home')->with("success","Your post has been published Thank you for using FACELibya...");

    }

    public function comment($id){
     
        request()->validate([
            'comment' => 'required',
         ]);

        $comment =new comment;
        $comment->comment = request('comment');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;

        $post = post::find($id);
        $post->count++;
        $post->save();

        if(Auth::user()->id != $post->user->id){
        $notice = new notice;
        $notice->user_name = Auth::user()->name;
        $notice->what = false;
        $notice->state = true;
        $notice->user_id = $post->user->id;
        $notice->post_id = $id;
        $notice->save();
        }

        $comment->save();
        return redirect()->route('single',['id'=>$id])->with("success","Your comment has been published...");

    }


}

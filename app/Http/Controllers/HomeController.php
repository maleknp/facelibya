<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;
use App\notice;
use App\comment;

use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = user::where('admin', true)->get();

        $best = post::orderBy('count2','desc')->take(4)->get();
        $posts = post::orderBy('created_at','desc')->get();        
        $f = [];
        if(auth()->user()){
            $friend = post::where('user_id' , Auth::user()->id)->get();
            $all = [];
            foreach($friend as $f){
                foreach($f->likes as $flike){
                    array_push($all, $flike->user_id);
                }
            }
        $all = array_unique($all);
        // dd($all);
        $f = [];
        foreach($all as $a){
            if($a != Auth::user()->id){
            array_push($f, user::find($a));
            }
        }
        // dd($f);
    }

        if (auth()->user()) {
        $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
        $notice = notice::where($matchThese)->count();
         }else{
             $notice = 0;
         }

        return view('home', ['posts' => $posts, 'notice'=>$notice, 'best'=>$best, 'admin'=>$admin, 'f'=>$f]);
    }


    public function chat()
    {
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }
        return view('chat',['notice'=>$notice]);
    }

    

    public function contact()
    {
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }
        return view('contact',['notice'=>$notice]);
    }

    public function member(){
        $users = user::orderBy('created_at','desc')->get();
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }
        return view('members', ['Users' => $users, 'notice'=>$notice]);
    }

    public function search()
    {
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }

        $user = user::latest();          


        $name = request('search');

        $user->where('name', 'LIKE', '%' . $name . '%');
        $users = $user->get();

        if(!$name){
            return redirect()->route('home');
        }
        elseif(!$users)
        {
            return view('members1',['users' => $users, 'name'=>$name, 'notice'=>$notice])->with('success', 'There is no member withe this name');          
        }
        else{
            return view('members1',['users' => $users, 'name'=>$name, 'notice'=>$notice]);
        }

    }


}

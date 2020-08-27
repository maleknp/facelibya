<?php

namespace App\Http\Controllers;

use App\user;
use App\post;
use App\notice;
use App\images;
use App\interest;

use Illuminate\Http\Request;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function profile($id)
    {
        $users = user::find($id);
        $int = interest::where('user_id', $id)->get();
        $count2 = $int->count();

        $posts = post::orderBy('created_at','desc')->where('user_id', $id)->get();
        $image = images::orderBy('created_at','desc')->get();
        $count = $posts->count();
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }
        return view('profile', ['users'=>$users, 'posts'=>$posts, 'notice'=>$notice, 'int'=>$int, 'count'=>$count, 'count2'=>$count2, 'image'=>$image]);
    }

    public function edit($id)
    {
        $users = user::find($id);

        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }
        return view('edit', ['users'=>$users, 'notice'=>$notice]);
    }


    public function notices()
    {
        $notices = notice::orderBy('created_at','desc')->where('user_id',Auth::user()->id)->get();

        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }

        $state = notice::where($matchThese)->get();
        foreach($state as $state){
            $state->state = 0;
            $state->save();
        }

        return view('notices',['notices'=>$notices,'notice'=>$notice]);
    }


    public function showChangePasswordForm(){
        if (auth()->user()) {
            $matchThese = ['state' => '1', 'user_id' => Auth::user()->id];
            $notice = notice::where($matchThese)->count();
        }else{
            $notice = 0;
        }
        return view('auth.changepassword',['notice'=>$notice]);   
     }



     public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->route('home')->with("success","Password changed successfully!");

    }


    public function interests(){
        request()->validate([
            'interest' => 'required'
         ]);
         $int =new interest;
         $int->int= request('interest');
         $int->user_id= Auth::user()->id;

         $int->save();
         return redirect()->back()->with("success","Added Success..."); 

    }

    public function update($id){
       
        request()->validate([
            'name' => 'required'
         ]);

        $user = user::find($id);

      $user->name= request('name');
      $user->bio= request('bio');
      $user->about= request('about');

      $user->save();
      return redirect()->route('profile', $id)->with("success","Changed Successfully...");
    }

    public function edit_avatar($id){
        
        request()->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

        $user = user::find($id);
        $posts = new post;
        $image = new images;
        $posts->title = 'Changed his profile photo';

        $newimagePath = request()->file('avatar')->store('public');
        $user->avatar = str_replace('public', '', $newimagePath);
        $posts->img = $user->avatar;
        $image->img = $user->avatar;
        $image->user_id = $user->id;
        $posts->user_id = $user->id;

        $posts->save();
        $image->save();
        $user->save();
        return redirect()->back();

    }

    public function edit_cover($id){
        request()->validate([
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

        $user = user::find($id);
        $posts = new post;
        $image = new images;
        $posts->title = 'Changed his cover photo';
              
          $newimagePath = request()->file('cover')->store('public');
          $user->cover = str_replace('public', '', $newimagePath);
          $posts->img = $user->cover;
          $image->img = $user->avatar;
          $image->user_id = $user->id;
          $posts->user_id = $user->id;
  
          $posts->save();
          $image->save();
          $user->save();
      return redirect()->back();

    }

}

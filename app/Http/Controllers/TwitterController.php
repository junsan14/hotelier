<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon;

class TwitterController extends Controller
{
   
       public function login(){
          return Socialite::driver('twitter')->redirect();
       }   
   
      public function callback()
      {
          $twitteruser = Socialite::driver('twitter')->user();
          $user = User::where('twitter_id', $twitteruser->id)->first();
          //dd($twitteruser);
          if($user){
            Auth::login($user);
            return redirect('/home');
          }else{
            if($twitteruser->email){
                $user = new User;
                $user->twitter_id = $twitteruser->id;
                $user->email = $twitteruser->email;
                $user->email_verified_at = now();
                $user->username = $twitteruser->nickname;
                $user->save();

                Auth::login($user);
                return redirect('/home');

            }else{
            return redirect('/register')->with('registerError', true);
            }


          }

      }
}

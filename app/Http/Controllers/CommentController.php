<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Like;


class CommentController extends Controller
{
    public function storeComment(Request $request){
        $auth = Auth::user();
        if($auth){
            if($auth->hotel_adr){
                $comment = new Comment;
                $comment->question_id = $request->question_id;
                $comment->user_id = $auth->id;
                $comment->content = $request->content;
                $comment->save();
                return response()->json(compact('request'));
            }else{
                $msg = 'プロフィールの入力が必要です';
                return response()->json(compact('msg'));
            }
            

        }else{
            $msg = 'ログインが必要です';
            return response()->json(compact('msg'));
        }

    }
    public function fetchComment($question_id){
        $auth = Auth::user();
        $comments = Comment::where('question_id', $question_id)->latest()->get();
        $users = [];
        $time = [];

        foreach($comments as $comment){
            array_push($time,$comment->created_at->diffForHumans());
            array_push($users,User::where('id', $comment->user_id)->first());
        }
        if($auth){
            return response()->json(compact('comments','users','time',
                'auth'));
        }else{
            return response()->json(compact('comments','users','time'));
        }
        
    }


}

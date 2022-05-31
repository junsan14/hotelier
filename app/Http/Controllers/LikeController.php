<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Comment;

class LikeController extends Controller
{   
    public function likeStore(Request $request){
        $auth = Auth::User();
        if($auth){
            $like = new Like();
            $like->user_id = $auth->id;
            $like->question_id = $request->question_id;
            $like->comment_id = $request->comment_id;
            $like->save();
            return response()->json(compact('like'));
        }else{
            $msg = 'ログインが必要です';
            return response()->json(compact('msg'));
        }
        
        
        
        
        
    }
    public function unLikeStore(Request $request){
        $auth = Auth::User();
        $unlike = Like::where([
            ['user_id', $auth->id],
            ['question_id', $request->question_id],
            ['comment_id', $request->comment_id],
        ])->first()->delete();

        return response()->json(compact('unlike'));
        
    }

    public function fetchLikeCount($question_id, $comment_id){
        $auth = Auth::User();

        $count = Like::where([
            ['question_id', $question_id],
            ['comment_id', $comment_id]
        ])->count();

        if($auth){
            $authorLike = Like::where([
                ['user_id', $auth->id],
                ['question_id', $question_id],
                ['comment_id', $comment_id],
            ])->count();  
            return response()->json(compact('count', 'authorLike','auth'));

        }else{
            return response()->json(compact('count'));
        }
    }
}

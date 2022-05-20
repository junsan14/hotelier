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
        $like = new Like();
        $like->user_id = $auth->id;
        $like->question_id = $request->question_id;
        $like->comment_id = $request->comment_id;
        $like->save();
            return response()->json(compact('like'));
        
        
        
        
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

    public function fetchLikeCount($question_id){
        $auth = Auth::User();
        $comments = Comment::where('question_id', $question_id)->latest()->get();
        $likes = [];
        $authorLikes = [];
        array_push($likes, Like::where([
            ['question_id', $question_id],
            ['comment_id',0],
        ])->count());

        if($auth){
                 array_push($authorLikes, Like::where([
                ['user_id',$auth->id],
                ['question_id',$question_id],
                ['comment_id',0],
                ])->first());

                foreach($comments as $comment){
                    array_push($likes,Like::where([
                        ['comment_id', $comment->id],
                    ])->count());
                    array_push($authorLikes, Like::where([
                        ['user_id',$auth->id],
                        ['comment_id',$comment->id],
                    ])->first());
                }
                return response()->json(compact('likes', 'authorLikes','auth'));

        }else{
            return response()->json(compact('likes'));
        }
    }
}

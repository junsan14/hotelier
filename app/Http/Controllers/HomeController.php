<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use App\Models\Comment;
use Carbon\Carbon;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {  
        $questions = Question::get();
        $ids = [];
        $cat_ids = [];
        $titles = [];
        $commentCounts = [];
        $pop_questions = [];

        foreach($questions as $question){
            $commentCount = Comment::where('question_id', $question->id)->count();
            if($commentCount){
              array_push($ids, $question->id);
              array_push($cat_ids, $question->type_id);
              array_push($titles, $question->title);
              array_push($commentCounts, $commentCount);
              
            }
        }
        array_push($pop_questions, $ids,$cat_ids, $titles, $commentCounts);
        array_multisort(
            $pop_questions[3], SORT_DESC,
            $pop_questions[0], SORT_DESC,$pop_questions[3],
            $pop_questions[1], SORT_DESC,$pop_questions[3],
            $pop_questions[2], SORT_DESC,$pop_questions[3],
        );
        //dd($pop_questions);
        return view('/home',compact('pop_questions'));
    }


     
    
}

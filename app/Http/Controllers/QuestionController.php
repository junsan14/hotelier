<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Like;


class QuestionController extends Controller
{
   
    public function new(){
        $auth = Auth::user();
        $categories = Category::get();

        return view('question.new', compact('auth', 'categories'));
    }
    public function post(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'max:500'],
        ]);
        $question = new Question;
        $question->user_id = $request->user_id;
        $question->title = $request->title;
        $question->type_id = $request->type;
        $question->cat_id = $request->cat;
        $question->content = $request->content;
        $question->save();

        return redirect('/home')->with('questionAdd', true);
    }
   public function questionShow($type_id,$question_id)
    {   $auth = Auth::user();
        $question = Question::where('id', $question_id)->first();
        $user = User::where('id', $question->user_id)->first();
        return view('question.show',compact('question', 'user', 'type_id', 'auth'));
    }

   public function myquestionShow()
    {   $auth = Auth::user();
        $questions = Question::where('user_id', $auth->id)->latest()->get();
        $comment_nums = [];
        $like_counts = [];
        foreach($questions as $question){
            array_push($comment_nums, Comment::where('question_id', $question->id)->count());
            array_push($like_counts, Like::where([
                ['question_id',$question->id],
                ['comment_id',0],
            ])->count());
        }
        return view('question.myquestion',compact('questions', 'auth','like_counts', 'comment_nums'));
    }
     public function myquestionEdit($question_id)
    {   $auth = Auth::user();
        $question = Question::where('id', $question_id)->first();
        $cat_id = Category::where('id', $question->cat_id)->first();
        return view('question.edit', compact('question', 'cat_id'));
    }
    public function myquestionUpdate(Request $request,$question_id)
    {   
        $question = Question::where('id', $question_id)->first();
        $question->title = $request->title;
        $question->type_id = $request->type_id;
        $question->cat_id = $request->cat_id;
        $question->content = $request->content;
        $question->save();

        return redirect('/myquestion/show/')->with('questionUpdate', true);
    }
    
     public function questionList($type_id)
    {   $questions = Question::where('type_id',$type_id)->latest()->paginate(5);
        $category_names = [];
        $time = [];
        $users = [];
        $comments=[];
        foreach($questions as $question){
            array_push($time,$question->created_at->diffForHumans());
            array_push($category_names, Category::where('id', $question->cat_id)->select('name')->first());
            array_push($users, User::where('id', $question->user_id)->first());
            array_push($comments, Comment::where('question_id', $question->id)->count());
        }
        return view('/question',compact('questions', 'category_names', 'time', 'users', 'comments'));
    }

    public function delete(Request $request){
        $question = Question::where('id', $request->question_id);
        $question->delete();
        return response()->json();
    }

}

@extends('layouts.app')

@section('content')
	@if(session('questionUpdate'))
	<div class="alert-message js-alert-message">
		更新が完了しました
	</div>
	@endif
<div id="myquestion">
    <div class="title">
        <p>{{$auth->username}}さんが投稿した悩み/相談</p>
    </div> 
    <div class="content row">
  
    	@foreach($questions as $i=> $question)
    	<div class="col-sm-8" style="text-align: center;">
	    	@if(!$question)
	    	まだ何も投稿しておりません<br>
	    	<a href="{{route('question.new')}}">こちらから</a>
	    	{{$auth->username}}さんの悩みや相談をしてみましょう
	    	@endisset
	    </div>
        <div class="col-sm-8 question-list" data-id="{{$question->id}}">
        	<div class="col-sm-12">
	        		{{$question->title}}
	        		<div class="desc">
		        		 <div class="item">
			    		  {{$question->created_at}} 						
							</div>
							<div class="item">
			    		  <i class="fa-solid fa-heart" style="color: red;"></i> {{$like_counts[$i]}}
			    		</div>
			    		<div class="item">
			    		  <img src="{{asset('image/comment02.png')}}"class="icon"  alt=""> {{$comment_nums[$i]}}
			    		</div>
	        		</div>
	        </div>

	 		<div class="edit-icon col-sm-12">
	    		<a href="{{route('question.show', [$question->type_id, $question->id])}}" class="item"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
	        	<a href="{{route('myquestion.edit', $question->id)}}" class="item"><i class="fa-solid fa-pen-to-square"></i></a>
	        	<a href="" class="item js-trash"><i class="fa-solid fa-trash-can"></i></a>
	 		</div>

	    </div>
        @endforeach

    </div>



</div>



@endsection
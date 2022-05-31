@extends('layouts.app')

@section('content')

<div id="show">
    <div class="title">
        <p>{{ $question->title}}</p>
    </div>  
    <div class="content row">
        <div class="col-sm-8 question" data-id="{{$question->id}}">
        	<div class="content">
        		{{ $question->content}}
        	</div>

        	<div class="post-desc">     		
	        		<div class="tag col-sm-3">
	             	  {{$user->age}}             		
	             	</div>
	            @if($question->type_id === 1)
	        		<div class="tag col-sm-3">
	             	  {{$user->sex}}             		
	             	</div>
	            @elseif($question->type_id === 2)
	             	<div class="tag col-sm-3">
	             	  {{$user->hotel_worker_num}}             		
	             	</div>
	            @endif

	            @if($question->type_id === 1)
	        		<div class="tag col-sm-3">
	             	  {{$user->work_title}}             		
	             	</div>
	            @elseif($question->type_id=== 2)
	             	<div class="tag col-sm-3">
	             	  {{$user->hotel_type}}             		
	             	</div>
	            @endif

	            @if($question->type_id=== 1)
	        		<div class="tag col-sm-3">
	             	  {{$user->work_length}}             		
	             	</div>
	            @elseif($question->type_id=== 2)
	             	<div class="tag col-sm-3">
	             	  {{$user->hotel_adr}}             		
	             	</div>
	            @endif



	        	
	        	
	        </div>
	    
	        <div class="post-desc">
	        	<div class="post-profile">
	        		{{$user->area}}{{$user->hotel_type}}/{{$user->work_title}}
	        		{{$user->username}} さん
	        	</div>
	        </div>
	        <div class="post-desc">
	        	<div class="like-area js-like-area" id="like-app" data-comment-id="0">	        		        	
	        	</div>
	        	<div class="post-date">
	        		{{$question->created_at}}
	        	</div>
	        </div>
       	
        </div>
    <div class="col-sm-8 pagenation">
    		<div class="back">
				<a class="js-back-btn back-btn"><i class="fa-solid fa-arrow-left back-btn"></i>		</a>
			</div>
    </div>

    <div id="comment-app">

			


    </div>
    


    </div>

</div>




@endsection
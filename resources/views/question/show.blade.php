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
	        	<div class="like-area js-like-area" data-comment-id="0">
	        	<div class="like-btn">
			        	<a href="" class="js-unlike unlike">  		   
							<i class="fa-solid fa-heart" style="color: red;"></i>
						</a>				   
						<a href="" class="js-like like">
							<i class="fa-regular fa-heart"></i>
						</a>
		        	</div>
		        	<div class="like-count js-like-count">
		        	</div>	        	
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
    @isset($auth->email_verified_at)
    <div class="col-sm-12 comment js-fixed">
    	<form action="">
		     <textarea class="form-control" name="content" rows="2" placeholder="コメントを入力する"></textarea> 
    		<button type="submit" class="form-btn btn js-store-comment">
    			コメント
    		</button> 		
    	</form>
	</div>
	@endisset

		<div class="title">コメント一覧</div>

	@if(!$auth)
	<div class="visiter-advice">
			コメント閲覧希望は
			<a href="{{route('register')}}">ユーザー登録</a>
	</div>
	<div class="visiter-blur">		
	@endif

	 <div class="col-sm-8 comment-list">
    	
    	<!-- <div class="comment-list-item">
    		<div class="js-comment-content"></div>
    		<div class="post-desc">
    			<div class="js-post-profile post-profile">
	        		{{$user->hotel_type}}に{{$user->work_length}}お勤めの{{$user->username}} さん
	        	</div>
	        	<div class="js-post-date post-date">
	        		{{$question->created_at}}
	        	</div>
    		</div>
    	</div> -->


	</div>
	@if(!$auth)
	</div>

	@endif


    </div>

</div>




@endsection
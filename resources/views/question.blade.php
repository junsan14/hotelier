
@extends('layouts.app')

@section('content')
<div id="question">
	<div class="title">
        <p>
        	@if($questions[0]->type_id === 1)
        	恋愛、給与、転職就職など、<br>ホテルに関する悩みなんでも
        	@elseif($questions[0]->type_id === 2)
        	オペレーションに関して<br>他のホテルマンの意見を聞きたい
        	@endif
        </p>
    </div>
    <div class="content row">
    	  @foreach($questions as $i =>$question)
           <div class="col-sm-8 question-list">
	         <a href="{{route('question.show',[$question->type_id,$question->id])}}">  
	             <div class="title">
	             	{{$question->title}}
	             </div>
	             <div class="content">{{Str::limit($question->content,200,'......')}}
	             </div>
	             <div class="icon-area">
	             <img src="{{asset('image/comment.png')}}"class="icon"  alt="">{{$comments[$i]}}			             	
	             </div>

	         </a>
	         
              <div class="post-desc">
	             	<div class="tag col-sm-3">
	             	{{$category_names[$i]->name}}
	             	</div>
	             
	             	@if($questions[0]->type_id === 1)	
	              <div class="tag col-sm-3">
	             	  {{$users[$i]->sex}}
	             	</div>
	             	@elseif($questions[0]->type_id === 2)
	             	<div class="tag col-sm-3">
	             	  {{$users[$i]->hotel_worker_num}}
	             	</div>
	             	@endif

	             	@if($questions[0]->type_id === 1)	
	              <div class="tag col-sm-3">
	             	  {{$users[$i]->age}}
	             	</div>
	             	@elseif($questions[0]->type_id === 2)
	             	<div class="tag col-sm-3">
	             	  {{$users[$i]->hotel_type}}
	             	</div>
	             	@endif

	             	@if($questions[0]->type_id === 1)
	             	@elseif($questions[0]->type_id === 2)
	             	<div class="tag col-sm-3">
	             	  {{$users[$i]->hotel_adr}}	             		
	             	</div>
	             	@endif

	             	
              </div>
              <div class="post-desc">
              	<div class="post-profile">
              		{{$users[$i]->area}}/{{$users[$i]->hotel_type}}/{{$users[$i]->work_title}}/{{$users[$i]->username}} さん
              	</div>            	 
	             	  <div class="post-date">{{$time[$i]}}</div>      	
             	</div>
           </div>
          
        @endforeach

    </div>

    <div class="new-btn">
	    <a href="{{route('question.new')}}">
	        <button class="btn btn-primary">＋</button>
	    </a>
	</div>



</div>

@endsection
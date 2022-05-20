@extends('layouts.app')


@section('content')
<div id="edit new">
	<div class="title">
        <p>編集する</p>
    </div>
		<div class="content row">
			<form method="POST" action="{{route('myquestion.update',$question->id)}}">
				@csrf 
		
				  <br>
				  <div class="col-sm-12">
				    <input type="text" class="form-control" name="title" placeholder="タイトル" value="{{$question->title}}">
				  </div>
				  <br>
				  <div class="col-sm-12">
				    <select class="form-select" name="type_id">
				    	@if($question->type_id === 1)
				    	 <option value="1" selected>悩みを聞いてほしい</option>
				    	 <option value="2">他のホテルの意見を聞きたい</option>
				    	@else
				    	 <option value="1">悩みを聞いてほしい</option>
				    	 <option value="2" selected>他のホテルの意見を聞きたい</option>
				    	@endif
				    </select>
				   
				  </div>
				  <br>
				  <div class="col-sm-12">
				    <select class="form-select js-category-list" name="cat_id">
			    		<option selected value={{$cat_id->id}}>{{$cat_id->name}}</option>

				    </select>
				   
				  </div>
				  <br>
				  <div class="col-sm-12">
				    <textarea class="form-control" name="content" rows="8" placeholder="内容を500文字以内で記入してください">{{$question->content}}</textarea> 
				  </div>
				  <button type="submit" class="form-btn btn">更新</button>
			</form>
		</div>
   </div>



@endsection
@extends('layouts.app')


@section('content')
<div id="new">
	<div class="title">
        <p>新しい相談/悩みを投稿する</p>
    </div>
		<div class="content row">
			<form method="POST" action="{{route('post.question')}}">
				@csrf 
				    <input type="hidden" class="form-control" id="exampleInputEmail1" name="user_id" value="{{ $auth->id}}">		
				  <br>
				  <div class="col-sm-12">
				    <input type="text" class="form-control" name="title" placeholder="タイトル">
				  </div>
				  <br>
				  <div class="col-sm-12">
				    <select class="form-select" name="type">
				    	<option hidden>種類を選択してください</option>
				    	<option value="1">悩みを聞いてほしい</option>
				    	<option value="2">他のホテルの意見を聞きたい</option>
				    </select>
				   
				  </div>
				  <br>
				  <div class="col-sm-12">
				    <select class="form-select js-category-list" name="cat">
			    		<option hidden>カテゴリーを選択してください</option>
				    </select>
				   
				  </div>
				  <br>
				  <div class="col-sm-12">
				    <textarea class="form-control" name="content" rows="8" placeholder="内容を500文字以内で記入してください"></textarea> 
				  </div>
				  <button type="submit" class="form-btn btn">投稿</button>
			</form>
		</div>
   </div>



@endsection
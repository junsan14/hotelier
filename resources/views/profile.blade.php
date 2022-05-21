@extends('layouts.app')
@section('content')
<div id="profile">
	@if(session('profilesetup'))
	<div class="alert-message js-alert-message">
		全てのサービスを利用するには詳細情報の入力が必要です。
	</div>
	@endif
	<div class="title">
        <p>プロフィールを更新する</p>
    </div>
		<div class="content row">
			<form method="POST" action="{{route('post.profile')}}">
				@csrf 
				    <input type="hidden" class="form-control" id="exampleInputEmail1" name="user_id" value="{{ $auth->id}}">		
				  <br>
				  <div class="col-sm-12">
				  	<label for="username">ユーザーネーム</label>
				    <input type="text" class="form-control" name="username" value="{{$auth->username}}">
				  </div>
				  @error('username')   
                    <div class="col-sm-12 error-msg">   
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                  <br>
				  <div class="col-sm-12">			  	
				    <input type="hidden" class="form-control" name="email" value="{{$auth->email}}">
				  </div>
				  <br>
				  <div class="col-sm-12">
				  	<label for="password">パスワード</label>
				    <input type="password" class="form-control" name="password" placeholder="変更の場合のみ記入">
				  </div>
				  @error('password')   
                    <div class="col-sm-12 error-msg">   
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror
				  <br>
				 
				  <div class="title">
			        <h3>詳細情報</h3>
			      </div>
			      <div class="col-sm-12">
				  	<label for="status">現在</label>
				  		<select required name="status" class="form-control js-select">
				  			@isset($auth->status)
				    			<option hidden value="{{$auth->status}}">{{$auth->status}}</option>
				    		@else
				    			<option hidden value="在職">在職</option>
				    		@endisset

				    		<option value="在職">在職</option>
				    		<option value="無職">無職</option>
				    		<option value="学生">学生</option>    		
				    	</select>

				  </div>
				  <br>
			      <div class="worker-details js-worker-details">			      	
					  <div class="col-sm-12">
					  	<label for="sex">性別</label>
					    	<select required name="sex" class="form-control">
					    		<option hidden value="{{$auth->sex}}">{{$auth->sex}}</option>
					    		<option value="男性">男性</option>
					    		<option value="女性">女性</option>
					    		<option value="未回答">未回答</option>    		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="age">年齢</label>
					    	<select required name="age" class="form-control">
					    		<option hidden value="{{$auth->age}}">{{$auth->age}}</option>
					    		<option value="10代">10代</option>
					    		<option value="20代">20代</option>
					    		<option value="30代">30代</option>  
					    		<option value="40代">40代</option>    
					    		<option value="50代">50代</option>   
					    		<option value="60代以上">60代以上</option>     		
					    	</select>
					  </div>
					  <br>

					  <div class="col-sm-12">
					  	<label for="position">ポジション</label>
					    	<select required name="position" class="form-control">
					    		<option hidden value="{{$auth->position}}">{{$auth->position}}</option>
					    		<option value="フロント">フロント</option>
					    		<option value="料飲サービス">料飲サービス</option>
					    		<option value="清掃">清掃</option>    
					    		<option value="アクティビティ">アクティビティ</option>   
					    		<option value="バックオフィス">バックオフィス</option>    
		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="work_title">役職</label>
					    	<select required name="work_title" class="form-control">
					    		<option hidden value="{{$auth->worl_title}}">{{$auth->work_title}}</option>
					    		<option value="プレイヤー">プレイヤー</option>
					    		<option value="マネージャー">マネージャー</option>
					    		<option value="マネジメント">マネジメント</option>    
					    		<option value="支配人">支配人</option>   
			
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="work_length">勤続年数</label>
					    	<select required name="work_length" class="form-control">
					    		<option hidden value="{{$auth->work_length}}">{{$auth->work_length}}</option>
					    		<option value="勤続1年">1年</option>
					    		<option value="勤続2年">2年</option>
					    		<option value="勤続3年">3年</option>    
					    		<option value="勤続4年">4年</option> 
					    		<option value="勤続5年以上">5年以上</option>  		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="area">エリア</label>
					    	<select required name="area" class="form-control">
					    		<option hidden value="{{$auth->area}}">{{$auth->area}}</option>
					    		<option value="都市">都市</option>
					    		<option value="地方">地方</option>
					    			
					    	</select>
					  </div>
					  <br>

					  <div class="col-sm-12">
					  	<label for="hotel_type">ホテルタイプ</label>
					    	<select required name="hotel_type" class="form-control">
					    		<option hidden value="{{$auth->hotel_type}}">{{$auth->hotel_type}}</option>
					    		<option value="リゾートホテル">リゾートホテル</option>
					    		<option value="ビジネスホテル">ビジネスホテル</option>
					    		<option value="会員制ホテル">会員制ホテル</option>    
					    		<option value="旅館">旅館</option> 
					    		<option value="その他のホテル">その他</option> 		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="hotel_worker_num">従業員数</label>
					    	<select required name="hotel_worker_num" class="form-control">
					    		<option hidden value="{{$auth->hotel_worker_num}}">{{$auth->hotel_worker_num}}</option>
					    		<option value="10名規模">10名規模</option>
					    		<option value="30名規模">30名規模</option>
					    		<option value="50名規模">50名規模</option>    
					    		<option value="100名規模">100名規模</option> 
					    		<option value="100名以上">100名以上</option>  		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="hotel_adr">ADR（客室平均単価）</label>
					    	<select required name="hotel_adr" class="form-control">
					    		<option hidden value="{{$auth->hotel_adr}}">{{$auth->hotel_adr}}</option>
					    		<option value="ADR¥10,000">¥10,000</option>
					    		<option value="ADR¥30,000">¥30,000</option>
					    		<option value="ADR¥60,000">¥60,000</option>    
					    		<option value="ADR¥100,000">¥100,000</option> 
					    		<option value="ADR¥100,000以上">¥100,000以上</option>  		
					    	</select>
					  </div>
					  <br>
					</div>
					<div class="student-details js-student-details">			      	
					  <div class="col-sm-12">
					  	<label for="sex">性別</label>
					    	<select required name="sex" class="form-control">
					    		<option hidden value="{{$auth->sex}}">{{$auth->sex}}</option>
					    		<option value="男性">男性</option>
					    		<option value="女性">女性</option>
					    		<option value="未回答">未回答</option>    		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="age">年齢</label>
					    	<select required name="age" class="form-control">
					    		<option hidden value="{{$auth->age}}">{{$auth->age}}</option>
					    		<option value="10代">10代</option>
					    		<option value="20代">20代</option>
					    		<option value="30代">30代</option>  
					    		<option value="40代">40代</option>    
					    		<option value="50代">50代</option>   
					    		<option value="60代以上">60代以上</option>     		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="work_length">グレード</label>
					    	<select required name="work_length" class="form-control">
					    		<option hidden value="{{$auth->work_length}}">{{$auth->work_length}}</option>
					    		<option value="1年生">1年生</option>
					    		<option value="2年生">2年生</option>
					    		<option value="3年生">3年生</option>    
					    		<option value="4年生">4年生</option> 
					    		<option value="5年以上">5年以上</option>  		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="position">希望ポジション</label>
					    	<select required name="position" class="form-control">
					    		<option hidden value="{{$auth->position}}">{{$auth->position}}</option>
					    		<option value="フロント希望">フロント</option>
					    		<option value="料飲サービス希望">料飲サービス</option>
					    		<option value="清掃希望">清掃</option>    
					    		<option value="アクティビティ希望">アクティビティ</option>   
					    		<option value="バックオフィス希望">バックオフィス</option> 
					    		<option value="希望未定">未定</option>    
		
					    	</select>
					  </div>
					  <br>
						<div class="col-sm-12">
					  	<label for="hotel_type">希望ホテルタイプ</label>
					    	<select required name="hotel_type" class="form-control">
					    		<option hidden value="{{$auth->hotel_type}}">{{$auth->hotel_type}}</option>
					    		<option value="リゾートホテル希望">リゾートホテル</option>
					    		<option value="ビジネスホテル希望">ビジネスホテル</option>
					    		<option value="会員制ホテル希望">会員制ホテル</option>    
					    		<option value="旅館希望">旅館</option> 
					    		<option value="その他のホテル希望">その他</option> 		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="area">エリア</label>
					    	<select required name="area" class="form-control">
					    		<option hidden value="{{$auth->area}}">{{$auth->area}}</option>
					    		<option value="都市">都市</option>
					    		<option value="地方">地方</option>
					    			
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="hotel_worker_num">希望規模</label>
					    	<select required name="hotel_worker_num" class="form-control">
					    		<option hidden value="{{$auth->hotel_worker_num}}">{{$auth->hotel_worker_num}}</option>
					    		<option value="小規模">小規模（10名くらい）</option>
					    		<option value="中規模">中規模（100名くらい）</option>
					    		<option value="大規模">大規模（300名以上）</option>    
		
					    	</select>
					  </div>
					  <br>
					  <div class="col-sm-12">
					  	<label for="hotel_adr">価格帯希望</label>
					    	<select required name="hotel_adr" class="form-control">
					    		<option hidden value="{{$auth->hotel_adr}}">{{$auth->hotel_adr}}</option>
					    		<option value="リーズナブル">リーズナブル</option>
					    		<option value="そこそこ">そこそこ</option>
					    		<option value="高級">高級</option>    
					    		<option value="超高級">超高級</option> 
					    				
					    	</select>
					  </div>
					  <br>
					</div>

				  	<button type="submit" class="form-btn btn">更新</button>

				  
			</form>
		</div>
   </div>

@endsection
@extends('layouts.app')

@section('content')
@if(session('registerError'))
<div class="flash-message js-flash-message">
    Twitterアカウントにメールアドレスが登録されていませんので
    登録できません。<br>
    お手数ですが以下のフォームから登録お願いします
</div>
@endif
<div id="register">

    <div class="title">
        <p>ユーザー登録</p>
    </div>
    <div class="content row">
      <div class="col-sm-8">
            <form method="POST" action="{{route('register')}}">
                @csrf 
                <label for="username">ユーザーネーム</label>
                <input type="text" class="form-control" name="username" value="{{old('username')}}" required>
                <br>

                <label for="email">Eメール</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                     @error('email')   
                      <div class="col-sm-12 error-msg">   
                        <strong>{{ $message }}</strong>
                      </div>
                     @enderror
                <br>
                <label for="password">パスワード</label>
                <input type="password" class="form-control" name="password" required>      
                      @error('password')
                       <div class="col-sm-12 error-msg">   
                         <strong>{{ $message }}</strong>
                       </div>
                      @enderror
                <br>         
                <label for="password-confirm">パスワード確認</label>
                <input type="password" class="form-control" name="password_confirmation" required>
                <br>

                  
                  <button type="submit" class="form-btn btn">登録</button>
            </form>
        </div>
          <a href="{{route('twitter.login')}}" style="text-align: center;"><i class="fab fa-twitter"></i> 
            Register with Twitter
          </a>

   </div>



</div>
@endsection

@extends('layouts.app')

@section('content')
@if(session('passwordReset'))
<div class="flash-message js-flash-message">
    新しいパスワードへ変更完了しました
</div>
@endif
<div id="login">
    <div class="title">
        <p>ログイン</p>
    </div>
    <div class="content row">
        <div class="col-sm-8" >
            <form method="POST" action="{{route('login')}}">
                @csrf 
                   
                  <div class="col-sm-12">
                    <label for="email">Eメール</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                  </div>
                  <br>


                  <div class="col-sm-12">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}" required>
                  </div>          
                  @error('email')   
                    <div class="col-sm-12 error-msg">   
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror

                              
                  <button type="submit" class="form-button btn">ログイン</button>
            </form>
        </div>

            <a href="{{route('twitter.login')}}" style="text-align:center;"><i class="fab fa-twitter"></i> 
              Login with Twitter
            </a> 

        <div class="col-sm-5" >
            <a href="{{ route('password.request') }}">
                        @csrf
                <button style="float: right; margin-top: 50px;" type="submit" class="form-button btn">パスワード忘れた方はこちら</button>
            </a>
        </div>

    </div>

</div>



</div>
@endsection

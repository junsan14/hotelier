@extends('layouts.app')

@section('content')
<div id="login">
    <div class="title">
        <p>パスワードリセットフォーム</p>
    </div>
    <div class="content row">
        <div class="col-sm-8" >
            <form method="POST" action="{{route('password.update',$token)}}">
                @csrf 
                <input type="hidden" name="token" value="{{ $token }}">
                <label for="email">Eメール</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                <br>
                @error('email')   
                      <div class="col-sm-12 error-msg">   
                        <strong>{{ $message }}</strong>
                      </div>
                @enderror
                <label for="email">パスワード</label>
                <input type="password" class="form-control" name="password"required>
                @error('password')   
                      <div class="col-sm-12 error-msg">   
                        <strong>{{ $message }}</strong>
                      </div>
                @enderror
                <br>
                <label for="email">パスワード確認</label>
                <input type="password" class="form-control" name="password_confirmation" required>

                <input type="hidden" class="form-control" name="token" value="{{$token}}">


                <button type="submit" class="form-btn btn">パスワードをリセットする</button>
                        
                    
                  
            </form>
        </div>
            
    </div>
</div>



</div>
@endsection
            


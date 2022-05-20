@extends('layouts.app')

@section('content')
<div id="login">
    @if(session('status'))
    <div class="flash-message js-flash-message">
        メール送信が完了しました<br>
        メールのリンクからパワスワードリセットを行って下さい
    </div>
    @endif
    <div class="title">
        <p>パスワードリセット</p>
    </div>
    <div class="content row">
        <div class="col-sm-8" >
            <form method="POST" action="{{route('password.request.send')}}">
                @csrf          
                <label for="email">Eメール</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                @error('email')   
                      <div class="col-sm-12 error-msg">   
                        <strong>{{ $message }}</strong>
                      </div>
                @enderror
                <button type="submit" class="form-btn btn">リセットメール送信</button>
                                          
            </form>
        </div>
            
    </div>
</div>



</div>
@endsection

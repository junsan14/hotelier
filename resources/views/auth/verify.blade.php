@extends('layouts.app')

@section('content')
<div id="verification">
    @if (session('resent'))
    <div class="flash_message text-center py-3 my-0">
       ご登録いただいたメールアドレスに確認用のリンクをお送りしました。
    </div>
    @endif
    <div class="title">
        メールアドレスをご確認下さい
    </div>
    @if (session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
        @endif 
     <div class="content row">
        <div class="col-sm-7">

            メールをご確認下さい。<br>
            もし確認用メールが送信されていない場合は、下記リンクをクリックして下さい。
        </div>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button style="float: right;" type="submit" class="form-btn btn">{{ __('確認用メールを再送信する') }}</button>
        </form>
     </div>             
                    

</div>
@endsection

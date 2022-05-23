@extends('layouts.app')

@section('content')

<div id="home">
    @if(session('profileUpdate'))
    <div class="flash-message js-flash-message">
        プロフィールアップデートしました
    </div>
    @endif
    @if(session('questionAdd'))
    <div class="flash-message js-flash-message">
        投稿完了しました
    </div>
    @endif
    <div class="title">
        <p>人気の悩み/相談</p>
    </div>

    <div class="content row">
        <div class="col-sm-5 list">
            <div class="list-title">注目悩み</div>
            <ul>
                @foreach($pop_questions[0] as $i =>$pop_question)
                @if($pop_questions[1][$i] === 1 && $i<7)
                <a href="{{route('question.show',[$pop_questions[1][$i],$pop_questions[0][$i]])}}">
                    <li>
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        {{$pop_questions[2][$i]}}-
                        <img src="{{asset('image/comment02.png')}}"class="icon"  alt="">
                        {{$pop_questions[3][$i]}} 
                    </li>
                </a>
                @endif
                @endforeach
            </ul>

        </div>
        <div class="col-sm-5 list">
            <div class="list-title">注目相談</div>
            <ul>
                @foreach($pop_questions[0] as $i =>$pop_question)
                @if($pop_questions[1][$i] === 2 && $i<7) 
                <a href="{{route('question.show',[$pop_questions[1][$i],$pop_questions[0][$i]])}}">
                    <li>
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        {{$pop_questions[2][$i]}}-
                        <img src="{{asset('image/comment02.png')}}"class="icon"  alt="">
                        {{$pop_questions[3][$i]}}
                    </li>
                </a>
                @endif
                @endforeach
            </ul>


        </div>

    </div>

    

</div>

<div class="new-btn">
    <a href="{{route('question.new')}}">
        <button class="btn btn-primary">＋</button>
    </a>
</div>

@endsection

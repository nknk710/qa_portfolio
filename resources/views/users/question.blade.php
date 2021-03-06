@extends('layouts.app')

@section('title')
質問一覧
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/users_question.css') }}" type="text/css" />
@endsection


@section('content')

    <div class="container">

      <div class="title">
        <h1>質 問 一 覧</h1>
      </div>
  
      <div class="question-list">
          
        @foreach($questions as $question)
        
            <div class="search-question">
              <div class="type">
                    @if ( $question->best_answer == null )
                      <span class="unsolved">回答受付中</span>
                    @else
                      <span class="solution">解決済み</span>
                    @endif
                <span class="question-category">{{ $question->category }}</span>
              </div>
              <div class="question-title">
                  <a href="{{ action('QuestionController@show', ['id' => $question->id]) }}">{{ $question->title }}</a>
              </div>        
            </div>         
        @endforeach
        
      
      </div>
      
      @if(count($questions)<=0)
        <p class="null">投稿された質問がありません</p>
      @endif
      <div class="paginate">
        {{ $questions->appends(['id' => $user_id])->links() }}
      </div>
      
    </div>

      
@endsection

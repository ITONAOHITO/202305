@extends('layouts.tweet')

@section('title', 'つぶやき機能')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ホーム</h2>
                <div class="form">
                    <form action="{{ url('tweet/post') }}" method="post" >
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="text" name="body" id="body" placeholder="今どうしてる？">
                        <input type="submit" value="つぶやく" class="button">
                    </form>
                </div>
                @if (count($errors) > 0)
                <ul class="error">
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif 
            </div>
        </div>
            @foreach($posts as $tweets)
                <div class="col-md-8 mx-auto tweet_view">    
                    <span class="c1">{{ $tweets->user->name }}</span>
                    <span class="c2">{{ $tweets->created_at }}</span><br>
                    <span class="c3">{{ $tweets->body }}</span>
                    @if (Auth::user()->id === $tweets->user_id)
                    <span><a class="delete" href="{{ url('tweet/post/delete?id='.$tweets->id) }}">削除</a></span>
                    @endif
                </div>
            @endforeach
    </div>
@endsection
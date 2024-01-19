@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Articles Dashboard</h1>
        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-header">{{ $article->title }}</div>
                <div class="card-body">
                    <p>{{ $article->content }}</p>
                    <p>Category: {{ $article->category }}</p>
                    <p>Status: {{ $article->status }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $article->title }}</div>
            <div class="card-body">
                <p>{{ $article->content }}</p>
                <p>Categorie: {{ $article->category }}</p>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Înapoi</a>
            </div>
        </div>
    </div>
@endsection

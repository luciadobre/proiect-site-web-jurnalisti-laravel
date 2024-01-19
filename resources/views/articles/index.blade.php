@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista Articole</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Adaugă Articol Nou</a>
        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-header">{{ $article->title }}</div>
                <div class="card-body">
                    <p>{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-success">Vizualizare</a>
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Modificare</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Șterge</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

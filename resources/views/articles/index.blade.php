@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista Articole</h1>

        @if(Auth::user()->role == 'jurnalist')
            <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Adaugă Articol Nou</a>
        @endif

        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-header">{{ $article->title }}</div>
                <div class="card-body">
                    <p>Status: <strong>{{ $article->status }}</strong></p>
                    <p>{{ Str::limit($article->content, 100) }}</p>
                    <p>Categorie: <strong> {{ $article->category }} </strong> </p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-success">Vizualizare</a>

                    @if(Auth::user()->role == 'jurnalist')
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Modificare</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Șterge</button>
                        </form>
                    @endif

                    @if(Auth::user()->role == 'editor')
                        <form action="{{ route('articles.approve', $article->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success">Aprobă</button>
                        </form>
                        <form action="{{ route('articles.reject', $article->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Respinge</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $article->title }}</div>
            <div class="card-body">
                @if(Auth::check() && in_array(Auth::user()->role, ['editor', 'jurnalist']))
                    <p>Status: <strong>{{ $article->status }}</strong></p>
                @endif
                <p>{{ $article->content }}</p>
                <p>Categorie: <strong> {{ $article->category }}</strong></p>

                @if(Auth::user() && Auth::user()->role == 'editor')
                    <form action="{{ route('articles.approve', $article->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-success">Aprobă</button>
                    </form>
                    <form action="{{ route('articles.reject', $article->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Respinge</button>
                    </form>
                @endif

                    <a href="{{ Auth::user() && in_array(Auth::user()->role, ['editor', 'jurnalist']) ? route('dashboard') : url('/') }}" class="btn btn-secondary">Înapoi</a>
            </div>
        </div>
    </div>
@endsection

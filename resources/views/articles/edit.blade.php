@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modificare Articol</h1>
        <form method="POST" action="{{ route('articles.update', $article->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titlu</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Conținut</label>
                <textarea class="form-control" id="content" name="content" rows="3" required>{{ $article->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categorie</label>
                <select class="form-control" id="category" name="category">
                    <option value="artistic" {{ $article->category == 'artistic' ? 'selected' : '' }}>Artistic</option>
                    <option value="tehnic" {{ $article->category == 'tehnic' ? 'selected' : '' }}>Tehnic</option>
                    <option value="science" {{ $article->category == 'science' ? 'selected' : '' }}>Science</option>
                    <option value="moda" {{ $article->category == 'moda' ? 'selected' : '' }}>Moda</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvare Modificari</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Înapoi</a>
        </form>
    </div>
@endsection

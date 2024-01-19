@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adaugă Articol Nou</h1>
        <form method="POST" action="{{ route('articles.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titlu</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Conținut</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categorie</label>
                <select class="form-control" id="category" name="category">
                    <option value="artistic">Artistic</option>
                    <option value="tehnic">Tehnic</option>
                    <option value="stiinta">Stiinta</option>
                    <option value="moda">Moda</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adaugă Articol</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Înapoi</a>
        </form>
    </div>
@endsection

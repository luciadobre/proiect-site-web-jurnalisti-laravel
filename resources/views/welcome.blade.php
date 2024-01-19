@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Articole</h1>
        @foreach ($articles as $article)
            @if($article->status != 'respins' && $article->status != 'in asteptare')
                <div class="card mb-3" onclick="handleArticleClick('{{ $article->id }}')">
                    <div class="card-header">{{ $article->title }}</div>
                    <div class="card-body">
                        <p>{{ Str::limit($article->content, 100) }}</p>
                        <p>Categorie: <strong> {{ $article->category }} </strong> </p>
                    </div>
                </div>
            @endif
        @endforeach

    <script>
        function handleArticleClick(articleId) {
            @if(Auth::guest())
                window.location.href = "{{ route('login') }}";
            @else
                window.location.href = "/articles/" + articleId;
            @endif
        }
    </script>
@endsection

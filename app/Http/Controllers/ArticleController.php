<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'editor') {
            $articles = Article::all();
        } else {
            $articles = Article::where('author_id', Auth::id())->get();
        }

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required'
        ]);

        $validated['author_id'] = Auth::id();
        $validated['status'] = 'in asteptare'; // Default status

        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Articol adăugat cu succes!');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required'
        ]);

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Articol actualizat cu succes!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Articol șters cu succes!');
    }

    public function approve($id)
    {
        $article = Article::find($id);
        $article->status = 'aprobat';
        $article->save();

        return back()->with('success', 'Articol aprobat.');
    }

    public function reject($id)
    {
        $article = Article::find($id);
        $article->status = 'respins';
        $article->save();

        return back()->with('success', 'Articol respins.');
    }

}

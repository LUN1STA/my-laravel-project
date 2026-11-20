<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Mail\ArticleCreated;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(6);

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        Gate::authorize('create', Article::class);

        return view('articles.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Article::class);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'shortDesc' => 'nullable|string|max:1000',
            'desc' => 'required|string',
        ]);

        $image = $request->file('image');

        $filename = uniqid() . '.' . $image->getClientOriginalExtension();

        $image->move(
            public_path('images/articles'),
            $filename
        );

        $article = Article::create([
            'date' => now(),
            'name' => $validated['name'],
            'preview_image' => 'images/articles/' . $filename,
            'full_image' => 'images/articles/' . $filename,
            'shortDesc' => $validated['shortDesc'] ?? null,
            'desc' => $validated['desc'],
        ]);

        $moderator = \App\Models\User::whereHas('role', function ($query) {
            $query->where('name', 'moderator');
        })->first();

        if ($moderator) {
            Mail::to($moderator->email)->send(new ArticleCreated($article));
        }

        return redirect()
            ->route('articles.index')
            ->with('success', 'Статья успешно создана.');
    }

    public function show($id)
    {
        $article = Article::with([
            'comments' => function ($query) {
                $query->where('is_moderated', true)
                    ->with('user');
            }
        ])->findOrFail($id);

        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        Gate::authorize('update', $article);

        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        Gate::authorize('update', $article);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'shortDesc' => 'nullable|string|max:1000',
            'desc' => 'required|string',
        ]);

        $data = [
            'name' => $validated['name'],
            'shortDesc' => $validated['shortDesc'] ?? null,
            'desc' => $validated['desc'],
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(
                public_path('images/articles'),
                $filename
            );

            $data['preview_image'] = 'images/articles/' . $filename;
            $data['full_image'] = 'images/articles/' . $filename;
        }

        $article->update($data);

        return redirect()
            ->route('articles.show', $article->id)
            ->with('success', 'Статья успешно обновлена.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        Gate::authorize('delete', $article);

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Статья успешно удалена.');
    }
}

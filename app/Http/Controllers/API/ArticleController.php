<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('date')->paginate(6);

        return response()->json($articles);
    }

    public function show($id)
    {
        $article = Article::with([
            'comments' => function ($query) {
                $query->where('is_moderated', true)
                    ->with('user');
            }
        ])->findOrFail($id);

        return response()->json($article);
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

        return response()->json([
            'message' => 'Статья успешно создана.',
            'article' => $article,
        ], 201);
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

        return response()->json([
            'message' => 'Статья успешно обновлена.',
            'article' => $article->fresh(),
        ]);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        Gate::authorize('delete', $article);

        $article->delete();

        return response()->json([
            'message' => 'Статья успешно удалена.',
        ]);
    }
}

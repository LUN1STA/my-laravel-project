<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        Gate::authorize('create', Comment::class);

        $validated = $request->validate([
            'text' => 'required|string|max:2000',
        ]);

        Comment::create([
            'user_id' => $request->user()->id,
            'article_id' => $article->id,
            'text' => $validated['text'],
        ]);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Комментарий добавлен.');
    }

    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('update', $comment);

        $validated = $request->validate([
            'text' => 'required|string|max:2000',
        ]);

        $comment->update([
            'text' => $validated['text'],
        ]);

        return redirect()
            ->route('articles.show', $comment->article)
            ->with('success', 'Комментарий обновлён.');
    }
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);

        $article = $comment->article;

        $comment->delete();

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Комментарий удалён.');
    }
}

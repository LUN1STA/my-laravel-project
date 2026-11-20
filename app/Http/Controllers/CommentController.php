<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    public function moderation()
    {
        Gate::authorize('viewModeration', Comment::class);

        $comments = Comment::with(['user', 'article'])
            ->where('is_moderated', false)
            ->latest()
            ->get();

        return view('comments.moderation', [
            'comments' => $comments,
        ]);
    }
    public function approve(Comment $comment)
    {
        Gate::authorize('moderate', $comment);

        $comment->update([
            'is_moderated' => true,
        ]);

        Cache::forget('article.' . $comment->article_id);

        return redirect()
            ->route('comments.moderation')
            ->with('success', 'Комментарий принят.');
    }
    public function reject(Comment $comment)
    {
        Gate::authorize('moderate', $comment);

        $articleId = $comment->article_id;

        $comment->delete();

        Cache::forget('article.' . $articleId);

        return redirect()
            ->route('comments.moderation')
            ->with('success', 'Комментарий отклонён.');
    }

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
            'is_moderated' => false,
        ]);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Комментарий отправлен и ожидает модерации.');
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

        Cache::forget('article.' . $comment->article_id);

        return redirect()
            ->route('articles.show', $comment->article)
            ->with('success', 'Комментарий обновлён.');
    }
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);

        $article = $comment->article;

        $comment->delete();

        Cache::forget('article.' . $article->id);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Комментарий удалён.');
    }
}

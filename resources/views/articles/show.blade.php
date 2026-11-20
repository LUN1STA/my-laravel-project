@extends('layouts.app')

@section('title', $article->name)

@section('content')
    <div class="container">

        <div class="page">

            <div class="eyebrow">
                Новости
            </div>

            <h1>
                {{ $article->name }}
            </h1>

            <div class="article-date">
                {{ $article->date->format('d.m.Y') }}
            </div>

            <div class="gallery-image">
                <img src="/{{ $article->full_image }}" alt="{{ $article->name }}">
            </div>

            @if ($article->shortDesc)
                <p>
                    {{ $article->shortDesc }}
                </p>
            @endif

            <p>
                {{ $article->desc }}
            </p>

            <div class="comments-section">
                <h2>Комментарии</h2>

                @forelse ($article->comments as $comment)
                    <div class="comment">
                        <div class="comment-author">
                            {{ $comment->user->name }}
                        </div>

                        <div class="comment-text">
                            {{ $comment->text }}
                        </div>
                        @if (auth()->user()?->role?->name === 'moderator')
                            <form action="{{ route('comments.update', $comment) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <textarea name="text" rows="3" required>{{ $comment->text }}</textarea>

                                <button type="submit" class="btn comment-edit-btn">
                                    Редактировать
                                </button>
                            </form>
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                class="comment-delete-form">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn">
                                    Удалить
                                </button>
                            </form>
                        @endif
                    </div>
                @empty
                    <p>Пока нет комментариев.</p>
                @endforelse

                @auth
                    <form action="{{ route('comments.store', $article) }}" method="POST" class="comment-form">
                        @csrf

                        <label for="comment-text">Оставить комментарий</label>

                        <textarea id="comment-text" name="text" rows="4" placeholder="Напишите комментарий..." required>{{ old('text') }}</textarea>

                        @error('text')
                            <div class="validation-errors">
                                {{ $message }}
                            </div>
                        @enderror

                        <button type="submit" class="btn comment-submit-btn">
                            Добавить комментарий
                        </button>
                    </form>
                @endauth
            </div>

            <a href="{{ route('articles.index') }}" class="button button-secondary">
                ← Вернуться к новостям
            </a>

            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')

                <button type="submit" class="button button-secondary"
                    onclick="return confirm('Вы уверены, что хотите удалить эту статью?')">
                    Удалить статью
                </button>
            </form>

        </div>

    </div>
@endsection

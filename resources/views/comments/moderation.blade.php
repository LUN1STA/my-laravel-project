@extends('layouts.app')

@section('title', 'Модерация комментариев')

@section('content')
    <div class="container">

        <div class="page">

            <div class="eyebrow">
                Модерация
            </div>

            <h1>
                Модерация комментариев
            </h1>

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @forelse ($comments as $comment)
                <div class="comment moderation-comment">

                    <div class="comment-author">
                        {{ $comment->user->name }}
                    </div>

                    <div class="moderation-article">
                        Статья:
                        <strong>{{ $comment->article->name }}</strong>
                    </div>

                    <div class="comment-text">
                        {{ $comment->text }}
                    </div>

                    <div class="moderation-actions">
                        <form action="{{ route('comments.approve', $comment) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn comment-approve-btn">
                                Принять
                            </button>
                        </form>

                        <form action="{{ route('comments.reject', $comment) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn comment-reject-btn">
                                Отклонить
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <p>
                    Нет комментариев, ожидающих модерации.
                </p>
            @endforelse

        </div>

    </div>
@endsection

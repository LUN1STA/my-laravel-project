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

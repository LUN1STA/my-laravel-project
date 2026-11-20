@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <div class="container">

        <div class="page">

            <div class="eyebrow">
                Cook & Stock
            </div>

            <h1>
                Новости
            </h1>

            <p>
                Полезные советы, идеи для кухни и новости Cook & Stock.
            </p>

            <a href="{{ route('articles.create') }}" class="button button-primary">
                + Создать статью
            </a>

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="articles-grid">

                @foreach ($articles as $article)
                    <article class="article-card">

                        <a href="{{ route('articles.show', $article->id) }}">
                            <img src="/{{ $article->preview_image }}" alt="{{ $article->name }}" class="article-image">
                        </a>

                        <div class="article-content">

                            <div class="article-date">
                                {{ $article->date->format('d.m.Y') }}
                            </div>

                            <h3>
                                {{ $article->name }}
                            </h3>

                            @if ($article->shortDesc)
                                <p>
                                    {{ $article->shortDesc }}
                                </p>
                            @endif

                            <div class="article-actions">

                                <a href="{{ route('articles.show', $article->id) }}" class="article-link">
                                    Читать →
                                </a>

                                <a href="{{ route('articles.edit', $article->id) }}" class="article-edit-link">
                                    Редактировать
                                </a>

                            </div>

                        </div>

                    </article>
                @endforeach

                <a href="{{ route('articles.create') }}" class="article-card article-create-card">
                    <span>+</span>
                </a>

            </div>

            <div class="pagination">
                @if ($articles->onFirstPage())
                    <span class="pagination-disabled">←</span>
                @else
                    <a href="{{ $articles->previousPageUrl() }}">←</a>
                @endif

                @for ($page = 1; $page <= $articles->lastPage(); $page++)
                    @if ($page == $articles->currentPage())
                        <span class="pagination-current">{{ $page }}</span>
                    @else
                        <a href="{{ $articles->url($page) }}">{{ $page }}</a>
                    @endif
                @endfor

                @if ($articles->hasMorePages())
                    <a href="{{ $articles->nextPageUrl() }}">→</a>
                @else
                    <span class="pagination-disabled">→</span>
                @endif
            </div>

        </div>

    </div>
@endsection

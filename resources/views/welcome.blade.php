@extends('layouts.app')

@section('title', 'Главная')

@section('content')

<div class="container">

    <div class="page">

        <div class="eyebrow">
            Новости
        </div>

        <h1>
            Статьи
        </h1>

        <p>
            Последние публикации проекта Cook & Stock.
        </p>

        <div class="articles-grid">

            @foreach ($articles as $article)

                <div class="article-card">

                    <a href="{{ route('galery', ['id' => $loop->index]) }}">
                        <img
                            src="/{{ $article['preview_image'] }}"
                            alt="{{ $article['name'] }}"
                            class="article-image"
                        >
                    </a>

                    <div class="article-content">

                        <div class="article-date">
                            {{ $article['date'] }}
                        </div>

                        <h2>
                            {{ $article['name'] }}
                        </h2>

                        @if (isset($article['shortDesc']))
                            <p>
                                {{ $article['shortDesc'] }}
                            </p>
                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection
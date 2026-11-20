@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <div class="container">

        <div class="page">

            {{-- Главный блок --}}
            <section class="hero">

                <div class="hero-content">
                    <div class="eyebrow">Cook & Stock</div>

                    <h1>
                        Готовьте с удовольствием,<br>
                        а продукты держите под контролем.
                    </h1>

                    <p>
                        Cook & Stock помогает хранить рецепты, следить за запасами
                        продуктов и планировать покупки в одном месте.
                    </p>

                    <div class="hero-actions">
                        <a href="{{ route('signin') }}" class="button button-primary">
                            Создать аккаунт
                        </a>

                        <a href="{{ route('about') }}" class="button button-secondary">
                            Узнать больше
                        </a>
                    </div>
                </div>

                <div class="hero-image">
                    <img src="{{ asset('https://i.pinimg.com/originals/14/19/40/14194032eb13cb119df33f3a8c439bb1.jpg?nii=t') }}"
                        alt="Домашняя еда">
                </div>

            </section>


            {{-- Возможности --}}
            <section class="features-section">

                <div class="eyebrow">
                    Возможности
                </div>

                <h2>
                    Всё необходимое для удобной кухни
                </h2>

                <div class="features-grid">

                    <div class="feature-card">
                        <div class="feature-icon">📖</div>

                        <h3>Рецепты</h3>

                        <p>
                            Храните свои любимые рецепты и находите идеи
                            для новых блюд.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🥕</div>

                        <h3>Запасы продуктов</h3>

                        <p>
                            Следите за тем, какие продукты уже есть дома
                            и сколько их осталось.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🛒</div>

                        <h3>Список покупок</h3>

                        <p>
                            Планируйте покупки и не забывайте продукты,
                            которые заканчиваются.
                        </p>
                    </div>

                </div>

            </section>


            {{-- Новости --}}
            <section class="news-section">

                <div class="eyebrow">
                    Новости
                </div>

                <h2>
                    Последние публикации
                </h2>

                <p class="section-description">
                    Полезные советы, идеи для кухни и новости Cook & Stock.
                </p>

                <div class="articles-grid">

                    @foreach ($articles as $article)
                        <article class="article-card">

                            <a href="{{ route('galery', ['id' => $article->id]) }}">
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

                                <a href="{{ route('galery', ['id' => $article->id]) }}" class="article-link">
                                    Читать →
                                </a>

                            </div>

                        </article>
                    @endforeach

                </div>

            </section>

        </div>

    </div>
@endsection

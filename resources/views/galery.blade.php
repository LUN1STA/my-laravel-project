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

            <p>
                {{ $article->date->format('d.m.Y') }}
            </p>

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

            <a href="{{ route('home') }}" class="button button-secondary">
                ← Вернуться на главную
            </a>

        </div>
    </div>
@endsection

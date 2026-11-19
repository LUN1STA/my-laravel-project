@extends('layouts.app')

@section('title', $article['name'])

@section('content')

<div class="container">

    <div class="page">

        <div class="eyebrow">
            Галерея
        </div>

        <h1>
            {{ $article['name'] }}
        </h1>

        <p>
            {{ $article['date'] }}
        </p>

        <div class="gallery-image">
            <img
                src="/{{ $article['full_image'] }}"
                alt="{{ $article['name'] }}"
            >
        </div>

        <p>
            {{ $article['desc'] }}
        </p>

        <a href="{{ route('home') }}" class="button button-secondary">
            ← Вернуться к статьям
        </a>

    </div>

</div>

@endsection
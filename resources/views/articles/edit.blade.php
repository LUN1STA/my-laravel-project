@extends('layouts.app')

@section('title', 'Редактирование статьи')

@section('content')
    <div class="container">

        <div class="page">

            <div class="eyebrow">
                Cook & Stock
            </div>

            <h1>
                Редактирование статьи
            </h1>

            <p>
                Измените информацию о публикации.
            </p>

            @if ($errors->any())
                <div class="validation-errors">
                    <strong>Проверьте введённые данные:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('articles.update', $article->id) }}" method="POST" class="auth-form"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Название</label>

                    <input type="text" id="name" name="name" value="{{ old('name', $article->name) }}"
                        placeholder="Название статьи">
                </div>

                <div class="form-group">
                    <label>Текущее изображение</label>

                    <div class="gallery-image">
                        <img src="/{{ $article->full_image }}" alt="{{ $article->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Новое изображение</label>

                    <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp">
                </div>

                <div class="form-group">
                    <label for="shortDesc">Краткое описание</label>

                    <textarea id="shortDesc" name="shortDesc" rows="3" placeholder="Краткое описание статьи">{{ old('shortDesc', $article->shortDesc) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="desc">Текст статьи</label>

                    <textarea id="desc" name="desc" rows="8" placeholder="Полный текст статьи">{{ old('desc', $article->desc) }}</textarea>
                </div>

                <button type="submit" class="button button-primary">
                    Сохранить изменения
                </button>

            </form>

        </div>

    </div>
@endsection

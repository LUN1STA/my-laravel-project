@extends('layouts.app')

@section('title', 'Новая статья')

@section('content')
    <div class="container">

        <div class="page">

            <div class="eyebrow">
                Cook & Stock
            </div>

            <h1>
                Новая статья
            </h1>

            <p>
                Добавьте новую публикацию в новостную ленту.
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

            <form action="{{ route('articles.store') }}" method="POST" class="auth-form" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="name">Название</label>

                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Название статьи">
                </div>

                <div class="form-group">
                    <label for="image">Изображение</label>

                    <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp">
                </div>

                <div class="form-group">
                    <label for="shortDesc">Краткое описание</label>

                    <textarea id="shortDesc" name="shortDesc" rows="3" placeholder="Краткое описание статьи">{{ old('shortDesc') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="desc">Текст статьи</label>

                    <textarea id="desc" name="desc" rows="8" placeholder="Полный текст статьи">{{ old('desc') }}</textarea>
                </div>

                <button type="submit" class="button button-primary">
                    Создать статью
                </button>

                <a href="{{ route('articles.index') }}" class="button button-secondary">
                    Отмена
                </a>

            </form>

        </div>

    </div>
@endsection

@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')

    <div class="container">

        <div class="page">

            <div class="eyebrow">
                Cook & Stock
            </div>

            <h1>
                Регистрация
            </h1>

            <p>
                Создайте аккаунт, чтобы пользоваться возможностями Cook & Stock.
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

            <form action="{{ route('signin') }}" method="POST" class="auth-form">

                @csrf

                <div class="form-group">
                    <label for="name">
                        Имя
                    </label>

                    <input type="text" id="name" name="name" placeholder="Введите имя">
                </div>

                <div class="form-group">
                    <label for="email">
                        Email
                    </label>

                    <input type="email" id="email" name="email" placeholder="Введите email">
                </div>

                <div class="form-group">
                    <label for="password">
                        Пароль
                    </label>

                    <input type="password" id="password" name="password" placeholder="Введите пароль">
                </div>

                <button type="submit" class="button button-primary">
                    Зарегистрироваться
                </button>

            </form>

        </div>

    </div>

@endsection

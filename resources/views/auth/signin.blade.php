@extends('layouts.app')

@section('title', 'Вход и регистрация')

@section('content')

    <div class="container">

        <div class="page auth-page">

            <div class="eyebrow">
                Cook & Stock
            </div>

            <h1>
                Вход в аккаунт
            </h1>

            <p>
                Войдите в аккаунт или создайте новый, чтобы пользоваться возможностями Cook & Stock.
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

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if (request('auth_required'))
                <div class="error-message">
                    Для выполнения этого действия необходимо войти в аккаунт.
                </div>
            @endif

            <div class="auth-switcher">

                <button type="button" class="auth-tab active" onclick="showAuthForm('login')" id="login-tab">
                    Вход
                </button>

                <button type="button" class="auth-tab" onclick="showAuthForm('register')" id="register-tab">
                    Регистрация
                </button>

            </div>

            <div id="login-form">

                <form action="{{ route('signin.login') }}" method="POST" class="auth-form">

                    @csrf

                    <div class="form-group">
                        <label for="login_email">
                            Email
                        </label>

                        <input type="email" id="login_email" name="email" value="{{ old('email') }}"
                            placeholder="Введите email">
                    </div>

                    <div class="form-group">
                        <label for="login_password">
                            Пароль
                        </label>

                        <input type="password" id="login_password" name="password" placeholder="Введите пароль">
                    </div>

                    <button type="submit" class="button button-primary">
                        Войти
                    </button>

                </form>

            </div>

            <div id="register-form" style="display: none;">

                <form action="{{ route('signin.register') }}" method="POST" class="auth-form">

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

    </div>

    <script>
        function showAuthForm(form) {

            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');

            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');

            if (form === 'login') {

                loginForm.style.display = 'block';
                registerForm.style.display = 'none';

                loginTab.classList.add('active');
                registerTab.classList.remove('active');

            } else {

                loginForm.style.display = 'none';
                registerForm.style.display = 'block';

                loginTab.classList.remove('active');
                registerTab.classList.add('active');

            }
        }
    </script>

@endsection

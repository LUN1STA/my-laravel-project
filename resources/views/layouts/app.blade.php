<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') — Cook & Stock</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;

            background: #f6efe4;
            color: #3d332b;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }

        main {
            flex: 1;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* ----- HEADER ----- */

        header {
            background: #fffaf1;
            border-bottom: 1px solid #ded2c2;
        }

        .header-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px 30px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #3d332b;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        nav a {
            color: #75665a;
            font-size: 15px;
            transition: 0.2s;
        }

        nav a:hover {
            color: #b85c43;
        }

        .nav-auth-form {
            display: inline;
        }

        .nav-auth-button {
            display: inline-block;

            padding: 7px 14px;

            border: 1px solid #b85c43;
            border-radius: 8px;

            background: transparent;
            color: #a65d3f;

            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.2;

            text-decoration: none;
            cursor: pointer;

            transition: 0.2s ease;
        }

        .nav-auth-button:hover {
            background: #a65d3f;
            color: #fffaf1;
        }

        .nav-create-article {
            margin-left: auto;
            padding: 7px 14px;
            border: 1px solid #b85c43;
            border-radius: 8px;
            background: #b85c43;
            color: #fffaf1;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .nav-create-article:hover {
            background: #934832;
            border-color: #934832;
            color: #fffaf1;
        }

        .nav-logout:hover {
            color: #a65d3f;
        }

        /* ----- GENERAL ----- */

        .container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 50px 30px;
        }

        .page {
            width: 100%;
        }

        .eyebrow {
            margin-bottom: 12px;

            color: #b85c43;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        h1,
        h2,
        h3,
        p {
            margin-top: 0;
        }

        h1 {
            margin-bottom: 20px;

            color: #3d332b;
            font-size: 46px;
            line-height: 1.15;
        }

        h2 {
            color: #3d332b;
            font-size: 30px;
        }

        h3 {
            color: #3d332b;
        }

        p {
            color: #75665a;
            line-height: 1.7;
        }

        /* -----HERO  ----- */

        .hero {
            min-height: 430px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;

            padding: 55px;
            margin-bottom: 80px;

            background: #fffaf1;
            border: 1px solid #ded2c2;
            border-radius: 20px;

            overflow: hidden;
        }

        .hero-content {
            max-width: 720px;
        }

        .hero-image {
            width: 42%;
            height: 350px;
            flex-shrink: 0;

            overflow: hidden;
            border-radius: 16px;
        }

        .hero-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;
            display: block;
        }

        .hero p {
            max-width: 650px;
            margin-bottom: 30px;

            font-size: 18px;
        }

        .hero-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* ----- BUTTONS ----- */

        .button {
            display: inline-block;

            padding: 13px 22px;

            border-radius: 8px;

            font-size: 15px;
            font-weight: bold;

            transition: 0.2s;
        }

        .button-primary {
            background: #b85c43;
            color: #fff;
        }

        .button-primary:hover {
            background: #9f4d37;
            transform: translateY(-2px);
        }

        .button-secondary {
            background: transparent;
            color: #b85c43;

            border: 1px solid #c9826c;
        }

        .button-secondary:hover {
            background: #f9e8e2;
        }

        /* ----- FEATURES ----- */

        .features-section {
            margin-bottom: 80px;
        }

        .features-section>h2 {
            margin-bottom: 30px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-top: 30px;
        }

        .feature-card {
            padding: 30px;

            background: #fffaf1;
            border: 1px solid #ded2c2;
            border-radius: 14px;

            transition: 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(70, 50, 30, 0.08);
        }

        .feature-icon {
            margin-bottom: 18px;

            font-size: 34px;
        }

        .feature-card h3 {
            margin-bottom: 10px;
            font-size: 21px;
        }

        .feature-card p {
            margin-bottom: 0;
        }

        /* -----  NEWS ----- */

        .news-section {
            margin-bottom: 50px;
        }

        .news-section>h2 {
            margin-bottom: 10px;
        }

        .section-description {
            margin-bottom: 30px;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-top: 30px;
        }

        .article-card {
            overflow: hidden;

            background: #fffaf1;
            border: 1px solid #ded2c2;
            border-radius: 14px;

            transition: 0.2s;

            display: flex;
            flex-direction: column;
        }

        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(70, 50, 30, 0.08);
        }

        .article-image {
            width: 100%;
            height: 230px;

            object-fit: cover;
            display: block;
        }

        .article-content {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 25px;
            box-sizing: border-box;
        }

        .article-date {
            margin-bottom: 10px;

            color: #b85c43;
            font-size: 14px;
            font-weight: bold;
        }

        .article-card h3 {
            margin-bottom: 12px;
            font-size: 22px;
            line-height: 1.3;
            display: flex;
            flex-direction: column;
        }

        .article-card p {
            margin-bottom: 18px;
        }

        .article-link {
            color: #b85c43;
            font-weight: bold;

            transition: 0.2s;
        }

        .article-link:hover {
            color: #8f4432;
        }

        .article-create-card {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100%;
            text-decoration: none;
            color: #a65d3f;
            background: #f5e8dc;
            transition: 0.2s ease;
        }

        .article-create-card:hover {
            background: #ead4c3;
            transform: translateY(-3px);
        }

        .article-create-card span {
            font-size: 56px;
            font-weight: 300;
            line-height: 1;
        }

        .article-actions {
            margin-top: auto;
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .article-edit-link {
            color: #8b7569;
            text-decoration: none;
            font-size: 14px;
        }

        .article-edit-link:hover {
            color: #a65d3f;
            text-decoration: underline;
        }

        /* ----- GALLERY ----- */

        .gallery-image {
            margin: 30px 0;

            overflow: hidden;

            border-radius: 14px;
        }

        .gallery-image img {
            width: 100%;
            max-height: 600px;

            object-fit: cover;
            display: block;
        }

        /* ----- AUTH ----- */

        .auth-form {
            max-width: 500px;
            margin-top: 35px;

            padding: 30px;

            background: #fffaf1;
            border: 1px solid #ded2c2;
            border-radius: 14px;
        }

        .auth-switcher {
            display: flex;
            gap: 5px;
            margin: 30px 0 25px;
            padding: 5px;
            background: #f5e8dc;
            border-radius: 10px;
        }

        .auth-tab {
            flex: 1;
            padding: 12px 20px;

            border: none;
            border-radius: 7px;

            background: transparent;
            color: #8b7569;

            font-size: 16px;
            font-family: inherit;
            cursor: pointer;

            transition: 0.2s ease;
        }

        .auth-tab:hover {
            color: #a65d3f;
        }

        .auth-tab.active {
            background: #fffaf1;
            color: #a65d3f;
            box-shadow: 0 2px 6px rgba(90, 60, 40, 0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;

            font-weight: bold;
        }

        .form-group input {
            width: 100%;

            padding: 13px 15px;

            border: 1px solid #d8cbbb;
            border-radius: 8px;

            background: #fff;
            color: #3d332b;

            font-family: inherit;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #b85c43;
        }

        .validation-errors {
            margin: 25px 0;
            padding: 15px 20px;

            border: 1px solid #d9a99a;
            border-radius: 8px;

            background: #f9e8e2;
            color: #8d4030;
        }

        .validation-errors strong {
            display: block;
            margin-bottom: 8px;
        }

        .validation-errors ul {
            margin: 0;
            padding-left: 20px;
        }

        .validation-errors li {
            margin: 5px 0;
        }

        /* ----- CONTACTS ----- */

        .contacts {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 35px;
        }

        .contact-card {
            background: #fffaf1;
            border: 1px solid #ded2c2;
            border-radius: 12px;
            padding: 25px;
        }

        .contact-card h3 {
            margin-top: 0;
            font-size: 22px;
        }

        .contact-card p {
            font-size: 16px;
            margin: 8px 0;
        }

        .contact-role {
            color: #b85c43;
            font-weight: bold;
        }

        /* ----- PAGINATION ----- */

        .pagination {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .pagination a,
        .pagination-current,
        .pagination-disabled {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            text-decoration: none;
            box-sizing: border-box;
        }

        .pagination a {
            color: #6b4030;
            background: #f5e8dc;
        }

        .pagination a:hover {
            background: #ead4c3;
        }

        .pagination-current {
            color: white;
            background: #a65d3f;
        }

        .pagination-disabled {
            color: #b9a79b;
            background: #f3eee9;
        }

        /* ----- MESSAGES ----- */

        .success-message {
            margin: 25px 0;
            padding: 14px 18px;
            border-radius: 8px;
            background: #e8f2e5;
            color: #4d6846;
        }

        .error-message {
            margin-bottom: 25px;
            padding: 14px 18px;

            background: #f5e0d9;
            border: 1px solid #d9a08f;
            border-radius: 10px;

            color: #8f4432;
            font-size: 15px;
        }

        /* ----- FOOTER ----- */

        footer {
            margin-top: auto;

            background: #3d332b;
            color: #f6efe4;
        }

        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 25px 30px;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        footer p {
            margin: 0;
            color: #d8cbbb;
            font-size: 14px;
        }

        /* ----- COMMENTS ----- */

        .comments-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #dfd2c2;
        }

        .comments-section~.button,
        .comments-section~form {
            margin-top: 28px;
        }

        .comments-section h2 {
            margin-bottom: 24px;
            color: #4a2f25;
            font-size: 26px;
        }

        .comment {
            margin-bottom: 20px;
            padding: 18px 20px;
            background: #fffaf1;
            border: 1px solid #e4d8c8;
            border-radius: 10px;
        }

        .comment-author {
            margin-bottom: 8px;
            color: #7d4938;
            font-weight: 600;
        }

        .comment-text {
            color: #4a403a;
            line-height: 1.6;
            white-space: pre-wrap;
        }

        /* ----- COMMENT FORM ----- */

        .comment-form {
            margin-top: 30px;
            padding: 22px;
            background: #f7efe4;
            border: 1px solid #e4d8c8;
            border-radius: 10px;
        }

        .comment-form label {
            display: block;
            margin-bottom: 10px;
            color: #4a2f25;
            font-weight: 600;
        }

        .comment-form textarea {
            display: block;
            width: 100%;
            min-height: 110px;
            margin-bottom: 14px;
            padding: 12px 14px;
            box-sizing: border-box;

            border: 1px solid #cdbdad;
            border-radius: 8px;
            background: #fffaf1;
            color: #4a403a;

            font-family: inherit;
            font-size: 15px;
            line-height: 1.5;

            resize: vertical;
        }

        .comment-form textarea:focus {
            outline: none;
            border-color: #b85c43;
            box-shadow: 0 0 0 2px rgba(184, 92, 67, 0.12);
        }

        /* ----- COMMENT MODERATOR FORM ----- */

        .comment>form {
            margin-top: 12px;
        }

        .comment>form textarea {
            display: block;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 8px;
            padding: 10px 12px;

            border: 1px solid #cdbdad;
            border-radius: 8px;
            background: #fffaf1;
            color: #4a403a;

            font-family: inherit;
            font-size: 14px;
            line-height: 1.5;

            resize: vertical;
        }

        .comment>form textarea:focus {
            outline: none;
            border-color: #b85c43;
        }

        .comment>form .btn {
            margin-right: 8px;
            padding: 7px 12px;
            font-size: 13px;
        }

        /* ----- COMMENT DELETE FORM ----- */

        .comment-delete-form {
            display: inline-block;
        }

        .comment-delete-form .btn {
            padding: 7px 12px;
            border: 1px solid #b85c43;
            border-radius: 8px;
            background: transparent;
            color: #b85c43;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .comment-delete-form .btn:hover {
            background: #b85c43;
            color: #fffaf1;
        }

        /* ----- COMMENT BUTTON ----- */

        .comment-submit-btn {
            margin-top: 4px;
            padding: 9px 16px;
            border: 1px solid #b85c43;
            border-radius: 8px;
            background: #b85c43;
            color: #fffaf1;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .comment-submit-btn:hover {
            background: #934832;
            border-color: #934832;
        }

        .comment-edit-btn {
            padding: 7px 12px;
            border: 1px solid #b85c43;
            border-radius: 8px;
            background: transparent;
            color: #b85c43;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .comment-edit-btn:hover {
            background: #b85c43;
            color: #fffaf1;
        }

        /* ----- MODERATION ----- */

        .nav-moderation {
            margin-left: 10px;
            padding: 7px 14px;
            border: 1px solid #b85c43;
            border-radius: 8px;
            background: transparent;
            color: #b85c43;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .nav-moderation:hover {
            background: #b85c43;
            color: #fffaf1;
        }

        .moderation-actions {
            display: flex;
            gap: 10px;
            margin-top: 16px;
        }

        .moderation-actions form {
            margin: 0;
        }

        .comment-approve-btn,
        .comment-reject-btn {
            padding: 8px 14px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .comment-approve-btn {
            border: 1px solid #b85c43;
            background: #b85c43;
            color: #fffaf1;
        }

        .comment-approve-btn:hover {
            background: #934832;
            border-color: #934832;
        }

        .comment-reject-btn {
            border: 1px solid #cdbdad;
            background: transparent;
            color: #7d4938;
        }

        .comment-reject-btn:hover {
            background: #f0e4d6;
            border-color: #b85c43;
            color: #934832;
        }


        /* ----- MOBILE ----- */

        @media (max-width: 800px) {

            .header-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            nav {
                width: 100%;
                flex-wrap: wrap;
                gap: 15px;
            }

            .container {
                padding: 35px 20px;
            }

            .hero {
                min-height: auto;
                padding: 35px 25px;
                margin-bottom: 55px;
                flex-direction: column;
            }

            .hero-image {
                width: 100%;
                height: 250px;
            }

            h1 {
                font-size: 36px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .articles-grid {
                grid-template-columns: 1fr;
            }

            .footer-inner {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    <div id="app"></div>

    <header>
        <div class="header-inner">

            <a href="{{ route('home') }}" class="logo">
                <span class="logo-icon">🍳</span>

                <span class="logo-text">
                    Cook <span>&</span> Stock
                </span>
            </a>

            <nav>
                <a href="{{ route('home') }}">Главная</a>
                <a href="{{ route('articles.index') }}">Новости</a>
                <a href="{{ route('about') }}">О нас</a>
                <a href="{{ route('contacts') }}">Контакты</a>

                @auth
                    @if (auth()->user()->role?->name === 'moderator')
                        <a href="{{ route('articles.create') }}" class="nav-create-article">
                            + Создать новость
                        </a>

                        <a href="{{ route('comments.moderation') }}" class="nav-moderation">
                            Модерация комментариев
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="nav-auth-form">
                        @csrf
                        <button type="submit" class="nav-auth-button">
                            Выйти
                        </button>
                    </form>
                @else
                    <a href="{{ route('signin') }}" class="nav-auth-button">
                        Вход / Регистрация
                    </a>
                @endauth
                @if (auth()->check())
                    <div class="notifications">
                        <button type="button" class="notifications-button" aria-label="Уведомления" title="Уведомления"
                            onclick="document
        .getElementById('notifications-dropdown')
        .classList.toggle('show')">
                            🔔

                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span class="notifications-count">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </button>

                        <div id="notifications-dropdown" class="notifications-dropdown">
                            @forelse (auth()->user()->unreadNotifications as $notification)
                                <a href="{{ route('notifications.read', $notification->id) }}"
                                    class="notification-item">
                                    {{ $notification->data['article_name'] }}
                                </a>
                            @empty
                                <div class="notification-empty">
                                    Нет новых уведомлений
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif
            </nav>

        </div>
    </header>


    <main>
        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>


    <footer>
        <div class="footer-inner">
            <p>🍴 Cook & Stock</p>
            <p>Арефьева Василиса, 257-321</p>
            <p>© 2026</p>
        </div>
    </footer>

</body>

</html>

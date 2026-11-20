<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') — Cook & Stock</title>

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
            padding: 25px;
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
                <a href="{{ route('about') }}">О нас</a>
                <a href="{{ route('contacts') }}">Контакты</a>
                <a href="{{ route('signin') }}">Регистрация</a>
            </nav>

        </div>
    </header>


    <main>
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

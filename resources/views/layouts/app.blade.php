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

        body {
            margin: 0;
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            font-family: Georgia, 'Times New Roman', serif;
            background: #f7f2e8;
            color: #3d332b;
        }

        a {
            color: inherit;
        }

        /* ----- HEADER ----- */

        header {
            background: #fffaf1;
            border-bottom: 1px solid #ded2c2;
            padding: 22px 50px;
        }

        .header-inner {
            max-width: 1200px;
            margin: 0 auto;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            font-size: 30px;
        }

        .logo-text {
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .logo-text span {
            color: #b85c43;
        }

        nav {
            display: flex;
            gap: 32px;
        }

        nav a {
            text-decoration: none;
            font-size: 16px;
            color: #5b4b3f;
            transition: 0.2s;
        }

        nav a:hover {
            color: #b85c43;
        }

        /* ----- MAIN ----- */

        main {
            flex: 1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 70px 30px;
        }

        /* ----- HERO ----- */

        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
            align-items: center;

            min-height: 500px;
        }

        .hero-text {
            max-width: 570px;
        }

        .eyebrow {
            color: #b85c43;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: 58px;
            line-height: 1.05;
            margin: 0 0 25px;
            color: #3d332b;
        }

        .hero h1 span {
            color: #b85c43;
        }

        .hero p {
            font-size: 19px;
            line-height: 1.7;
            color: #6b5c4f;
            margin-bottom: 35px;
        }

        .buttons {
            display: flex;
            gap: 15px;
        }

        .button {
            display: inline-block;
            padding: 14px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: 0.2s;
        }

        .button-primary {
            background: #b85c43;
            color: white;
        }

        .button-primary:hover {
            background: #9e4d38;
        }

        .button-secondary {
            border: 1px solid #b85c43;
            color: #b85c43;
        }

        .button-secondary:hover {
            background: #f0dfd5;
        }

        /* ----- HERO IMAGE ----- */

        .hero-image {
            height: 430px;
            border-radius: 45% 45% 20px 20px;
            overflow: hidden;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* ----- FEATURES ----- */

        .features {
            padding-top: 30px;
            padding-bottom: 80px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-heading h2 {
            font-size: 36px;
            margin: 0 0 10px;
        }

        .section-heading p {
            color: #75665a;
            font-size: 17px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .feature-card {
            background: #fffaf1;
            border: 1px solid #ded2c2;
            border-radius: 14px;
            padding: 30px;
            transition: 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(70, 50, 30, 0.08);
        }

        .feature-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .feature-card h3 {
            margin: 0 0 10px;
            font-size: 23px;
        }

        .feature-card p {
            color: #75665a;
            line-height: 1.6;
            margin: 0;
        }

        /* ----- CONTENT PAGES ----- */

        .page {
            max-width: 850px;
            margin: 0 auto;
        }

        .page h1 {
            font-size: 45px;
            margin-bottom: 25px;
        }

        .page h2 {
            font-size: 28px;
            margin-top: 40px;
        }

        .page p {
            font-size: 18px;
            line-height: 1.8;
            color: #66584c;
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
            background: #3d332b;
            color: #eee4d7;
            padding: 25px 30px;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        /* ----- ADAPTIVE ----- */

        @media (max-width: 800px) {

            header {
                padding: 20px;
            }

            .header-inner {
                flex-direction: column;
                gap: 20px;
            }

            nav {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 43px;
            }

            .hero-image {
                height: 300px;
                font-size: 90px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .contacts {
                grid-template-columns: 1fr;
            }

            .footer-inner {
                flex-direction: column;
                gap: 10px;
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
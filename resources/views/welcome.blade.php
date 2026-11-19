@extends('layouts.app')

@section('title', 'Главная')

@section('content')

<div class="container">

    <section class="hero">

        <div class="hero-text">

            <div class="eyebrow">
                Ваша кухня — в одном месте
            </div>

            <h1>
                Готовьте.
                <span>Храните.</span>
                Планируйте.
            </h1>

            <p>
                Cook & Stock помогает хранить любимые рецепты,
                следить за продуктами дома и планировать покупки,
                чтобы на кухне всегда было всё необходимое.
            </p>

            <div class="buttons">
                <a href="{{ route('about') }}" class="button button-primary">
                    Узнать больше
                </a>

                <a href="{{ route('contacts') }}" class="button button-secondary">
                    Команда проекта
                </a>
            </div>

        </div>


        <div class="hero-image">
            <img src="{{ asset('https://i.pinimg.com/originals/14/19/40/14194032eb13cb119df33f3a8c439bb1.jpg?nii=t') }}" alt="Блюдо Cook & Stock">
        </div>

    </section>


    <section class="features">

        <div class="section-heading">

            <h2>
                Всё для вашей кухни
            </h2>

            <p>
                Основные возможности Cook & Stock
            </p>

        </div>


        <div class="feature-grid">

            <div class="feature-card">

                <div class="feature-icon">
                    📖
                </div>

                <h3>
                    Рецепты
                </h3>

                <p>
                    Храните любимые рецепты и находите
                    идеи для новых блюд.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    🥕
                </div>

                <h3>
                    Запасы
                </h3>

                <p>
                    Следите за продуктами, которые уже
                    есть дома, и их количеством.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    🛒
                </div>

                <h3>
                    Покупки
                </h3>

                <p>
                    Создавайте список покупок и не забывайте
                    о продуктах, которые заканчиваются.
                </p>

            </div>

        </div>

    </section>

</div>

@endsection
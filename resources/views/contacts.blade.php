@extends('layouts.app')

@section('title', 'Контакты')

@section('content')

<div class="container">

    <div class="page">

        <div class="eyebrow">
            Команда
        </div>

        <h1>
            Контакты
        </h1>

        <p>
            Познакомьтесь с командой, которая работает
            над проектом Cook & Stock.
        </p>


        <div class="contacts">

            @foreach ($contacts as $contact)

                <div class="contact-card">

                    <h3>
                        {{ $contact['name'] }}
                    </h3>

                    <p class="contact-role">
                        {{ $contact['role'] }}
                    </p>

                    <p>
                        📞 {{ $contact['phone'] }}
                    </p>

                    <p>
                        ✉️ {{ $contact['email'] }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection
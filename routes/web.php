<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contacts', function () {

    $contacts = [
    [
        'name' => 'Арефьева Василиса',
        'role' => 'Разработчик',
        'phone' => '+7 (900) 123-45-67',
        'email' => 'arefevavasilisa@example.com',
    ],
    [
        'name' => 'Анна Петрова',
        'role' => 'Дизайнер',
        'phone' => '+7 (900) 765-43-21',
        'email' => 'anna@example.com',
    ],
];

    return view('contacts', [
        'contacts' => $contacts
    ]);

})->name('contacts');

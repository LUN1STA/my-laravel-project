<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        $json = file_get_contents(public_path('articles.json'));

        $data = json_decode($json, true);

        $articles = $data['articles'];

        return view('welcome', [
            'articles' => $articles
        ]);
    }

    public function galery($id)
    {
        $json = file_get_contents(public_path('articles.json'));

        $data = json_decode($json, true);

        $article = $data['articles'][$id] ?? null;

        if ($article === null) {
            abort(404);
        }

        return view('galery', [
            'article' => $article
        ]);
    }
}

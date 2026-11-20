<?php

namespace App\Http\Controllers;

use App\Models\Article;

class MainController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('welcome', [
            'articles' => $articles
        ]);
    }

    public function galery($id)
    {
        $article = Article::find($id);

        if ($article === null) {
            abort(404);
        }

        return view('galery', [
            'article' => $article
        ]);
    }
}

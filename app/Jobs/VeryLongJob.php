<?php

namespace App\Jobs;

use App\Mail\ArticleCreated;
use App\Models\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class VeryLongJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Article $article
    ) {
        //
    }

    public function handle(): void
    {
        $moderator = \App\Models\User::whereHas('role', function ($query) {
            $query->where('name', 'moderator');
        })->first();

        if ($moderator) {
            Mail::to($moderator->email)
                ->send(new ArticleCreated($this->article));
        }
    }
}

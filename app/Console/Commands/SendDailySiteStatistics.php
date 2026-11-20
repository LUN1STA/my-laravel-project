<?php

namespace App\Console\Commands;

use App\Models\ArticleView;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailySiteStatistics extends Command
{
    protected $signature = 'stats:daily';

    protected $description = 'Отправляет модераторам статистику использования сайта за день';

    public function handle(): int
    {
        $today = now()->startOfDay();

        $views = ArticleView::where('created_at', '>=', $today)
            ->count();

        $comments = Comment::where('created_at', '>=', $today)
            ->count();

        $moderators = User::whereHas('role', function ($query) {
            $query->where('name', 'moderator');
        })->get();

        foreach ($moderators as $moderator) {
            Mail::raw(
                "Статистика использования сайта за " . now()->format('d.m.Y') . "\n\n" .
                    "Количество просмотров новостей: {$views}\n" .
                    "Количество новых комментариев: {$comments}",
                function ($message) use ($moderator) {
                    $message
                        ->to($moderator->email)
                        ->subject('Статистика сайта за день');
                }
            );
        }

        $this->info("Статистика отправлена модераторам.");
        $this->info("Просмотров: {$views}");
        $this->info("Новых комментариев: {$comments}");

        return self::SUCCESS;
    }
}

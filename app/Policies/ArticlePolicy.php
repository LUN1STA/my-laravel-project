<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role?->name, ['moderator', 'reader']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Article $article): bool
    {
        return in_array($user->role?->name, ['moderator', 'reader']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->role?->name === 'moderator'
            ? Response::allow()
            : Response::denyWithStatus(403, 'Только модератор может создавать новости.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article): Response
    {
        return $user->role?->name === 'moderator'
            ? Response::allow()
            : Response::denyWithStatus(
                403,
                'Только модератор может редактировать новости.'
            );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): Response
    {
        return $user->role?->name === 'moderator'
            ? Response::allow()
            : Response::denyWithStatus(
                403,
                'Только модератор может удалять новости.'
            );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): bool
    {
        return false;
    }
}

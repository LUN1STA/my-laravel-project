<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
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
    public function view(User $user, Comment $comment): bool
    {
        return in_array($user->role?->name, ['moderator', 'reader']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return in_array($user->role?->name, ['moderator', 'reader'])
            ? Response::allow()
            : Response::denyWithStatus(403, 'Только авторизованные пользователи могут оставлять комментарии.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comment $comment): Response
    {
        return $user->role?->name === 'moderator'
            ? Response::allow()
            : Response::denyWithStatus(403, 'Только модератор может редактировать комментарии.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): Response
    {
        return $user->role?->name === 'moderator'
            ? Response::allow()
            : Response::denyWithStatus(403, 'Только модератор может удалять комментарии.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Comment $comment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Comment $comment): bool
    {
        return false;
    }
}

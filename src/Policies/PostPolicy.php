<?php

namespace Versatile\Posts\Policies;

use Versatile\Core\Contracts\UserInterface;
use Versatile\Core\Policies\BasePolicy;

class PostPolicy extends BasePolicy
{
    /**
     * Determine if the given model can be viewed by the user.
     *
     * @param \Versatile\Core\Contracts\UserInterface $user
     * @param  $model
     *
     * @return bool
     */
    public function read(UserInterface $user, $model)
    {
        // Does this post belong to the current user?
        $current = $user->id === $model->author_id;

        return $current || $this->checkPermission($user, $model, 'read');
    }

    /**
     * Determine if the given model can be edited by the user.
     *
     * @param \Versatile\Core\Contracts\UserInterface $user
     * @param  $model
     *
     * @return bool
     */
    public function edit(UserInterface $user, $model)
    {
        // Does this post belong to the current user?
        $current = $user->id === $model->author_id;

        return $current || $this->checkPermission($user, $model, 'edit');
    }

    /**
     * Determine if the given model can be deleted by the user.
     *
     * @param \Versatile\Core\Contracts\UserInterface $user
     * @param  $model
     *
     * @return bool
     */
    public function delete(UserInterface $user, $model)
    {
        // Does this post belong to the current user?
        $current = $user->id === $model->author_id;

        return $current || $this->checkPermission($user, $model, 'delete');
    }
}

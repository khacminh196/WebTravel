<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Enums\Constant;
use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements IUserRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }
}
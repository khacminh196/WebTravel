<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Constant enum.
 */
class Constant
{
    const DEFAULT_PAGINATION_BLOG = 6;
    const DEFAULT_PAGINATION_TOUR = 9;
    const RECENT_BLOG_PAGINATION = 3;
    const ROLE_USER = [
        'MEMBER' => 0,
        'ADMIN' => 1
    ];
}

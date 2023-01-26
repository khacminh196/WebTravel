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
    const DISPLAY = [
        'HIDDEN' => 0,
        'SHOW' => 1,
    ];
    const IS_NOT_DELETED = 0;
    const IS_DELETED = 1;
    const TYPE_BOOKING_TOUR = [
        'EXISTS' => 1,
        'CUSTOM' => 2,
    ];
}

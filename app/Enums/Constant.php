<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Constant enum.
 */
class Constant
{
    const DEFAULT_PAGINATION_ADMIN = 10;
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
    const TYPE_BOOKING_TOUR_TEXT = [
        1 => 'Tour exists',
        2 => 'Tour custom',
    ];
    const TOUR_STATUS = [
        0 => 'Unapproved',
        1 => 'Approved',
        2 => 'Processing',
        3 => 'Complete',
        4 => 'Cancel'
    ];
    const FILE_TYPE = [
        'VIDEO' => 1,
        'IMAGE' => 2
    ];
    const LANGUAGE = [
        'en' => 1,
        'es' => 2
    ];
    const SEND_MAIL_TYPE = [
        'RESET_PASSWORD' => 1,
        'BOOKING_TOUR' => 2,
    ];

    const BOOKING_TOUR_CONFIRM = [
        'UNCONFIRMED' => 0,
        'CONFIRMED' => 1
    ];
    const USER_TYPE_CONFIRM = [
        'USER' => 0,
        'ADMIN' => 1
    ];
}

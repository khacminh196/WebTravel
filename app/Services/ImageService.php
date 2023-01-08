<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function __construct()
    {
    }

    public function upload($file)
    {
        $link = Storage::disk('public')->put('images', $file);

        return Storage::url($link);
    }
}
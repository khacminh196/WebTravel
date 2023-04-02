<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function __construct()
    {
    }

    public function upload($file, $path = 'images')
    {
        $link = Storage::disk('public')->put($path, $file);

        return Storage::url($link);
    }
}
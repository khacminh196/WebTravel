<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends ApiController
{
    public function __construct()
    {
        # code...
    }

    public function upload(Request $request)
    {
        $file = $request->file('upload-image');
        $link = Storage::disk('public')->put('images', $file);
        $response = [
            'url' => Storage::url($link)
        ];
        return $this->sendSuccess($response);
    }
}

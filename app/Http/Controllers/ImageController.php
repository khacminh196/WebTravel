<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function upload(Request $request)
    {
        $link = $this->imageService->upload($request->file('upload'));
        $response = [
            'url' => $link
        ];
        return $this->sendSuccess($response);
    }
}

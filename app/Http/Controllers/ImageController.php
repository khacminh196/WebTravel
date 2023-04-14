<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\S3Service;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $s3Service;

    public function __construct(S3Service $s3Service)
    {
        $this->s3Service = $s3Service;
    }

    public function upload(Request $request)
    {
        $link = $this->s3Service->uploadFileToS3($request->file('upload'), 'blogs-contents/');
        $response = [
            'url' => $link
        ];
        return $this->sendSuccess($response);
    }
}

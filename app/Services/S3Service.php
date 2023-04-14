<?php

declare(strict_types=1);

namespace App\Services;

use Aws\S3\Exception\S3Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class S3Service
{
    public function _pathinfo($path, $options = null)
    {
        $path = urlencode($path);
        $parts = null === $options ? pathinfo($path) : pathinfo($path, $options);
        foreach ($parts as $field => $value) {
            $parts[$field] = urldecode($value);
        }
        return $parts;
    }

    /**
     * Upload file to S3
     * @param $file
     * @param $path
     * @return string[]
     */
    public function uploadFileToS3($file, $path, $limitFileName = null)
    {
        $fileOriginal = $file->getClientOriginalName();
        $fileOriginal = urldecode($fileOriginal);
        $pathInfo = $this->_pathinfo($fileOriginal);
        $fileName = $pathInfo['filename'] . time();
        
        $fileExtension = $pathInfo['extension'];
        $fileName = str_ireplace(['\'', '"',',' , ';', '<', '>', '^', '+', '?', ' ', '*'], '', $fileName) . "." . $fileExtension;
        $dirPath = $path . $fileName;
        Storage::disk('s3')->putFileAs($path, $file, $fileName);
        return Storage::disk('s3')->url($dirPath);
    }

    /**
     * Get s3 file url
     *
     * @param mixed $path
     * @param mixed $defaultImage
     * @return void
     */
    public function getS3FileUrl($path, $defaultImage = null)
    {
        try {
            $disk = Storage::disk('s3');
            if ($disk->exists($path)) {
                $s3Client = $disk->getDriver()->getAdapter()->getClient();
                $command = $s3Client->getCommand(
                    'GetObject',
                    [
                        'Bucket' => config('filesystems.disks.s3.bucket'),
                        'Key' => $path,
                        'ResponseContentDisposition' => 'attachment;',
                    ]
                );
                $request = $s3Client->createPresignedRequest($command, '+1440 minutes');
                return (string)$request->getUri();
            }
            return $defaultImage;
        } catch (S3Exception $e) {
            Log::error($e->getMessage() . $e->getTraceAsString());
            return $defaultImage;
        }
    }

    /**
     * Delete file from S3
     *
     * @param mixed $path
     * @return void
     */
    public function deleteFileFromS3($path)
    {
        $disk = Storage::disk('s3');
        Storage::disk('s3')->delete($path);
    }

    /**
     * Delete  from S3
     *
     * @param mixed $directory
     * @return void
     */
    public function deleteFolderFromS3($directory)
    {
        $disk = Storage::disk('s3');
        Storage::disk('s3')->deleteDirectory($directory);
    }

    /**
     * Copy s3 file
     *
     * @param mixed $path
     * @param mixed $directPath
     * @param mixed $defaultImage
     * @return void
     */
    public function copyObjectS3($path, $directPath, $defaultImage = false)
    {
        try {
            $disk = Storage::disk('s3');
            if ($disk->exists($path)) {
                if ($disk->exists($directPath)) {
                    $disk->delete($directPath);
                }
                $disk->copy($path, $directPath);

                return Storage::disk('s3')->url($directPath);
            }
            return $defaultImage;
        } catch (S3Exception $e) {
            Log::error($e->getMessage() . $e->getTraceAsString());

            return $defaultImage;
        }
    }

    public function checkExists($file)
    {
        return Storage::disk('s3')->exists($file);
    }
}

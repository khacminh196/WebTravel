<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\Tour\ITourRepository;
use App\Repositories\TourImage\ITourImageRepository;
use App\Repositories\TourPrefecture\ITourPrefectureRepository;
use Illuminate\Support\Facades\Storage;

class TourService
{
    protected $tourRepo;
    protected $tourImageRepo;
    protected $tourPrefectureRepo;
    protected $imageService;

    public function __construct(
        ITourRepository $tourRepo,
        ITourImageRepository $tourImageRepo,
        ITourPrefectureRepository $tourPrefectureRepo,
        ImageService $imageService
    )
    {
        $this->tourRepo = $tourRepo;
        $this->tourImageRepo = $tourImageRepo;
        $this->tourPrefectureRepo = $tourPrefectureRepo;
        $this->imageService = $imageService;
    }

    public function getAllTour()
    {
        $data = $this->tourRepo->all();

        return $data;
    }

    public function store($params)
    {
        if (isset($params['image']) && $params['image']) {
            $link = $this->imageService->upload($params['image']);
            $params['image_link'] = $link;
        }
        $newTour = $this->tourRepo->create($params);
        $paramsTourPrefectures = [];
        $paramsTourImages = [];
        foreach ($params['prefectures'] as $prefecture) {
            $paramsTourPrefectures[] = [
                'tour_id' => $newTour['id'],
                'prefecture_id' => $prefecture
            ];
        }
        foreach ($params['image_prefectures'] as $image) {
            $mime = $image->getMimeType();
            $paramsTourImages[] = [
                'tour_id' => $newTour['id'],
                'type' => strstr($mime, "video/") ? 1 : 2,
                'link' => $this->imageService->upload($image),
            ];
        }
        $this->tourPrefectureRepo->insert($paramsTourPrefectures);
        $this->tourImageRepo->insert($paramsTourImages);
    }
}
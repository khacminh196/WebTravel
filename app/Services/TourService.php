<?php
declare(strict_types=1);

namespace App\Services;

use App\Enums\Constant;
use App\Repositories\Tour\ITourRepository;
use App\Repositories\TourImage\ITourImageRepository;
use App\Repositories\TourPrefecture\ITourPrefectureRepository;

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

    public function getAllTourAdmin($params)
    {
        $data = $this->tourRepo->getListTour($params, false, true);

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
                'type' => strstr($mime, "video/") ? Constant::FILE_TYPE['VIDEO'] : Constant::FILE_TYPE['IMAGE'],
                'link' => $this->imageService->upload($image),
            ];
        }
        $this->tourPrefectureRepo->insert($paramsTourPrefectures);
        $this->tourImageRepo->insert($paramsTourImages);
    }

    public function getTourDetail($id)
    {
        return $this->tourRepo->getTourDetail($id, true);
    }

    public function update($id, $params)
    {
        $credentials = [
            'name' => $params['name'],
            'num_of_day' => $params['num_of_day'],
            'tag' => $params['tag'],
            'description' => $params['description'],
            'content' => $params['content'],
        ];

        if ($params['image_remove']) {
            $this->tourImageRepo->whereIn('id', $params['image_remove'])->delete();
        }

        if (isset($params['image'])) {
            $link = $this->imageService->upload($params['image']);
            $credentials['image_link'] = $link;
        }

        if (isset($params['image_prefectures'])) {
            foreach ($params['image_prefectures'] as $image) {
                $mime = $image->getMimeType();
                $paramsTourImages[] = [
                    'tour_id' => $id,
                    'type' => strstr($mime, "video/") ? 1 : 2,
                    'link' => $this->imageService->upload($image),
                ];
            }
            $this->tourImageRepo->insert($paramsTourImages);
        }

        if (isset($params['prefectures'])) {
            foreach ($params['prefectures'] as $prefecture) {
                $paramsTourPrefectures[] = [
                    'tour_id' => $id,
                    'prefecture_id' => $prefecture
                ];
            }
            $this->tourPrefectureRepo->where([['tour_id', $id]])->delete();
            $this->tourPrefectureRepo->insert($paramsTourPrefectures);
        }

        $result = $this->tourRepo->find($id);
        $result->update($credentials);
    }
}
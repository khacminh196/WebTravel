<?php

declare(strict_types=1);

namespace App\Repositories\Traffic;

use App\Repositories\BaseRepository;
use App\Models\WebsiteTraffic;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TrafficRepository extends BaseRepository implements ITrafficRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return WebsiteTraffic::class;
    }

    public function getTraffic($params = [])
    {
        if (isset($params['start_date']) && $params['start_date']) {
            $startDate = Carbon::parse($params['start_date'])->format('Y-m-d');
            $endDate = isset($params['end_date']) && $params['end_date'] ? Carbon::parse($params['end_date'])->format('Y-m-d')  : Carbon::now()->format('Y-m-d');
        } else {
            $startDate = Carbon::now()->subWeek(1)->format('Y-m-d');
            $endDate = Carbon::now()->format('Y-m-d');
        }
        $data = $this->model->select(
            'country',
            DB::raw("(SELECT SUM(count_visit) FROM website_traffic_detail wtd WHERE website_traffic_id = website_traffic.id AND date BETWEEN '$startDate' AND '$endDate') as sum_visit")
        )->paginate(20);

        return $data;
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteTrafficDetail extends Model
{
    public $table = "website_traffic_detail";

    public $fillable = [
        'website_traffic_id',
        'count_visit',
        'date',
    ];
}

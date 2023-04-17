<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteTraffic extends Model
{
    public $table = "website_traffic";

    public $fillable = [
        'country',
        'country_code',
    ];
}

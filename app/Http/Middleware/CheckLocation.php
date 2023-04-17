<?php

namespace App\Http\Middleware;

use App\Models\WebsiteTraffic;
use App\Models\WebsiteTrafficDetail;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CheckLocation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::get('get_location')) {
            $client = new Client();
            $ip = $request->header('CF-Connecting-IP');
            $url = "https://get.geojs.io/v1/ip/country/$ip.json";
            try {
                $result = $client->request("GET", $url);
                if ($result->getStatusCode() == 200) {
                    $response = $result->getBody()->getContents();
                    $response = json_decode($response);
                    $country = WebsiteTraffic::firstOrCreate(['country' => $response->name], [
                        'country_code' => $response->country
                    ]);
                    $detail = WebsiteTrafficDetail::firstOrCreate(['website_traffic_id' => $country->id, 'date' => Carbon::now()->format('Y-m-d')], [
                        'count_visit' => 0
                    ]);
                    $detail->count_visit += 1;
                    $detail->save();
                } else {
                    $response = null;
                }
            } catch (\Exception $e) {
                Log::channel('location')->info($e->getMessage(), ["ip" => $ip]);
            }
            Session::put('get_location', true);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prefecture;
use Illuminate\Http\Request;

class PrefectureController extends Controller
{
    public function index(Request $request)
    {
        $countryId = $request->country_id;
        $prefectures = Prefecture::where('country_id', $countryId)->get();
        $viewHtml = view('admin.template.options')->with('prefectures', $prefectures)->render();
        return response()->json(array('success' => true, 'html' => $viewHtml));
    }
}

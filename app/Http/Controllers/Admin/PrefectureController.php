<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Constant;
use App\Http\Controllers\Controller;
use App\Models\Prefecture;
use Illuminate\Http\Request;

class PrefectureController extends Controller
{
    public function index(Request $request)
    {
        $countryId = $request->country_id;
        $select = $request->select ?? null;
        $prefectures = Prefecture::where([
            ['country_id', $countryId],
            ['display', Constant::DISPLAY['SHOW']],
        ])->get();
        $viewHtml = view('admin.template.options', compact('select', 'prefectures'))->render();
        return response()->json(array('success' => true, 'html' => $viewHtml));
    }
}

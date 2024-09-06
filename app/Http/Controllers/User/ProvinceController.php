<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;

class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['show']);
    }

    public function show($id)
    {
        $cities = City::select(['id', 'name', 'province_id'])->where('province_id', $id)->get();

        return response()->json([
            'success' => true,
            'message' => 'success get data cities',
            'data' => $cities,
        ]);
    }
}

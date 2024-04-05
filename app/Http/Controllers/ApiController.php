<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\User;

class ApiController extends Controller
{
    public function apiUsers()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function apiParecels()
    {
        $parcels = Parcel::all();

        if (count($parcels) > 0) {
            return response()->json(['data' => $parcels], 200);
        } else {
            return response()->json(['data' => 'No data found'], 200);
        }
    }

    public function services_categories()
    {

    }
}

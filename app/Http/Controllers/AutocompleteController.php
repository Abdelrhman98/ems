<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\EquipmentGroup;
use App\Models\EquipmentStatus;
use App\Models\Site;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{

    public function company(Request $request)
    {
        $companies = [];

        if ($request->has('search')) {
            $search = $request->search;
            $companies = Company::select("id", "name_ar")
                      ->where('name_ar', 'LIKE', "%$search%")
                      ->get();
        }
        return response()->json($companies);
    }

    public function equipmentGroup(Request $request)
    {
        $equipmentGroup = [];

        if ($request->has('search')) {
            $search = $request->search;
            $equipmentGroup = EquipmentGroup::select("id", "name")
                      ->where('name', 'LIKE', "%$search%")
                      ->get();
        }
        return response()->json($equipmentGroup);
    }


    public function equipmentStatus(Request $request)
    {
        $equipmentStatus = [];

        if ($request->has('search')) {
            $search = $request->search;
            $equipmentStatus = EquipmentStatus::select("id", "name")
                      ->where('name', 'LIKE', "%$search%")
                      ->get();
        }
        return response()->json($equipmentStatus);
    }

    public function site(Request $request)
    {
        $site = [];

        if ($request->has('search')) {
            $search = $request->search;
            $site = Site::select("id", "name")
                      ->where('name', 'LIKE', "%$search%")
                      ->get();
        }
        return response()->json($site);
    }
    
}

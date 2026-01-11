<?php

namespace App\Http\Controllers;

use App\Models\GseMasterModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['GseCount'] = GseMasterModel::count();

        // dd($data['GseCount']);
        return view('admin-panel/dashboard/index', $data);
    }
}

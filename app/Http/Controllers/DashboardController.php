<?php

namespace App\Http\Controllers;

use App\Models\GseMasterModel;
use App\Models\ViolationReportModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | 1️⃣ SUMMARY GSE
        |--------------------------------------------------------------------------
        */
        $totalGse = GseMasterModel::count();

        $gseAktif = GseMasterModel::where('status', 1)->count();
        $gseTidakAktif = GseMasterModel::where('status', 0)->count();

        /*
        |--------------------------------------------------------------------------
        | 2️⃣ JENIS GSE BERDASARKAN MASKAPAI
        |--------------------------------------------------------------------------
        */
        $gseByCompanyAndType = DB::table('gse_master as gse')
            ->leftJoin('company_gse as c', 'gse.company_id', '=', 'c.company_id')
            ->leftJoin('type_gse as t', 'gse.type_id', '=', 't.type_id')
            ->select(
                'c.company_name',
                't.type_name',
                DB::raw('COUNT(gse.gse_id) as total')
            )
            ->groupBy('c.company_name', 't.type_name')
            ->orderBy('c.company_name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | 3️⃣ INFORMASI PELANGGARAN
        |--------------------------------------------------------------------------
        */
        $totalViolation = ViolationReportModel::count();

        $monthlyViolation = ViolationReportModel::whereMonth(
            'incident_date',
            Carbon::now()->month
        )
            ->whereYear(
                'incident_date',
                Carbon::now()->year
            )
            ->count();

        $dailyViolation = ViolationReportModel::whereDate(
            'incident_date',
            Carbon::today()
        )
            ->count();

        return view('admin-panel.dashboard.index', compact(
            'totalGse',
            'gseAktif',
            'gseTidakAktif',
            'gseByCompanyAndType',
            'totalViolation',
            'monthlyViolation',
            'dailyViolation'
        ));
    }
}

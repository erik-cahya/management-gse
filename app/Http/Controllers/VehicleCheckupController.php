<?php

namespace App\Http\Controllers;

use App\Models\VehicleCheckupListModel;
use App\Models\VehicleCheckupModel;
use App\Models\VehicleCheckupReportModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleCheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-panel.vehicle-checkup.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listingCheck'] = VehicleCheckupListModel::select('checkup_list_id', 'list_name')->get();
        return view('admin-panel.vehicle-checkup.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'checkup_list_id'   => 'required|array',
            'checkup_list_id.*' => 'required|in:baik,tidak_baik',
        ]);
        DB::transaction(function () use ($request) {

            $vehicleCheckup = VehicleCheckupModel::create([
                'no_sticker' => $request->no_sticker,
                'vehicle_type' => $request->vehicle_type,
                'vehicle_number' => $request->vehicle_number,
                'company' => $request->company,
                'staff_auditor' => $request->staff_auditor,
            ]);

            foreach ($request->checkup_list_id as $checkupListId => $result) {
                VehicleCheckupReportModel::create([
                    'vehicle_checkup_id' => $vehicleCheckup->vehicle_checkup_id,
                    'checkup_list_id' => $checkupListId,
                    'additional_note' => $result,
                ]);
            }
        });

        $flashData = [
            'title' => 'Tambah Data Success',
            'message' => 'Data Checkup Berhasil Ditambahkan',
            'swalFlashIcon' => 'success',
        ];
        return redirect()->route('checkup.index')->with('flashData', $flashData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

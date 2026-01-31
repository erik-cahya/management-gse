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
        $data['checkupData'] = VehicleCheckupModel::get();
        return view('admin-panel.vehicle-checkup.index', $data);
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
            'checkup_list_id.*' => 'required|in:baik,tidak baik',

            'keterangan'        => 'nullable|array',
            'keterangan.*'      => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($request) {

            $vehicleCheckup = VehicleCheckupModel::create([
                'no_sticker'     => $request->no_sticker,
                'vehicle_type'   => $request->vehicle_type,
                'vehicle_number' => $request->vehicle_number,
                'company'        => $request->company,
                'staff_auditor'  => $request->staff_auditor,
            ]);

            foreach ($request->checkup_list_id as $checkupListId => $result) {

                VehicleCheckupReportModel::create([
                    'vehicle_checkup_id' => $vehicleCheckup->vehicle_checkup_id,
                    'checkup_list_id'    => $checkupListId,
                    'result'             => $result,
                    'information'        => $request->keterangan[$checkupListId] ?? null,
                ]);
            }
        });

        return redirect()
            ->route('checkup.index')
            ->with('flashData', [
                'title' => 'Tambah Data Success',
                'message' => 'Data Checkup Berhasil Ditambahkan',
                'swalFlashIcon' => 'success',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['dataCheckup'] = VehicleCheckupModel::where('vehicle_checkup_id', $id)
            ->with(
                'reports:vehicle_checkup_report_id,vehicle_checkup_id,checkup_list_id,additional_name,result,information',
                'reports.listCheckups:checkup_list_id,list_name'
            )->first();

        // dd($data['dataCheckup']);

        return view('admin-panel.vehicle-checkup.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $dataCheckup = VehicleCheckupModel::where('vehicle_checkup_id', $id)
            ->with(
                'reports:vehicle_checkup_report_id,vehicle_checkup_id,checkup_list_id,additional_name,result,information',
                'reports.listCheckups:checkup_list_id,list_name'
            )->first();

        $vehicleCheckup = VehicleCheckupModel::with([
            'reports' => function ($q) {
                $q->select(
                    'vehicle_checkup_id',
                    'checkup_list_id',
                    'result',
                    'information'
                );
            }
        ])->findOrFail($id);

        $checkupResults = $vehicleCheckup->reports->keyBy('checkup_list_id');

        return view('admin-panel.vehicle-checkup.edit', [
            'dataCheckup' => $dataCheckup,
            'vehicleCheckup' => $vehicleCheckup,
            'checkupList'    => VehicleCheckupListModel::all(),
            'checkupResults' => $checkupResults,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'checkup_list_id'   => 'required|array',
            'checkup_list_id.*' => 'required|in:baik,tidak baik',

            'keterangan'        => 'nullable|array',
            'keterangan.*'      => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($request, $id) {

            $vehicleCheckup = VehicleCheckupModel::findOrFail($id);

            // 1️⃣ Update header
            $vehicleCheckup->update([
                'no_sticker'     => $request->no_sticker,
                'vehicle_type'   => $request->vehicle_type,
                'vehicle_number' => $request->vehicle_number,
                'company'        => $request->company,
                'staff_auditor'  => $request->staff_auditor,
            ]);

            // 2️⃣ Update detail
            foreach ($request->checkup_list_id as $checkupListId => $result) {

                VehicleCheckupReportModel::updateOrCreate(
                    [
                        'vehicle_checkup_id' => $vehicleCheckup->vehicle_checkup_id,
                        'checkup_list_id'    => $checkupListId,
                    ],
                    [
                        'result'      => $result,
                        'information' => $request->keterangan[$checkupListId] ?? null,
                    ]
                );
            }
        });

        return redirect()
            ->route('checkup.index')
            ->with('flashData', [
                'title' => 'Update Success',
                'message' => 'Data Checkup Berhasil Diperbarui',
                'swalFlashIcon' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // GSEViolationModel::where('id', $id)->delete();
        VehicleCheckupModel::where('vehicle_checkup_id', $id)->delete();
        $flashData = [
            'judul' => 'Delete Data Success',
            'pesan' => 'Data Checkup Berhasil Dihapus',
            'swalFlashIcon' => 'success',
        ];

        return response()->json($flashData);
    }
}

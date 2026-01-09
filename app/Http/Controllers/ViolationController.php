<?php

namespace App\Http\Controllers;

use App\Models\GSEInspectionModel;
use App\Models\GseMasterModel;
use App\Models\GSEViolationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['gseData'] = GseMasterModel::select('id', 'gse_serial', 'gse_type', 'status')->get();
        return view('admin-panel.violations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        //   "name_checker" => "Erik Cahya"
        //   "date_checking" => "2026-01-08"
        //   "gse_serial" => "SN-1231"
        //   "location" => "Sanur"
        //   "violation_name" => "Tidak Sesuai SOP"
        //   "violation_type" => "Pelanggaran Administratif"
        //   "level" => "Berat"
        //   "description" => "Mesin tidak sesuai dengan spesifikasi"

        $inspectionCreate = GSEInspectionModel::create([
            'gse_serial' => $request->gse_serial,
            'user_id' => Auth::user()->id,
            'examination_date' => $request->date_checking,
            'employee' => $request->name_checker,
            'location' => $request->location
        ]);

        GSEViolationModel::create([
            'gse_serial' => $request->gse_serial,
            'inspection_id' => $inspectionCreate->id,
            'violation_name' => $request->violation_name,
            'violation_type' => strtolower(trim($request->violation_type)),
            'violation_level' => strtolower(trim($request->level)),
            'description' => $request->description,
        ]);

        $flashData = [
            'title' => 'Tambah Pelanggaran GSE Success',
            'message' => 'History Pelanggaran Berhasil Ditambahkan',
            'swalFlashIcon' => 'success',
        ];
        return redirect()->route('violation.index')->with('flashData', $flashData);
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

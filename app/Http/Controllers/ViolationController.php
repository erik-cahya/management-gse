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
        $data['dataViolation'] = GSEViolationModel::select(
            'gse_violations.id as inspectionID',
            'gse_violations.gse_serial',
            'gse_violations.employee',
            'gse_violations.examination_date',
            'gse_violations.location',

            // 'gse_violations.id as violationID',
            'gse_violations.violation_name',
            'gse_violations.violation_level',
            'gse_violations.violation_type',
        )
            ->get();
        // dd($data['dataViolation']);

        return view('admin-panel.violations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['gseData'] = GseMasterModel::select('id', 'gse_serial', 'gse_type', 'status')->get();
        return view('admin-panel.violations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // $inspectionCreate = GSEInspectionModel::create([
        //     'gse_serial' => $request->gse_serial,
        //     // 'user_id' => Auth::user()->id,
        //     'user_id' => NULL,

        // ]);

        GSEViolationModel::create([
            'gse_serial' => $request->gse_serial,
            // 'inspection_id' => $inspectionCreate->id,

            'employee' => strtolower(trim($request->name_checker)),
            'location' => strtolower(trim($request->location)),
            'examination_date' => $request->date_checking,

            'violation_name' => strtolower(trim($request->violation_name)),
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
        // GSEViolationModel::where('id', $id)->delete();
        GSEViolationModel::where('id', $id)->delete();
        $flashData = [
            'judul' => 'Delete User Success',
            'pesan' => 'Data User Deleted Successfully',
            'swalFlashIcon' => 'success',
        ];

        return response()->json($flashData);
    }
}

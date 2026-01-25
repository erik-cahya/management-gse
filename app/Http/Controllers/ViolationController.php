<?php

namespace App\Http\Controllers;

use App\Models\GSEInspectionModel;
use App\Models\GseMasterModel;
use App\Models\GSEViolationModel;
use App\Models\SanctionModel;
use App\Models\ViolationReportDetailModel;
use App\Models\ViolationReportModel;
use App\Models\ViolationTypesModel;
use App\Models\ViolatorModel;
use Carbon\Carbon;
use Database\Seeders\ViolationTypeSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataViolation'] = GSEViolationModel::select(
            'gse_violations.violation_id as inspectionID',
            'gse_violations.gse_id',
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
        // $data['gseData'] = GseMasterModel::select('id', 'gse_serial', 'gse_type', 'status')->get();
        $data['violationType'] = ViolationTypesModel::get();
        $data['dataSanction'] = SanctionModel::get();
        $data['dataGSE'] = GseMasterModel::with('typePeralatan')->get();
        return view('admin-panel.violations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        foreach ($request->violation_type_id_additional_checkbox ?? [] as $id => $on) {
            if (empty($request->violation_type_id_additional_text[$id])) {
                throw ValidationException::withMessages([
                    "violation_type_id_additional_text.$id" =>
                    'Informasi tambahan wajib diisi',
                ]);
            }
        }
        DB::transaction(function () use ($request) {
            $violator = ViolatorModel::create([
                'gse_id' => $request->gse_id,
                'full_name' => $request->full_name,
                'company_name' => $request->company_name,
                'airport_pass_number' => $request->airport_pass_number,
                'airport_pass_type' => $request->airport_pass_type ?? NULL,
                'tim_number' => $request->tim_number,
                'tim_type' => $request->tim_type ?? NULL,
                'license_type' => $request->license_type,
                'license_number' => $request->license_number,
                'vehicle_plate_number' => $request->vehicle_plate_number,
            ]);
            $violationReport = ViolationReportModel::create([
                'violator_id' => $violator->violator_id,
                'incident_date' => Carbon::createFromFormat('d/m/Y', $request->incident_date)->format('Y-m-d'),
                'incident_time' => $request->incident_time,
                'incident_location' => $request->incident_location,
                'remarks' => $request->remarks ?? NULL,
                'created_by' => Auth::user()->ref,
            ]);

            $violationTypeIds = array_keys($request->violation_type_id);
            foreach ($violationTypeIds as $typeId) {
                $violationReportDetails = ViolationReportDetailModel::create([
                    'violation_report_id' => $violationReport->violation_report_id,
                    'violation_type_id' => $typeId,
                    'additional_note' => NULL
                ]);
            }

            $normalIds = array_keys($request->violation_type_id ?? []);
            $additionalCheckedIds = array_keys(
                $request->violation_type_id_additional_checkbox ?? []
            );
            $additionalTexts = $request->violation_type_id_additional_text ?? [];
            DB::transaction(function () use (
                $violationReport,
                $normalIds,
                $additionalCheckedIds,
                $additionalTexts
            ) {
                // 1. violation tanpa additional
                foreach ($normalIds as $typeId) {
                    ViolationReportDetailModel::create([
                        'violation_report_id' => $violationReport->violation_report_id,
                        'violation_type_id'   => $typeId,
                        'additional_note'     => null,
                    ]);
                }
                // 2. violation dengan additional note
                foreach ($additionalCheckedIds as $typeId) {
                    ViolationReportDetailModel::create([
                        'violation_report_id' => $violationReport->violation_report_id,
                        'violation_type_id'   => $typeId,
                        'additional_note'     => $additionalTexts[$typeId] ?? null,
                    ]);
                }
            });
        });



        // $validated = $request->validate([
        //     'name_checker' => 'required',
        //     'date_checking' => 'required',
        //     'gse_serial' => 'required',
        //     'location' => 'required',
        //     'violation_name' => 'required',
        //     'violation_type' => 'required',
        //     'level' => 'required',
        // ], [
        //     'name_checker.required' => 'Silahkan inputkan nama pemeriksa',
        //     'date_checking.required' => 'Masukkan tanggal pemeriksaan',
        //     'gse_serial.required' => 'Pilih GSE yang akan diinputkan',
        //     'location.required' => 'Inputkan lokasi pelanggaran',
        //     'violation_name.required' => 'Inputkan nama pelanggaran',
        //     'violation_type.required' => 'Inputkan tipe pelanggaran',
        //     'level.required' => 'Inputkan level pelanggaran',
        // ]);

        // GSEViolationModel::create([
        //     'gse_serial' => $request->gse_serial,
        //     // 'inspection_id' => $inspectionCreate->id,

        //     'employee' => strtolower(trim($request->name_checker)),
        //     'location' => strtolower(trim($request->location)),
        //     'examination_date' => $request->date_checking,

        //     'violation_name' => strtolower(trim($request->violation_name)),
        //     'violation_type' => strtolower(trim($request->violation_type)),
        //     'violation_level' => strtolower(trim($request->level)),
        //     'description' => $request->description,
        // ]);

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

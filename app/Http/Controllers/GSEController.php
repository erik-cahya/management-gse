<?php

namespace App\Http\Controllers;

use App\Models\BahanBakarModel;
use App\Models\GSEInspectionModel;
use App\Models\GseMasterModel;
use App\Models\GSEViolationModel;
use App\Models\KategoriModel;
use App\Models\KepemilikanModel;
use App\Models\KodeGhModel;
use App\Models\KodeGseModel;
use App\Models\PeralatanModel;
use App\Models\PerusahaanModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GSEController extends Controller
{
    public function __construct()
    {
        View()->share('title', 'GSE Management');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataGSE'] = GseMasterModel::get();
        return view('admin-panel.gse-master.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dataPerusahaan'] = PerusahaanModel::get();
        $data['typePeralatan'] = PeralatanModel::get();
        $data['dataKategori'] = KategoriModel::get();
        $data['dataBahanBakar'] = BahanBakarModel::get();
        $data['dataStatusKepemilikan'] = KepemilikanModel::get();
        $data['dataKodeGH'] = KodeGhModel::get();
        $data['dataKodeGSE'] = KodeGseModel::get();
        return view('admin-panel.gse-master.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sticker_gse' => 'required|unique:gse_master',
            'gse_type' => 'required',
            'operator' => 'required',
            'status' => 'required',
        ], [
            'sticker_gse.required' => 'Silahkan inputkan nomor serial',
            'sticker_gse.unique' => 'Nomor Serial Ini Sudah Terdaftar Di Sistem',

            'gse_type.unique' => 'Pilih Jenis GSE',
            'operator.unique' => 'Pilih Jenis Operator',
            'status.unique' => 'Pilih Status GSE',
        ]);
        GseMasterModel::create([
            'gse_serial' => $request->gse_serial,
            'gse_type' => $request->gse_type,
            'operator' => $request->operator,
            'operation_area' => $request->operation_area,
            'status' => $request->status,
        ]);

        $flashData = [
            'title' => 'Add New GSE Data Success',
            'message' => 'New GSE Data Listed',
            'swalFlashIcon' => 'success',
        ];
        return redirect()->route('gse.index')->with('flashData', $flashData);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($request->all());
        $data['dataGse'] = GseMasterModel::where('gse_master.gse_serial', $id)
            ->first();
        $data['dataViolations'] = GSEViolationModel::where('gse_serial', $id)
            ->orderBy('examination_date', 'DESC')->get();

        // dd($data['dataViolations']);
        $data['inputSerial'] = $id;
        return view('admin-panel.gse-master.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataGse'] = GseMasterModel::where('gse_serial', $id)->first();
        return view('admin-panel.gse-master.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        GseMasterModel::where('id', $id)->update([
            'gse_serial' => $request->gse_serial,
            'gse_type' => $request->gse_type,
            'operator' => $request->operator,
            'operation_area' => $request->operation_area,
            'status' => $request->status,
        ]);

        $flashData = [
            'title' => 'Edit GSE Data Success',
            'message' => 'GSE Data Edited Successfully',
            'swalFlashIcon' => 'success',
        ];
        return redirect()->route('gse.index')->with('flashData', $flashData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GseMasterModel::destroy($id);
        $flashData = [
            'judul' => 'Delete Data Success',
            'pesan' => 'Data Deleted Successfully',
            'swalFlashIcon' => 'success',
        ];

        return response()->json($flashData);
    }

    public function search()
    {
        return view('admin-panel.gse-master.search');
    }

    public function getSearchData(Request $request)
    {
        // dd($request->all());
        $data['dataGse'] = GseMasterModel::where('gse_master.gse_serial', $request->gse_serial)->first();

        $data['dataViolations'] = GSEViolationModel::where('gse_serial', $request->gse_serial)
            ->select(
                'violation_name',
                'violation_type',
                'violation_level',
                'description',
                'examination_date',
                'employee',
                'location',
            )->orderBy('examination_date', 'DESC')->get();

        // dd($data['dataViolations']);
        $data['inputSerial'] = $request->gse_serial;
        return view('admin-panel.gse-master.search', $data);
    }
}

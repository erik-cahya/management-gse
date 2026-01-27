<?php

namespace App\Http\Controllers;

use App\Models\CategoryGseModel;
use App\Models\CodeGhModel;
use App\Models\CodeGseModel;
use App\Models\CompanyGseModel;
use App\Models\GSEInspectionModel;
use App\Models\GseMasterModel;
use App\Models\GSEViolationModel;
use App\Models\FuelTypeModel;
use App\Models\OwnershipTypeGseModel;
use App\Models\TypeGseModel;
use App\Models\ViolatorModel;
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
        $data['dataGSE'] = GseMasterModel::with(
            'companies',
            'types',
            'categories',
            'fuels',
            'ownerships',
            'codeGH',
            'codeGSE',
        )->get();

        // dd($data['dataGSE']);
        return view('admin-panel.gse-master.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dataPerusahaan'] = CompanyGseModel::get();
        $data['typePeralatan'] = TypeGseModel::get();
        $data['dataKategori'] = CategoryGseModel::get();
        $data['dataBahanBakar'] = FuelTypeModel::get();
        $data['dataStatusKepemilikan'] = OwnershipTypeGseModel::get();
        $data['dataKodeGH'] = CodeGhModel::get();
        $data['dataKodeGSE'] = CodeGseModel::get();
        return view('admin-panel.gse-master.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'gse_serial' => 'required|unique:gse_master',
            'status' => 'required',
        ], [
            'gse_serial.required' => 'Silahkan inputkan nomor serial',
            'gse_serial.unique' => 'Nomor Serial Ini Sudah Terdaftar Di Sistem',

        ]);


        GseMasterModel::create([
            'gse_serial' => $request->gse_serial,
            'asset_number' => $request->nomor_asset,
            'vehicle_number' => $request->nopol_kendaraan,
            'company_id' => $request->perusahaan_id,
            'type_id' => $request->type_peralatan_gse,
            'brand' => $request->merk,
            'category_id' => $request->kategori,
            'fuel_type' => $request->bahan_bakar,
            'length' => $this->floatNumbering($request->panjang),
            'width' => $this->floatNumbering($request->lebar),
            'area' => $this->floatNumbering($request->luas),
            'manufacture_year' => $request->manufacture_year,
            'owneship_type' => $request->status_kepemilikan,
            'rental_company' => $request->perusahaan_sewa,
            'rental_status' => $request->status_sewa,
            'rental_date' => $request->tanggal_sewa,
            'code_gh' => $request->kode_gh,
            'code_gse' => $request->kode_gse,
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
        $data['dataGse'] = GseMasterModel::where('gse_master.gse_id', $id)->first();
        // $data['dataViolations'] = GSEViolationModel::where('gse_serial', $id)->orderBy('examination_date', 'DESC')->get();

        $data['dataViolations'] = ViolatorModel::where('gse_id', $id)->with('violationReports')->get();
        $data['inputSerial'] = $id;

        // dd($data['dataViolations']);
        return view('admin-panel.gse-master.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataGse'] = GseMasterModel::where('gse_serial', $id)->select('gse_master.*', 'kategori as id_kategori')->first();

        $data['dataPerusahaan'] = CompanyGseModel::get();
        $data['typePeralatan'] = TypeGseModel::get();
        $data['dataKategori'] = CategoryGseModel::get();
        $data['dataBahanBakar'] = FuelTypeModel::get();
        $data['dataStatusKepemilikan'] = OwnershipTypeGseModel::get();
        $data['dataKodeGH'] = CodeGhModel::get();
        $data['dataKodeGSE'] = CodeGseModel::get();

        // dd($data['dataGse']);
        return view('admin-panel.gse-master.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'gse_serial' => 'required|unique:gse_master,gse_serial,' . $id . ',gse_id',
            'nomor_asset' => 'required|unique:gse_master,nomor_asset,' . $id . ',gse_id',
            'nopol_kendaraan' => 'required|unique:gse_master,nopol_kendaraan,' . $id . ',gse_id',
            'status' => 'required',
        ], [
            'gse_serial.required' => 'Silahkan inputkan nomor serial',
            'gse_serial.unique' => 'Nomor Serial Ini Sudah Terdaftar Di Sistem',
        ]);

        GseMasterModel::where('gse_id', $id)->update([
            'gse_serial' => $request->gse_serial,
            'asset_number' => $request->nomor_asset,
            'vehicle_number' => $request->nopol_kendaraan,
            'company_id' => $request->perusahaan_id,
            'type_id' => $request->type_peralatan_gse,
            'brand' => $request->merk,
            'category_id' => $request->kategori,
            'fuel_type' => $request->bahan_bakar,
            'length' => $this->floatNumbering($request->panjang),
            'width' => $this->floatNumbering($request->lebar),
            'area' => $this->floatNumbering($request->luas),
            'manufacture_year' => $request->manufacture_year,
            'owneship_type' => $request->status_kepemilikan,
            'rental_company' => $request->perusahaan_sewa,
            'rental_status' => $request->status_sewa,
            'rental_date' => $request->tanggal_sewa,
            'code_gh' => $request->kode_gh,
            'code_gse' => $request->kode_gse,
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
        // $data['dataGse'] = GseMasterModel::where('gse_master.gse_serial', $request->gse_serial)->first();

        $keyword = $request->keyword_search;
        $data['dataGse'] = GseMasterModel::where(function ($q) use ($keyword) {
            $q->where('gse_serial', 'like', "%{$keyword}%")
                ->orWhere('asset_number', 'like', "%{$keyword}%")
                ->orWhere('vehicle_number', 'like', "%{$keyword}%");
        })->with(
            'companies',
            'types',
            'categories',
            'fuels',
            'ownerships',
            'codeGH',
            'codeGSE',
        )
            ->first();

        // dd($data['dataGse']);

        // $data['dataViolations'] = GSEViolationModel::where('gse_id', $request->keyword_search)
        //     ->select(
        //         'violation_name',
        //         'violation_type',
        //         'violation_level',
        //         'description',
        //         'examination_date',
        //         'employee',
        //         'location',
        //     )->orderBy('examination_date', 'DESC')->get();

        // dd($data['dataViolations']);
        $data['inputSerial'] = $request->keyword_search;

        return view('admin-panel.gse-master.search', $data);
    }

    private function floatNumbering($number)
    {
        $number = trim($number);

        // Hapus semua spasi
        $number = str_replace(' ', '', $number);

        // EU format: ada koma (,) sebagai desimal
        if (preg_match('/\d+\.\d+,\d+/', $number) || preg_match('/\d+,\d+/', $number)) {
            // Hapus titik sebagai ribuan, ganti koma jadi titik
            $number = str_replace('.', '', $number);
            $number = str_replace(',', '.', $number);
        }

        // US format: koma sebagai ribuan, titik sebagai desimal
        elseif (preg_match('/\d+,\d+\.\d+/', $number) || preg_match('/\d+,\d{3}/', $number)) {
            $number = str_replace(',', '', $number);
        }

        return floatval($number);
    }
}

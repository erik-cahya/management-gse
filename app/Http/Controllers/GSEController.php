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
            'asset_number' => $request->asset_number,
            'vehicle_number' => $request->vehicle_number,
            'company_id' => $request->company_id,
            'type_id' => $request->type_id,
            'brand' => $request->brand,
            'category_id' => $request->category_id,
            'fuel_type' => $request->fuel_type,
            'length' => $this->floatNumbering($request->length),
            'width' => $this->floatNumbering($request->width),
            'area' => $this->floatNumbering($request->area),
            'manufacture_year' => $request->manufacture_year,
            'ownership_type' => $request->ownership_type,
            'rental_company' => $request->rental_company,
            'rental_status' => $request->rental_status,
            'rental_date' => $request->rental_date,
            'code_gh' => $request->code_gh,
            'code_gse' => $request->code_gse,
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

        $data['dataViolations'] = ViolatorModel::where('gse_id', $id)->with('violationReports')->get();
        $data['inputSerial'] = $id;

        return view('admin-panel.gse-master.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // $data['dataGse'] = GseMasterModel::where('gse_serial', $id)->select('gse_master.*', 'kategori as id_kategori')->first();

        $data['dataGse'] = GseMasterModel::where('gse_master.gse_id', $id)->select('gse_master.*', 'category_id as id_kategori')->first();

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
            'asset_number' => 'required|unique:gse_master,asset_number,' . $id . ',gse_id',
            'vehicle_number' => 'required|unique:gse_master,vehicle_number,' . $id . ',gse_id',
            'status' => 'required',
        ], [
            'gse_serial.required' => 'Silahkan inputkan nomor serial',
            'gse_serial.unique' => 'Nomor Serial Ini Sudah Terdaftar Di Sistem',
        ]);

        GseMasterModel::where('gse_id', $id)->update([
            'gse_serial' => $request->gse_serial,
            'asset_number' => $request->asset_number,
            'vehicle_number' => $request->vehicle_number,
            'company_id' => $request->company_id,
            'type_id' => $request->type_id,
            'brand' => $request->brand,
            'category_id' => $request->category_id,
            'fuel_type' => $request->fuel_type,
            'length' => $this->floatNumbering($request->length),
            'width' => $this->floatNumbering($request->width),
            'area' => $this->floatNumbering($request->area),
            'manufacture_year' => $request->manufacture_year,
            'ownership_type' => $request->ownership_type,
            'rental_company' => $request->rental_company,
            'rental_status' => $request->rental_status,
            'rental_date' => $request->rental_date,
            'code_gh' => $request->code_gh,
            'code_gse' => $request->code_gse,
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
        GseMasterModel::where('gse_id', $id)->delete();
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
        $keyword = $request->keyword_search;
        $data['dataGse'] = GseMasterModel::where(function ($q) use ($keyword) {
            $q->where('gse_serial', 'like', "%{$keyword}%")
                ->orWhere('asset_number', 'like', "%{$keyword}%")
                ->orWhere('vehicle_number', 'like', "%{$keyword}%");
        })->with(
            'companies:company_id,company_name',
            'types:type_id,type_name',
            'categories:category_id,category_name',
            'fuels:fuel_id,fuel_type_name',
            'ownerships:ownership_type_id,ownership_name',
            'codeGH',
            'codeGSE',
        )
            ->first();

        $data['dataViolations'] = collect();

        if ($data['dataGse']) {
            $data['dataViolations'] = ViolatorModel::where(
                'gse_id',
                $data['dataGse']->gse_id
            )
                ->with('violationReports')
                ->get();
        }

        $data['inputSerial'] = $keyword;

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

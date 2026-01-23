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
        $data['dataGSE'] = GseMasterModel::with(
            'perusahaan',
            'typePeralatan',
            'kategori_gse',
            'bahanBakar',
            'statusKepemilikan',
            'kodeGH',
            'kodeGSE',
        )->get();

        // dd($data['dataGSE']);
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
            'gse_serial' => 'required|unique:gse_master',
            'status' => 'required',
        ], [
            'gse_serial.required' => 'Silahkan inputkan nomor serial',
            'gse_serial.unique' => 'Nomor Serial Ini Sudah Terdaftar Di Sistem',

        ]);


        GseMasterModel::create([
            'gse_serial' => $request->gse_serial,
            'nomor_asset' => $request->nomor_asset,
            'nopol_kendaraan' => $request->nopol_kendaraan,
            'perusahaan_id' => $request->perusahaan_id,
            'type_peralatan_gse' => $request->type_peralatan_gse,
            'merk' => $request->merk,
            'kategori' => $request->kategori,
            'bahan_bakar' => $request->bahan_bakar,
            'panjang' => $this->floatNumbering($request->panjang),
            'lebar' => $this->floatNumbering($request->lebar),
            'luas' => $this->floatNumbering($request->luas),
            'manufacture_year' => $request->manufacture_year,
            'status_kepemilikan' => $request->status_kepemilikan,
            'perusahaan_sewa' => $request->perusahaan_sewa,
            'status_sewa' => $request->status_sewa,
            'tanggal_sewa' => $request->tanggal_sewa,
            'kode_gh' => $request->kode_gh,
            'kode_gse' => $request->kode_gse,
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
        $data['dataGse'] = GseMasterModel::where('gse_serial', $id)->select('gse_master.*', 'kategori as id_kategori')->first();

        $data['dataPerusahaan'] = PerusahaanModel::get();
        $data['typePeralatan'] = PeralatanModel::get();
        $data['dataKategori'] = KategoriModel::get();
        $data['dataBahanBakar'] = BahanBakarModel::get();
        $data['dataStatusKepemilikan'] = KepemilikanModel::get();
        $data['dataKodeGH'] = KodeGhModel::get();
        $data['dataKodeGSE'] = KodeGseModel::get();

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
            'nomor_asset' => $request->nomor_asset,
            'nopol_kendaraan' => $request->nopol_kendaraan,
            'perusahaan_id' => $request->perusahaan_id,
            'type_peralatan_gse' => $request->type_peralatan_gse,
            'merk' => $request->merk,
            'kategori' => $request->kategori,
            'bahan_bakar' => $request->bahan_bakar,
            'panjang' => $this->floatNumbering($request->panjang),
            'lebar' => $this->floatNumbering($request->lebar),
            'luas' => $this->floatNumbering($request->luas),
            'manufacture_year' => $request->manufacture_year,
            'status_kepemilikan' => $request->status_kepemilikan,
            'perusahaan_sewa' => $request->perusahaan_sewa,
            'status_sewa' => $request->status_sewa,
            'tanggal_sewa' => $request->tanggal_sewa,
            'kode_gh' => $request->kode_gh,
            'kode_gse' => $request->kode_gse,
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
                ->orWhere('nomor_asset', 'like', "%{$keyword}%")
                ->orWhere('nopol_kendaraan', 'like', "%{$keyword}%");
        })->with(
            'perusahaan',
            'typePeralatan',
            'kategori_gse',
            'bahanBakar',
            'statusKepemilikan',
            'kodeGH',
            'kodeGSE',
        )
            ->first();

        // dd($data['dataGse']);

        $data['dataViolations'] = GSEViolationModel::where('gse_id', $request->keyword_search)
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

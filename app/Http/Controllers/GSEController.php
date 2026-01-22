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

        // "gse_id" => "01KFJA4NPVMSYJFY8JQ1RT1T0N"
        // "gse_serial" => "92090213"
        // "nomor_asset" => "INV-2149123"
        // "nopol_kendaraan" => "DK-2133-KDN"
        // "perusahaan_id" => "01KFJ9TVPNZP98WRNKN28SWTKT"
        // "type_peralatan_gse" => "01KFJ9TVQ3A5REDKMFD0M3DY4J"
        // "merk" => "HIACE"
        // "kategori" => "01KFJ9TVQNB7T2SHF1CT5981VM"
        // "bahan_bakar" => "01KFJ9TVQQP8TK8TZ8RF2P9D12"
        // "panjang" => 23.0
        // "lebar" => 3214.0
        // "luas" => 312.0
        // "manufacture_year" => 2011
        // "status_kepemilikan" => "01KFJ9TVQSX8XP9J19CH8KWGCW"
        // "perusahaan_sewa" => null
        // "status_sewa" => "PRIBADI"
        // "tanggal_sewa" => "2026-01-23"
        // "kode_gh" => "01KFJ9TVQV7GN3K9VJV0XGQ2JC"
        // "kode_gse" => "01KFJ9TVR3DZCNSRAC1EP5PN9H"
        // "status" => 1
        // "created_at" => "2026-01-22 15:36:42"
        // "updated_at" => "2026-01-22 15:36:42"

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

        // "sticker_gse" => "234234"
        //   "nomor_asset" => "2345324"
        //   "nopol_kendaraan" => "23234"
        //   "perusahaan_id" => "01kfe244g3ezsgpavapmrq3n9g"
        //   "type_peralatan_gse" => "01kfe244wkvbbnpk52kqd9e8f4"
        //   "merk" => "ferger"
        //   "kategori" => "01kfe245rg4qz9bnq5k96pemtb"
        //   "bahan_bakar" => "01kfe245sh4wb4qgphjzgqdqa2"
        //   "panjang" => "23"
        //   "lebar" => "3214"
        //   "luas" => "4213"
        //   "manufacture_year" => "2312"
        //   "status_kepemilikan" => "01kfe245vw9jca7b7233ekpx78"
        //   "perusahaan_sewa" => "2344f"
        //   "status_sewa" => "1234"
        //   "tanggal_sewa" => "2026-01-19"
        //   "kode_gh" => "01kfe245xd23ygv28txpasa50r"
        //   "kode_gse" => "01kfe246dazskp0paepf9w9zy4"
        //   "status" => "0"


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
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'luas' => $request->luas,
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

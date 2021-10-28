<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Dompet;
use App\Models\DompetStatus;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;
use App\Models\Kategori;
use App\Models\KategoriStatus;

class DompetMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_verified']);
    }

    public function index()
    {
        $transaksi = Transaksi::join('transaksi_status', 'transaksi_status.status_id', '=', 'transaksi.trx_status_id')
        ->join('dompet', 'dompet.dompet_id', '=', 'transaksi.dompet_id')
        ->join('dompet_status', 'dompet_status.status_id', '=', 'dompet.dompet_status_id')
        ->join('kategori', 'kategori.cat_id', '=', 'transaksi.cat_id')
        ->join('kategori_status', 'kategori_status.status_id', '=', 'kategori.cat_status_id')
        ->get(['kategori.cat_id', 'kategori.cat_name', 'dompet.dompet_id', 'dompet.dompet_name', 'transaksi.*']);
        return view('admin.dompet.masuk.index', compact('transaksi'));
    }

    public function create(Transaksi $transaksi)
    {
        $dompet = Dompet::join('dompet_status', 'dompet.dompet_status_id', '=', 'dompet_status.status_id')->where('dompet_status.status_name', 'Aktif')->get(['dompet.*']);
        $kategori = Kategori::join('kategori_status', 'kategori.cat_status_id', '=', 'kategori_status.status_id')->where('kategori_status.status_name', 'Aktif')->get(['kategori.*']);

        $data = $this->get_kode();  
        return view('admin.dompet.masuk.create', compact('dompet', 'kategori', 'data'));
    }

    public function store(Request $request, Transaksi $transaksi)
    {
        $validator = Validator::make($request->all(), [
            'dompet_masuk_kode' => 'required',
            'dompet_masuk_tanggal' => 'required',
            'dompet_masuk_kategori' => 'required',
            'dompet_masuk_dompet' => 'required',
            'dompet_masuk_nilai' => 'required|numeric|min:0|not_in:0',
            'dompet_masuk_deskripsi' => 'required|max:100'
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $dompet_masuk_kode = $request->get('dompet_masuk_kode');
        $dompet_masuk_tanggal = $request->get('dompet_masuk_tanggal');
        $dompet_masuk_kategori = $request->get('dompet_masuk_kategori');
        $dompet_masuk_dompet = $request->get('dompet_masuk_dompet');
        $dompet_masuk_nilai = $request->get('dompet_masuk_nilai');
        $dompet_masuk_deskripsi = $request->get('dompet_masuk_deskripsi');

        $execute = $transaksi->create([
            'trx_code' => trim($dompet_masuk_kode),
            'trx_date' => trim($dompet_masuk_tanggal),
            'cat_id' => trim($dompet_masuk_kategori),
            'dompet_id' => trim($dompet_masuk_dompet),
            'trx_value' => intval($dompet_masuk_nilai),
            'trx_description' => trim($dompet_masuk_deskripsi),
            'trx_status_id' => intval(1),
        ]);

        if ($execute) {
            return redirect()->route('admin.dompet.masuk.index')->with('success','Dompet Masuk berhasil ditambahkan!');
        } else {
            return redirect()->route('admin.dompet.masuk.index')->with('error', 'Terjadi kesalahan saat melakukan tambah data Dompet Masuk!');
        }
    }

    public function edit(Transaksi $transaksi)
    {
        $status = TransaksiStatus::all();
        return view('admin.dompet.masuk.edit', compact('transaksi', 'status'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $validator = Validator::make($request->all(), [
            'trx_name' => 'min:5',
            'trx_deskripsi' => 'max:100',
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $transaksi_name = $request->get('trx_name');
        $transaksi_referensi = $request->get('trx_referensi');
        $transaksi_deskripsi = $request->get('trx_deskripsi');
        $transaksi_status = $request->get('trx_status');

        $execute = $transaksi->update([
            'trx_name' => trim($transaksi_name),
            'trx_referensi' => intval($transaksi_referensi),
            'trx_deskripsi' => trim($transaksi_deskripsi),
            'trx_status_id' => intval($transaksi_status),
        ]);

        if ($execute) {
            return redirect()->route('admin.dompet.masuk.index')->with('success','Dompet Masuk berhasil diubah!');
        } else {
            return redirect()->route('admin.dompet.masuk.index')->with('error', 'Terjadi kesalahan saat melakukan ubah data Dompet Masuk!');
        }
    }

    public function show(Transaksi $transaksi)
    {
        return view('admin.dompet.masuk.show', compact('transaksi'));
    }

    public function get_newid($auto_id, $prefix){
        $newId = substr($auto_id, 1, 6);
        $tambah = (int)$newId + 1;

        if (strlen($tambah) == 1){
            $data = $prefix."00000" .$tambah;
        }
        else if (strlen($tambah) == 2){
            $data = $prefix."0000" .$tambah;
        }
        else if(strlen($tambah) == 3){
            $data = $prefix."000".$tambah;   
        }
        else if (strlen($tambah) == 4){
            $data = $prefix."00" .$tambah;
        }
        else if(strlen($tambah) == 5){
            $data = $prefix."0" .$tambah;
        }
        else if(strlen($tambah) == 6){
            $data = $prefix.$tambah;   
        }
        return $data;
    }

    public function get_kode(){
        $auto_id = "";
        $new_id = Transaksi::find(\DB::table('transaksi')->max('trx_id'));
        if ($new_id > 0) {
              foreach ($new_id as $key) {
                $auto_id = $key->trx_id;              
              }
        }      
        return $this->get_newid($auto_id, 'WIN');      
     }
}

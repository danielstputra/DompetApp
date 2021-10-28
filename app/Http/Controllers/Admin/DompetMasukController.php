<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;

class DompetMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_verified']);
    }

    public function index()
    {
        $transaksi = Transaksi::join('dompet', 'dompet.dompet_id', '=', 'transaksi.dompet_id')
        ->join('dompet_status', 'dompet_status.status_id', '=', 'dompet.dompet_status_id')
        ->join('kategori', 'kategori.cat_id', '=', 'transaksi.cat_id')
        ->join('kategori_status', 'kategori_status.status_id', '=', 'kategori.cat_status_id')
        ->join('transaksi_status', 'transaksi_status.status_id', '=', 'transaksi.trx_status_id')

        ->get(['dompet.*', 'dompet_status.*', 'kategori.*', 'kategori_status.*', 'transaksi.*', 'transaksi_status.*']);
        return view('admin.dompet.masuk.index', compact('transaksi'));
    }

    public function create(Transaksi $transaksi)
    {
        $status = TransaksiStatus::all();
        return view('admin.dompet.masuk.create', compact('transaksi', 'status'));
    }

    public function store(Request $request, Transaksi $transaksi)
    {
        $validator = Validator::make($request->all(), [
            'trx_name' => 'required|min:5',
            'trx_deskripsi' => 'max:100',
            'trx_status' => 'required'
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

        $execute = $transaksi->create([
            'trx_name' => trim($transaksi_name),
            'trx_referensi' => intval($transaksi_referensi),
            'trx_deskripsi' => trim($transaksi_deskripsi),
            'trx_status_id' => intval($transaksi_status),
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

    public function get_kode(){
        $transaksi = new Transaksi();
        $new_id = $transaksi->get_idmax()->result();
        if ($new_id > 0) {
              foreach ($new_id as $key) {
                $auto_id = $key->id_mobil;              
              }
        }      
        return $id_mobil = $transaksi->get_newid($auto_id);      
     }
}

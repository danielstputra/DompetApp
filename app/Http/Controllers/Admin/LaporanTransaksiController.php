<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dompet;
use App\Models\DompetStatus;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;
use App\Models\Kategori;
use App\Models\KategoriStatus;

class LaporanTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_verified']);
    }

    public function index()
    {
        $dompet = Dompet::join('dompet_status', 'dompet.dompet_status_id', '=', 'dompet_status.status_id')->where('dompet_status.status_name', 'Aktif')->get(['dompet.*']);
        $kategori = Kategori::join('kategori_status', 'kategori.cat_status_id', '=', 'kategori_status.status_id')->where('kategori_status.status_name', 'Aktif')->get(['kategori.*']);

        return view('admin.laporan.index', compact('dompet', 'kategori'));
    }
}

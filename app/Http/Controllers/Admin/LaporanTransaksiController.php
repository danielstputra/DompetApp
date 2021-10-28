<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Carbon\Carbon;

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

    public function index(Request $request)
    {
        $dompet = Dompet::join('dompet_status', 'dompet.dompet_status_id', '=', 'dompet_status.status_id')->where('dompet_status.status_name', 'Aktif')->get(['dompet.*']);
        $kategori = Kategori::join('kategori_status', 'kategori.cat_status_id', '=', 'kategori_status.status_id')->where('kategori_status.status_name', 'Aktif')->get(['kategori.*']);

        if ($request->start_date || $request->end_date || $request->kategori || $request->dompet)
        {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();

            $data = Transaksi::join('dompet', 'dompet.dompet_id', '=', 'transaksi.dompet_id')
            ->join('kategori', 'kategori.cat_id', '=', 'transaksi.cat_id')
            ->where('transaksi.cat_id', $request->kategori)
            ->where('transaksi.dompet_id', $request->dompet)
            ->whereBetween('transaksi.created_at', [$start_date, $end_date])
            ->get([
                'kategori.cat_id', 
                'kategori.cat_name', 
                'dompet.dompet_id',
                'dompet.dompet_name',
                'transaksi.*'
            ]);
        }
        else
        {
            $data = Transaksi::join('dompet', 'dompet.dompet_id', '=', 'transaksi.dompet_id')
            ->join('kategori', 'kategori.cat_id', '=', 'transaksi.cat_id')
            ->latest()
            ->get([
                'kategori.cat_id', 
                'kategori.cat_name', 
                'dompet.dompet_id',
                'dompet.dompet_name',
                'transaksi.*'
            ]);
        }

        return view('admin.laporan.index', compact('dompet', 'kategori', 'data'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Dompet;
use App\Models\DompetStatus;

class DompetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_verified']);
    }

    public function index()
    {
        $dompets = Dompet::join('dompet_status', 'dompet.dompet_status_id', '=', 'dompet_status.status_id')
        ->get(['dompet.*', 'dompet_status.status_name']);
        return view('admin.dompet.index', compact('dompets'));
    }

    public function create(Dompet $dompets)
    {
        $status = DompetStatus::orderBy('name')->get();
        return view('admin.dompet.create', compact('dompets', 'status'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'dompet_name' => 'required|min:5',
            'dompet_deskripsi' => 'max:100'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.dompet.create')->withErrors($validator)->withInput();
        }

        $dompet_name = $request->get('dompet_name');
        $dompet_referensi = $request->get('dompet_referensi');
        $dompet_deskripsi = $request->get('dompet_deskripsi');
        $dompet_status = $request->get('dompet_status');
  
        $execute = Dompet::create([
            'name' => trim($dompet_name),
            'reference' => trim($dompet_referensi),
            'description' => trim($dompet_deskripsi),
            'dompet_status_id' => intval($dompet_status)
        ]);

        if ($execute) {
            return redirect()->route('admin.dompet.index')->with('success', 'Data dompet telah ditambahkan');
        } else {
            return redirect()->route('admin.dompet.index')->with('error', 'Terjadi kesalahan saat melakukan tambah data dompet!');
        }
    }
}

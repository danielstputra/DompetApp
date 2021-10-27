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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dompets = Dompet::join('dompet_status', 'dompet.dompet_status_id', '=', 'dompet_status.status_id')
        ->get(['dompet.dompet_id', 'dompet.dompet_name', 'dompet.dompet_reference', 'dompet.dompet_description', 'dompet.dompet_status_id', 'dompet_status.status_name']);
        $status = DompetStatus::all();

        if ($request->ajax()) {
            return Datatables::of($dompets)->make(true);
        }
        
        return view('admin.dompet.index', compact('dompets', 'status'));
    }
}

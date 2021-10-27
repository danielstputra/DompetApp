<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DataTables;
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
            return Datatables::of($dompets)
            ->addIndexColumn()
            ->addColumn('status', function($row){
                if($row->status){
                    return '<span class="badge badge-primary">Active</span>';
                }else{
                    return '<span class="badge badge-danger">Deactive</span>';
                }
            })
            ->filter(function ($instance) use ($request) {
                if ($request->get('status') == '0' || $request->get('status') == '1' || $request->get('status') == '2') {
                    $instance->where('status', $request->get('status'));
                }

                if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                        $search = $request->get('search');

                        $w->orWhere('name', 'LIKE', "%$search%")
                        ->orWhere('reference', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%");
                    });
                }
            })
            ->rawColumns(['status'])
            ->make(true);
        }
        
        return view('admin.dompet.index', compact('dompets', 'status'));
    }
}

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
        $status = DompetStatus::all();
        $dompets = Dompet::all();
        $data = Dompet::select('*');

        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($instance) use ($request) {
                if ($request->get('statusCode') == '1' || $request->get('statusCode') == '2') {
                    $instance->where('dompet_status_id', $request->get('statusCode'));
                } else {
                    $instance->where('dompet_status_id', '!=', $request->get('statusCode'));
                }
            })
            ->addColumn('dompet_status_id', function($row) {
                if ($row->dompet_status_id == '1') {
                    return 'Aktif';
                } elseif($row->dompet_status_id == '2') {
                    return 'Tidak Aktif';
                } else {
                    return '';
                }
            })
            ->addColumn('action', function($row){
                $status = '';
                if ($row->dompet_status_id != '1') {
                    $status = 'Aktif';
                } elseif($row->dompet_status_id != '2') {
                    $status = 'Tidak Aktif';
                } else {
                    $status = '';
                }

                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">'.$row->dompet_name.'</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="'.route('admin.dompet.show', $row->dompet_id).'">Detail</a></li>
                        <li><a class="dropdown-item" href="'.route('admin.dompet.edit', $row->dompet_id).'">Ubah</a></li>
                        
                        <li><a class="dropdown-item" href="'.route('admin.dompet.status', $row->dompet_id).'">'.$status.'</a></li>
                    </ul>
                </div>';
            })
            ->rawColumns(['dompet_status_id', 'action'])
            ->make(true);
        }
        
        return view('admin.dompet.index', compact('dompets', 'status'));
    }

    public function edit(Dompet $dompet)
    {
        return view('admin.dompet.edit', compact('dompet'));
    }

    public function show(Dompet $dompet)
    {
        return view('admin.dompet.show', compact('dompet'));
    }
}

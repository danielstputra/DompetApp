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

                if (!empty($request->get('search'))) {
                    $instance->where(function($w) use($request){
                       $search = $request->get('search');
                       $w->orWhere('dompet_name', 'LIKE', "%$search%")
                       ->orWhere('dompet_reference', 'LIKE', "%$search%")
                       ->orWhere('dompet_description', 'LIKE', "%$search%");
                   });
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
                        <li><a class="dropdown-item" href="#">'.$status.'</a></li>
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
        $status = DompetStatus::all();
        return view('admin.dompet.edit', compact('dompet', 'status'));
    }

    public function update(Request $request, Dompet $dompet)
    {
        $validator = Validator::make($request->all(), [
            'dompet_name' => 'min:5',
            'dompet_deskripsi' => 'max:100',
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $dompet_name = $request->get('dompet_name');
        $dompet_referensi = $request->get('dompet_referensi');
        $dompet_deskripsi = $request->get('dompet_deskripsi');
        $dompet_status = $request->get('dompet_status');

        $execute = $dompet->update([
            'dompet_name' => trim($dompet_name),
            'dompet_referensi' => intval($dompet_referensi),
            'dompet_deskripsi' => trim($dompet_deskripsi),
            'dompet_status_id' => trim($dompet_status),
        ]);

        if ($execute) {
            return redirect()->route('admin.dompet.index')->with('success','Dompet berhasil diubah!');
        } else {
            return redirect()->route('admin.dompet.index')->with('error', 'Terjadi kesalahan saat melakukan ubah data dompet!');
        }
    }

    public function show(Dompet $dompet)
    {
        return view('admin.dompet.show', compact('dompet'));
    }
}

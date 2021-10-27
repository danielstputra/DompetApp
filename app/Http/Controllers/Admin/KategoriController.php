<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_verified']);
    }

    public function index(Request $request)
    {
        $status = KategoriStatus::all();
        $kategori = Kategori::all();
        $data = Kategori::select('*');

        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($instance) use ($request) {
                if ($request->get('statusCode') == '1' || $request->get('statusCode') == '2') {
                    $instance->where('kategori_status_id', $request->get('statusCode'));
                } else {
                    $instance->where('kategori_status_id', '!=', $request->get('statusCode'));
                }

                if (!empty($request->get('search'))) {
                    $instance->where(function($w) use($request){
                       $search = $request->get('search');
                       $w->orWhere('kategori_name', 'LIKE', "%$search%")
                       ->orWhere('kategori_reference', 'LIKE', "%$search%")
                       ->orWhere('kategori_description', 'LIKE', "%$search%");
                   });
               }
            })
            ->addColumn('kategori_status_id', function($row) {
                if ($row->kategori_status_id == '1') {
                    return 'Aktif';
                } elseif($row->kategori_status_id == '2') {
                    return 'Tidak Aktif';
                } else {
                    return '';
                }
            })
            ->addColumn('action', function($row){
                $status = '';
                if ($row->kategori_status_id != '1') {
                    $status = 'Aktif';
                } elseif($row->kategori_status_id != '2') {
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
                        <li><a class="dropdown-item" href="#">'.$row->kategori_name.'</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="'.route('admin.kategori.show', $row->kategori_id).'">Detail</a></li>
                        <li><a class="dropdown-item" href="'.route('admin.kategori.edit', $row->kategori_id).'">Ubah</a></li>
                        <li><a class="dropdown-item" href="#">'.$status.'</a></li>
                    </ul>
                </div>';
            })
            ->rawColumns(['kategori_status_id', 'action'])
            ->make(true);
        }
        
        return view('admin.kategori.index', compact('kategori', 'status'));
    }
}

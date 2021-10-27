<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dompet;

class DompetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_verified']);
    }

    public function index()
    {
        return view('admin.dompet.index');
    }

    public function create(Dompet $dompets)
    {
        return view('admin.dompet.create', compact('dompets'));
    }
}

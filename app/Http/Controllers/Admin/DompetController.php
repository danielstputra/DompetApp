<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

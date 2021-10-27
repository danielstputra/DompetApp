<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_verified']);
    }

    public function index()
    {
        //
        $users = User::where('id', Auth::user()->id)->first();
        return view('admin.dashboard', compact('users'));
    }
}

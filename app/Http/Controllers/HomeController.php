<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class HomeController extends Controller
{
    private $config;

    public function __construct()
    {
        // $data = [
        //     'agenda' => Agenda::latest()->take(2)->get(),
        //     'artikel' => Artikel::with(['user','kategoriArtikel'])->latest()->take(2)->get(),
        //     'pengumuman' => Pengumuman::with(['user'])->latest()->take(2)->get(),
        // ];

        $this->config = Configuration::first();
    }

    public function index()
    {
        $config = $this->config;
    	return view('home.index', compact('config'));
    }

    public function about()
    {
    	return view('home.about');
    }

    public function contact()
    {
    	return view('home.contact');
    }
}

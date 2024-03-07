<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class BukuController extends Controller
{
    public $buku;
    public function __construct()
    {
        $this->buku = new Buku();
    }
   
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    
    public function create()
    {
        // ngambil seluruh data dari tabel kategori 
        $kategori = Penerbit::all();
        return view('buku.create',compact('kategori'));

       

    }
}

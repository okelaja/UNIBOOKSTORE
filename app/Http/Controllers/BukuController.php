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
        $data = Buku::all();
        return view('buku.index', compact('data'));
    }

    
    public function create()
    {
        $data = Penerbit::all();
        return view('buku.create',compact('data'));
    }


    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|max:20|min:3|unique:buku,kode',
            'nama_buku' => 'required|max:20|min:3|unique:buku,nama_buku',
            'kategori' => 'required|max:20|min:3|',
            'harga' => 'required|max:20|min:3|',
            'stok' => 'required|',
            'penerbit' => 'required|'

        ];
        
        $messages = [
            'required' => ':attribute gak boleh kosong maseeeh',
            'max' => ':attribute maximal 20',
            'min' => ':attribute minimal 3',
            'unique' => ':attribute sudah ada'
        ];
        

        $this->validate($request, $rules, $messages);

        $this->buku->kode = $request->kode;
        $this->buku->nama_buku = $request->nama_buku;
        $this->buku->kategori = $request->kategori;
        $this->buku->harga = $request->harga;
        $this->buku->stok = $request->stok;
        $this->buku->penerbit = $request->penerbit;
        
        $this->buku->save();

        Alert::success('Success', 'Data Sudah di tambahkan');
        return redirect()->route('buku');
    }

    public function show ()  
    {
        
    }

    public function edit(string $id)
    {
        $buku = Buku::findorfail($id);
        $data = Penerbit::findorfail($id);
        return view('buku.edit',compact('buku','data'));   
    }

    public function update(Request $request, string $id)
    {
        $update = Buku::findorfail($id);
        
        $rules = [
            // ini rulse bagus
            'kode' => 'required|max:20|min:3|unique:penerbit,kode',
            // 'nama' => 'required|max:20|min:3|unique:penerbit,nama',
            // 'alamat' => 'required|max:20|min:3|unique:penerbit,alamat',
            // 'kota' => 'required|max:20|min:3|unique:penerbit,kota',
            // 'telepon' => 'required|max:20|min:3|unique:penerbit,telepon',
            
            //ini ngak 
            // 'kode' => 'required|max:20|min:3',
            'nama' => 'required|max:20|min:3',
            'alamat' => 'required|max:20|min:3',
            'kota' => 'required|max:20|min:3',
            'telepon' => 'required|max:20|min:3'
        ];
        
        $messages = [
            'required' => ':attribute gak boleh kosong maseeeh',
            'max' => ':attribute maximal 20',
            'min' => ':attribute minimal 3',
            'unique' => ':attribute sudah ada'
        ];
        

        $this->validate($request, $rules, $messages);


        $update->kode = $request->kode;
        $update->nama = $request->nama;
        $update->alamat = $request->alamat;
        $update->kota = $request->kota;
        $update->telepon = $request->telepon;

        $update->save();

        Alert::success('Successfull', 'Data Anda Berhasil Di Update');

        return redirect()->route('penerbit');
    }



    public function destroy($id)
    {
        $delete = Buku::findOrFail($id);
        
        $delete->delete();
        
        Alert::success('Successfull', 'Data Anda Berhasil Di Hapus');

        
        return redirect()->route('buku');
    }
    
}

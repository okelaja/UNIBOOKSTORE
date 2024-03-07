<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use RealRashid\SweetAlert\Facades\Alert;


class PenerbitController extends Controller

{
    public $penerbit;
    public function __construct()
    {
        $this->penerbit = new Penerbit();
    }
   
    public function index()
    {
        
        $data = Penerbit::all();
        return view('penerbit.index', compact('data'));
    }

    
    public function create()
    {
        $data = Penerbit::all();
        return view('penerbit.create',compact('data'));
    }

  
    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|max:20|min:3|unique:penerbit,kode',
            'nama' => 'required|max:20|min:3|unique:penerbit,nama',
            'alamat' => 'required|max:20|min:3|unique:penerbit,alamat',
            'kota' => 'required|max:20|min:3|',
            'telepon' => 'required|max:20|min:3|unique:penerbit,telepon'

        ];
        
        $messages = [
            'required' => ':attribute gak boleh kosong maseeeh',
            'max' => ':attribute maximal 20',
            'min' => ':attribute maximal 3',
            'unique' => ':attribute sudah ada'
        ];
        

        $this->validate($request, $rules, $messages);

        $this->penerbit->kode = $request->kode;
        $this->penerbit->nama = $request->nama;
        $this->penerbit->alamat = $request->alamat;
        $this->penerbit->kota = $request->kota;
        $this->penerbit->telepon = $request->telepon;
        
        $this->penerbit->save();

        Alert::success('Success', 'Data Sudah di tambahkan');
        return redirect()->route('penerbit');
    }

    
    public function show ()  
    {
        
    }

   
    public function edit(string $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit',compact('penerbit'));   
    }

    
    public function update(Request $request, string $id)
    {
        $update = Penerbit::findorfail($id);
        
        $rules = [
            // ini rulse bagus
            // 'kode' => 'required|max:20|min:3|unique:penerbit,kode',
            // 'nama' => 'required|max:20|min:3|unique:penerbit,nama',
            // 'alamat' => 'required|max:20|min:3|unique:penerbit,alamat',
            // 'kota' => 'required|max:20|min:3|unique:penerbit,kota',
            // 'telepon' => 'required|max:20|min:3|unique:penerbit,telepon'
            
            //ini ngak 
            'kode' => 'required|max:20|min:3',
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
        $delete = Penerbit::findOrFail($id);

        
        $delete->delete();
        
        Alert::success('Successfull', 'Data Anda Berhasil Di Hapus');

        
        return redirect()->route('penerbit');
    }
}

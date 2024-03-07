@extends('master.app')
@section('konten')
<div class="row">
    <div class="col-6">
        {{-- @if (Auth::user()->role == 'admin') --}}
            <a href="">
                <button type="button" class="btn btn-warning"><i class="fa fa-plus-circle pe-2"></i>Tambah Data</button>
            </a>
        {{-- @endif --}}
    </div>
    <div class="col-6">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="search" name="search" placeholder="Search..." class="form-control">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-search"></i>Cari
                </button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>DATA BUKU</h4>
            </div>
            <section class="section">
                <div class="row" id="basic-table">
                    <div class="col-12 col-md-12">
                        <div class="card">       
                            <div class="card-body">
                                <div class="table-responsive" style="margin-top:-3% ;">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>KODE</th>
                                                <th>KATEGORI</th>
                                                <th>NAMA BUKU</th>
                                                <th>HARGA</th>
                                                <th>STOK</th>
                                                <th>PENERBIT</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($buku as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->kode}}</td>
                                                <td class="text-bold-500">{{$item->kategori}}</td>
                                                <td>{{$item->nama_buku}}</td>
                                                <td class="text-bold-500">{{$item->harga}}</td>
                                                <td>{{$item->stok}}</td>
                                                <td>{{$item->penerbit->nama}}</td>
                                                <td class="">
                                                    <a href="">
                                                        <button class="btn btn-warning">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                    </a>
                                                    <a href="">
                                                        <button class="btn btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@extends('master.app')
@section('konten')
<div class="row">
    <div class="col-6">      
        <a href="{{ route('penerbit.create')}}">
            <button type="button" class="btn btn-warning"><i class="fa fa-plus-circle pe-2"></i>Tambah Data</button>
        </a>
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
                <h4>DATA PENERBIT</h4>
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
                                                <th>NAMA</th>
                                                <th>ALAMAT</th>
                                                <th>KOTA</th>
                                                <th>TELEPON</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $penerbit)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$penerbit->kode}}</td>
                                                <td class="text-bold-500">{{$penerbit->nama}}</td>
                                                <td>{{$penerbit->alamat}}</td>
                                                <td class="text-bold-500">{{$penerbit->kota}}</td>
                                                <td>{{$penerbit->telepon}}</td>
                                                <td>
                                                    <a href="{{ route('penerbit.edit',$penerbit->id) }}">
                                                        <button class="btn btn-warning">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{route('penerbit.delete',$penerbit->id) }}">
                                                        <button class="btn btn-danger"  onclick="return confirm('are you sure')" >
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {!!$data->withQueryString()->links('pagination::bootstrap-5')!!} --}}
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

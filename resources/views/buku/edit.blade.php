@extends('master.app')
@section('konten')
<div class="row mb-3">
    <div class="col-12 order-md-1 order-last">
        <div style="float: right">
            <a href="{{ route('buku') }}">
            <button class="btn btn-warning mt-2">
            <i class="fa fa-arrow-circle-left"></i> Kembali
            </button>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">EDIT DATA BUKU</h4>
                    </div>
                    <div class="card-body">
                        <small class="text-danger">* wajib di isi</small>
                        <form action="{{route('buku.update',$buku['id'])}}" class="form" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Kode</label>
                                        <input type="text" value="{{$buku['kode']}}" id="kode" class="form-control @error('kode') is-invalid @enderror"
                                            placeholder="Masukkan Kode" name="kode">
                                        @error('kode')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Nama Buku</label>
                                        <input type="text" value="{{$buku['nama_buku']}}" id="nama_buku" class="form-control @error('nama_buku') is-invalid @enderror"
                                            placeholder="Masukkan Nama Buku" name="nama_buku">
                                        @error('nama_buku')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Harga</label>
                                        <input type="text" value="{{$buku['harga']}}" id="harga" class="form-control @error('harga') is-invalid @enderror" 
                                            placeholder="Masukkan Harga"
                                            name="harga">
                                        @error('harga')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Stok</label>
                                        <input type="text" value="{{$buku['stok']}}" id="stok" class="form-control @error('stok') is-invalid @enderror"
                                            name="stok"
                                            placeholder="Masukkan Stok">
                                        @error('stok')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Penerbit</label>
                                        <select name="penerbit" id="penerbit" class="form-select @error('penerbit') is-invalid @enderror" aria-label="Default select example">
                                            <option hidden></option>
                                            @foreach ($data as $item)
                                                <option value="{{$item->id}}">{{$item->nama}}</option> 
                                            @endforeach
                                        </select>
                                        @error('penerbit')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group col-12">
                                    <div class='form-check'>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                            <label for="checkbox5">Remember Me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
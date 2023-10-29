@extends('layout.layout')
@section('title','Tambah Barang ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah data Barang Perusahaan
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="simpan">
                    @csrf
                    <div class="row">
                        <p>
                            <hr>
                    </div>
                    <div class="">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                
                                <input type="text" class="form-control" name="nama_barang" />
                            </div>
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" class="form-control" name="barcode" />
                            </div>
                            <div class="form-group">
                                <label>Foto Barang</label>
                                <input type="text" class="form-control" name="foto_barang" />
                                
                            </div>
                            <div class="col-md-4 mt-4 display-flex">
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
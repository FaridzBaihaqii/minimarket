@extends('layout.layout')
@section('title','Edit data ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Edit data Barang {{$barang->nama}}
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="simpan">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                        <p>
                            <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="hidden" name="id_barang" value="{{$barang->id_barang}}" />
                                <input type="text" class="form-control" name="nama" value="{{$barang->nama_barang}}"/>
                            </div>
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" class="form-control" name="barcode"  value="{{$barang->barcode}}"/>
                            </div>
                            <div class="form-group">
                                <label>Foto Produk</label>
                                <input type="text" class="form-control" name="alamat" value="{{$barang->foto_produk}}"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
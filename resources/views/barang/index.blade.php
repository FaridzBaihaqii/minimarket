@extends('layout.layout')
@section('title','Daftar Barang')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Data Barang Perusahaan
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="barang/tambah">
                            <btn class="btn btn-success">Tambah Barang</btn>
                        </a>

                    </div>
                    <p>
                        <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA BARANG</th>
                                    <th>BARCODE</th>
                                    <th>FOTO PRODUK</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $r)
                                <tr>
                                    <td>{{$r->nama_barang}}</td>
                                    <td>{{$r->barcode}}</td>
                                    <td>{{$r->foto_produk}}</td>
                                    <td>
                                        <a href="barang/edit/{{$r->id_barang}}"><btn class="btn btn-primary">EDIT</btn></a>
                                        <btn class="btn btn-danger btnHapus" idBarang="{{$r->id_barang}}">HAPUS</btn>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="module">
    $('.DataTable tbody').on('click','.btnHapus',function(a){
        a.preventDefault();
        let idBarang = $(this).closest('.btnHapus').attr('idBarang');
        //alert(id_cabang)
        swal.fire({
            title : "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result)=>{
            if(result.isConfirmed){
                //Ajax Delete
                $.ajax({
                    type: 'DELETE',
                    url: 'barang/hapus',
                    data: {
                        id_barang : idBarang,
                        _token : "{{csrf_token()}}"
                    },
                    success : function(data){
                        if(data.success){
                            swal.fire('Berhasil di hapus!', '', 'success').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                        }
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('.DataTable').DataTable();
    });
</script>

@endsection
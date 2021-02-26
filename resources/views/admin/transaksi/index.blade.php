@extends('admin.layout')
@section('title','Halaman Barang')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>DATA TRANSASKI</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Status</th>
                            <th>Total Transfer</th>
                            <th>Kode Unik</th>
                            <th>Batas Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $no=>$dt)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$dt->invoice}}</td>
                            <td>{{$dt->status}}</td>
                            <td>{{$dt->total_transfer}}</td>
                            <td>{{$dt->kode_unik}}</td>
                            <td>{{$dt->batas_pembayaran}}</td>
                            <td class="text-center">
                                <button data-id="{{$br->id}}" id="btn-edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                <button data-id="{{$br->id}}" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!---Container Fluid-->
</div>
@stop

<!-- Modal tambah -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambah" method="post">
                @csrf();
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="type" name="nama" id="nama" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit data -->
<!-- Modal tambah -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEdit" method="post">

            </form>
        </div>
    </div>
</div>
<!-- Modal detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body detail-barang">

            </div>
        </div>
    </div>
</div>
@section('javascript')
<script>
    $(document).ready(function() {
        //datatable
        let table = $('#datatable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            async: true
        })
    })
</script>

@stop
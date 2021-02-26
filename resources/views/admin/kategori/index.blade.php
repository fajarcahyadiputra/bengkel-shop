@extends('admin.layout')
@section('title','Halaman Barang')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>DATA KATEGORI BARANG</h5>
            <button data-toggle="modal" data-target="#modalTambahData" class="btn btn-success btn-sm">Tambah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $no=>$br)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$br->nama}}</td>
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
        //add data
        $(document).on('submit', '#formTambah', function(e) {
            e.preventDefault();
            const data = $(this).serialize();
            $.ajax({
                url: '/kategori',
                data: data,
                dataType: 'json',
                type: 'post',
                success: function(hasil) {
                    if (hasil) {
                        Swal.fire(
                            'sukses',
                            'sukses menambah data',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Gagal',
                            'gagal menambah data',
                            'error'
                        )
                    }
                    setTimeout(() => {
                        location.reload();
                    }, 800);
                }
            })
        })
        $(document).on('click', '#btn-hapus', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: `/kategori/${id}`,
                        method: 'delete',
                        data: {
                            "_token": "{{csrf_token()}}",
                        },
                        dataType: 'json',
                        success: function(hasil) {
                            console.log(hasil);
                            if (hasil) {
                                Swal.fire(
                                    'sukses',
                                    'sukses hapus data',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Gagal',
                                    'gagal hapus data',
                                    'error'
                                )
                            }
                            setTimeout(() => {
                                location.reload();
                            }, 800);
                        }
                    })
                }
            })
        })
        //btn show data
        $(document).on('click', '#btn-edit', function() {
            const id = $(this).data('id');
            $.ajax({
                url: `/kategori/${id}`,
                method: 'GET',
                data: {
                    "_token": "{{csrf_token()}}",
                },
                dataType: 'json',
                success: function(hasil) {
                    $(`#formEdit`).html(`@csrf()
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="type" name="nama" value="${hasil.nama}" id="nama" class="form-control">
                        <input type="hidden" value="${hasil.id}" id="id" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>`);
                    $('#modalEdit').modal('show');
                }
            })
        })
        //edit data
        $(document).on('submit', '#formEdit', function(e) {
            e.preventDefault();
            const data = $(this).serialize();
            const id = $('#id').val();
            $.ajax({
                url: `/kategori/${id}`,
                data: data,
                method: 'PUT',
                dataType: 'json',
                success: function(hasil) {
                    if (hasil) {
                        Swal.fire(
                            'sukses',
                            'sukses edit data',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Gagal',
                            'gagal edit data',
                            'error'
                        )
                    }
                    setTimeout(() => {
                        location.reload();
                    }, 800);
                }
            })
        })
        $(document).on('click', '#btn-detail', function() {
            const id = $(this).data('id');
            $.ajax({
                url: `/barang/${id}`,
                method: 'GET',
                data: {
                    "_token": "{{csrf_token()}}",
                },
                dataType: 'json',
                success: function(hasil) {
                    console.log(hasil);
                    $('.detail-barang').html(`<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input class="form-control" disabled readonly value="${hasil.nama}">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input class="form-control" disabled readonly value="${hasil.kode_barang}">
                        </div>
                        <div class="form-group">
                            <label for="">Kondisi</label>
                            <input class="form-control" disabled readonly value="${hasil.kondisi}">
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input class="form-control" disabled readonly value="${hasil.stok}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea class="form-control rows="5" disabled readonly>${hasil.deskripsi}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Status Aktif</label>
                            <input class="form-control" disabled readonly value="${hasil.status_aktif}">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input class="form-control" disabled readonly value="Rp.${hasil.harga}">
                        </div>
                        <div class="form-group">
                            <label for="">Berat</label>
                            <input class="form-control" disabled readonly value="${hasil.berat+' GRAM'}">
                        </div>
                    </div>
                </div>`);
                    $('#modalDetail').modal('show');
                }
            })
        })
    })
</script>

@stop
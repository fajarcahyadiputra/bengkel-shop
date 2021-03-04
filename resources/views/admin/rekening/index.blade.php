@extends('admin.layout')
@section('title','Halaman Barang')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>DATA REKENING</h5>
            <button data-toggle="modal" data-target="#modalTambahData" class="btn btn-success btn-sm">Tambah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Atas Nama</th>
                            <th>Nomer Rekning</th>
                            <th>Nama Bank</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rekening as $no=>$dt)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$dt->atas_nama}}</td>
                            <td>{{$dt->nomer_rekening}}</td>
                            <td>{{$dt->nama_bank}}</td>
                            <td><img width="200" src="{{URL::asset('foto/rekening/'. $dt->foto)}}" alt="foto rekening"></td>
                            <td class="text-center">
                                <button data-id="{{$dt->id}}" id="btn-edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                <button data-id="{{$dt->id}}" data-img="{{$dt->foto}}" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                <button data-id="{{$dt->id}}" data-img="{{$dt->foto}}" id="btn-edit-image" class="btn btn-warning btn-sm"><i class="fas fa-images"></i></button>
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

@section('modal')
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
            <form id="formTambah" name="formTambah" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="modal-body">
                    <div class="form-group">
                        <label for="atas_nama">Atas Nama</label>
                        <input required type="text" name="atas_nama" id="atas_nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomer_rekening">Nomer Rekening</label>
                        <input required type="number" name="nomer_rekening" id="nomer_rekening" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama_bank">Nama Bank</label>
                        <input required type="text" name="nama_bank" id="nama_bank" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input required type="file" name="foto" id="foto" class="form-control">
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
<!-- Modal edit foto -->
<div class="modal fade" id="modalEditFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditFoto" method="post" enctype="multipart/form-data">

            </form>
        </div>
    </div>
</div>
@stop

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
            const namaFoto = $('#foto').val();
            const data = new FormData(document.forms['formTambah']);
            if (!namaFoto.match(/.(jpg|jpeg|png|gif)$/i)) {
                Swal.fire(
                    'Opss',
                    'extensi file anda salah',
                    'warning'
                )
                return false;
            }
            $.ajax({
                url: '/rekening',
                data: data,
                dataType: 'json',
                type: 'post',
                processData: false,
                contentType: false,
                cache: false,
                async: true,
                success: function(hasil) {
                    if (hasil) {
                        $('#modalTambah').modal('hide');
                        Swal.fire(
                            'sukses',
                            'sukses tambah data',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Gagal',
                            'gagal tambah data',
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
            const img = $(this).data('img');
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Kamu Akan Menghapus Data Ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: `/rekening/${id}`,
                        method: 'delete',
                        data: {
                            "_token": "{{csrf_token()}}",
                            img
                        },
                        dataType: 'json',
                        success: function(hasil) {
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
                url: `/rekening/${id}`,
                method: 'GET',
                data: {
                    "_token": "{{csrf_token()}}",
                },
                dataType: 'json',
                success: function(hasil) {
                    $(`#formEdit`).html(`@csrf()
                <div class="modal-body">
                <div class="form-group">
                        <label for="atas_nama">Atas Nama</label>
                        <input required type="test" name="atas_nama" id="atas_nama" value="${hasil.atas_nama}" class="form-control">
                        <input  type="hidden" id="id" value="${hasil.id}" >
                    </div>
                    <div class="form-group">
                        <label for="nomer_rekening">Nomer Rekening</label>
                        <input required type="number" name="nomer_rekening" id="nomer_rekening" class="form-control" value="${hasil.nomer_rekening}" >
                    </div>
                    <div class="form-group">
                        <label for="nama_bank">Nama Bank</label>
                        <input required type="text" name="nama_bank" id="nama_bank" value="${hasil.nama_bank}"  class="form-control">
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
                url: `/rekening/${id}`,
                data: data,
                method: 'PUT',
                dataType: 'json',
                success: function(hasil) {
                    if (hasil) {
                        $("#modalEdit"), modal('hide')
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
        //edit image
        $(document).on('click', '#btn-edit-image', function() {
            const id = $(this).data('id');
            const img = $(this).data('img');
            $('#formEditFoto').html(`@csrf() <div class="modal-body edit-foto">
                    <div class="form-group">
                        <img width="300" src="{{URL::asset('foto/rekening')}}/${img}" alt="foto rekening" class="mb-3">
                        <input required type="file" name="foto" id="foto" class="form-control">
                        <input required type="hidden" name="id" value="${id}" class="form-control">
                        <input required type="hidden" name="foto_lama" value="${img}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>`);
            $('#modalEditFoto').modal('show');
        })
        //edit foto
        $(document).on('submit', '#formEditFoto', function(e) {
            e.preventDefault();
            const data = new FormData(document.querySelector('#formEditFoto'));
            $.ajax({
                url: `/rekening/edit-foto`,
                data: data,
                method: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: true,
                success: function(hasil) {
                    if (hasil) {
                        $("#modalEditFoto").modal('hide')
                        Swal.fire(
                            'sukses',
                            'sukses edit foto',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Gagal',
                            'gagal edit foto',
                            'error'
                        )
                    }
                    setTimeout(() => {
                        location.reload();
                    }, 800);
                }
            })
        })
    })
</script>

@stop
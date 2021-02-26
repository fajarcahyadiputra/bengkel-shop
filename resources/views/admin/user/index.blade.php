@extends('admin.layout')
@section('title','Page User')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>DATA PENGGUNA</h5>
            <div class="d-flex ">
                <select name="role" id="role" class="custom-select mr-2">
                    <option value="" disabled selected hidden>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <button data-toggle="modal" data-target="#modalTambahData" class="btn btn-success btn-sm">Tambah</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status Aktif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-user">
                        @foreach($data as $no=>$user)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$user->nama}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->status_aktif}}</td>
                            <td>
                                <button data-id="{{$user->id}}" id="btn-edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                <button data-id="{{$user->id}}" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                <button data-id="{{$user->id}}" id="btn-password" class="btn btn-warning btn-sm"><i class="fas fa-key"></i></button>
                                @if($user->role === 'user')
                                <button data-id="{{$user->id}}" id="btn-alamat" class="btn btn-warning btn-sm"><i class="fas fa-address-card"></i></button>
                                @endif
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
                        <label for="name">Nama</label>
                        <input type="type" name="nama" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <small id="error-email" class="text-danger">

                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" minlength="3">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" name="role" id="role" class="custom-select">
                            <option value="" disabled hidden selected>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
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
<!-- Modal ganti password -->
<div class="modal fade" id="modalGantiPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-ganti-password" method="post">

            </form>
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
        //role
        $(document).on('change', '#role', async function() {
            const role = $(this).val();
            const request = await fetch('/user?' + new URLSearchParams({
                findRole: true,
                role
            }));
            const data = await request.json();
            $('#table-user').html(``);
            if (data.length === 0) {
                $('#table-user').html(`<td class="text-center" colspan="6">Data Tidak Ada</td>`);
            }
            data.forEach((data, index) => {
                $('#table-user').append(`
                    <tr>
                        <td>${index +1}</td>
                        <td>${data.nama}</td>
                        <td>${data.email}</td>
                        <td>${data.role}</td>
                        <td>${data.status_aktif}</td>
                        <td>
                            <button data-id="${data.id}" id="btn-edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                            <button data-id="${data.id}" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            <button data-id="${data.id}" id="btn-password" class="btn btn-warning btn-sm"><i class="fas fa-key"></i></i></button>
                            ${
                                data.role === 'user'?
                                `<button data-id="${data.id}" id="btn-alamat" class="btn btn-warning btn-sm"><i class="fas fa-address-card"></i></button>`
                                :''
                            }
                        </td>
                    </tr>
                    `);
            })
        })
        //alamat user
        $(document).on('click', '#btn-alamat', function() {
            const idUser = $(this).data('id');

        })
        //add data
        $(document).on('submit', '#formTambah', function(e) {
            e.preventDefault();
            const data = $(this).serialize();
            checkEmail($('#email').val())
                .then(res => {
                    if (!res) {
                        $('#error-email').html(`email sudah di pakai`);
                        return false
                    }
                    $.ajax({
                        url: '/user',
                        data: data,
                        dataType: 'json',
                        type: 'post',
                        success: function(hasil) {
                            if (hasil) {
                                $('#modalTambah').modal('hide')
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
        })
        //check email
        async function checkEmail(email) {
            let message;
            await $.ajax({
                url: '/user/check-email',
                data: {
                    "_token": "{{csrf_token()}}",
                    'email': email
                },
                dataType: 'json',
                type: 'post',
                success: function(hasil) {
                    if (hasil.message === true) {
                        message = true;
                    } else {
                        message = false;
                    }
                }
            })
            return message;
        }
        $(document).on('click', '#btn-hapus', function() {
            const id = $(this).data('id');
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
                        url: `/user/${id}`,
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
                url: `/user/${id}`,
                method: 'GET',
                data: {
                    "_token": "{{csrf_token()}}",
                },
                dataType: 'json',
                success: function(hasil) {
                    $(`#formEdit`).html(` 
                @csrf();
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="type" name="nama" id="name" class="form-control" value="${hasil.nama}">
                        <input type="hidden" id="id" value="${hasil.id}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="${hasil.email}" id="email" class="form-control">
                        <small id="error-email" class="text-danger">

                        </small>
                    </div>

                    <div class="form-group">
                        <label for="status_aktif">Status Aktif</label>
                        <select name="status_aktif" name="status_aktif" id="status_aktif" class="form-control">
                            <option ${hasil.status_aktif === 'aktif'?'selected':''} value="aktif">Aktif</option>
                            <option ${hasil.status_aktif === 'tidak'?'selected':''} value="tidak">Tidak</option>
                        </select>
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
                url: `/user/${id}`,
                data: data,
                method: 'PUT',
                dataType: 'json',
                success: function(hasil) {
                    if (hasil) {
                        $('#modalEdit').modal('hide');
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
        $(document).on('click', '#btn-password', function() {
            const id = $(this).data('id');
            $('#form-ganti-password').html(`@csrf();
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="type" name="password" id="password" class="form-control">
                        <input type="hidden" id="id" name="id" class="form-control" value="${id}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>`);
            $('#modalGantiPassword').modal('show');
        })
        $(document).on('submit', '#form-ganti-password', function(e) {
            e.preventDefault();
            const data = $(this).serialize();
            $.ajax({
                url: `/user/ganti-password`,
                method: "POST",
                dataType: 'json',
                data: data,
                success: function(hasil) {
                    if (hasil) {
                        $('#modalEdit').modal('hide');
                        Swal.fire(
                            'sukses',
                            'sukses edit password',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Gagal',
                            'gagal edit password',
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
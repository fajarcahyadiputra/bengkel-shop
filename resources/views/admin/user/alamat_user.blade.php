@extends('admin.layout')
@section('title','Page User')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>DATA ALAMAT {{strtoupper($nama_user->nama)}}</h5>
            <div class="d-flex ">
                <a href="/user" class="btn btn-success btn-sm">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>NO HP</th>
                            <th>Kode Pos</th>
                        </tr>
                    </thead>
                    <tbody id="table-user">
                        @foreach($alamat as $no=>$dt)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$dt->nama_penerima}}</td>
                            <td>{{$dt->kecamatan}}</td>
                            <td>{{$dt->kabupaten}}</td>
                            <td>{{$dt->nomer_hp}}</td>
                            <td>{{$dt->kode_pos}}</td>
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
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambah" method="post">
                @csrf()
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
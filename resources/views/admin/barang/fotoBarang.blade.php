@extends('admin.layout')
@section('title','Halaman Barang')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>DATA FOTO BARANG</h5>
            <div class="d-flex">
                <a href="/barang"  class="btn btn-warning btn-sm mr-2">Back</a>
                <button data-toggle="modal" data-target="#modalTambahData" class="btn btn-success btn-sm">Tambah</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fotoBarang as $no=>$fb)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$fb->barang['nama']}}</td>
                            <td><img width="200" src="{{asset('foto/barang/'.$fb->foto)}}" alt=""></td>
                            <td>
                                <button data-id="{{$fb->id}}" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambah" method="post">
                @csrf()
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                        <input type="hidden" name="id_barang"  value="{{$barang_id}}">
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

        //add data
        $(document).on('submit', '#formTambah', function(e) {
            e.preventDefault();
            const data = new FormData(document.querySelector('#formTambah'));
            const foto = $('#foto').val();
            if(!foto.match(/.(jpg|png|jpeg|gift)$/i)){
                Swal.fire(
                    'Opss',
                    'extensi file anda salah',
                    'warning'
                )
                return false;
            }
            $.ajax({
                url: '/barang/tambah-foto',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: true,
                dataType: 'json',
                type: 'post',
                success: function(hasil) {
                    if (hasil) {
                        $('#modalTambahData').modal('hide')
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
                        url: `/barang/hapus-foto/${id}`,
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
    })
</script>

@stop
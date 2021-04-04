@extends('users.templet.index')
@section('title', 'Halaman Keranjang')
@section('css')
    <style>
        .box-product {
            display: grid;
            grid-template-columns: auto;
        }

        .info-product td {
            margin-left: 10px;
        }

        @media screen and(max-width: 600px) {
            .box-product {
                display: grid;
                grid-template-columns: 100%;
            }
        }

        .col-md-6 form {
            margin: 0;
            padding: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container" style=" margin-bottom: 100px;">
        <h3>Detail Transaksi</h1>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Status Transaksi</label>
                    <div class="alert alert-info">
                        <span class="font-weight-bold">{{ $transaksi->status }}</span>
                    </div>
                </div>
                <div class="col-md-6 ">
                    @if ($transaksi->status === 'pending')
                        <form name="formBuktiTransfer" id="formBuktiTransfer" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="bukti_transfer">Upload Bukti Transfer</label>
                            <div class="d-flex">
                                <input required type="hidden" name="id" value="{{ $transaksi->id }}">
                                <input required type="file" id="bukti_transfer" class="form-control" name="bukti_transfer">
                                <button type="submit" class="btn btn-success">Send</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="box-product">
                        @foreach ($transaksi->detailTransaksi as $detail)
                            @php
                                $foto_barang = $detail->barang->foto_barang[0];
                            @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-image m-3">
                                        <img width="500" class="img-thumbnail"
                                            src="{{ URL::asset('foto/barang/') . '/' . $foto_barang->foto }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="info-product m-3 p-3">
                                        <tr>
                                            <th>Nama</th>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>&nbsp;{{ $detail->nama_barang }}</td>
                                        </tr>
                                        <tr>
                                            <th>Barat</th>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>&nbsp;{{ $detail->berat }} gram</td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>&nbsp;{{ $detail->harga }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jumblah</th>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>&nbsp;{{ $detail->jumblah }} barang</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7 p-3">
                    <label for="">Total Yg Harus Di Tranfer</label>
                    <input class="btn-sm form-control" type="text" readonly disabled
                        value="Rp.{{ number_format($transaksi->tagihan + $transaksi->kode_unik, 0, ',', '.') }}">
                    <label for="">Bank Tujuan</label>
                    <input class="btn-sm form-control" type="text" readonly disabled
                        value="{{ $transaksi->rekening['nama_bank'] }}">
                    <label for="">Nomer Rekening Tujuan</label>
                    <input class="btn-sm form-control" type="text" readonly disabled
                        value="{{ $transaksi->rekening['nomer_rekening'] }}">
                    <label for="">Atas Nama</label>
                    <input class="btn-sm form-control" type="text" readonly disabled
                        value="{{ $transaksi->rekening['atas_nama'] }}">
                </div>
            </div>
            <a href="" class="btn btn-warning text-white">Back</a>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#formBuktiTransfer', function(e) {
                e.preventDefault();
                const data = new FormData(document.forms['formBuktiTransfer']);
                const namaFoto = $('#bukti_transfer').val();
                if (!namaFoto.match(/.(jpg|jpeg|png|gif)$/i)) {
                    Swal.fire(
                        'Opss',
                        'extensi file anda salah',
                        'warning'
                    )
                    return false;
                }
                $.ajax({
                    url: "{{ route('buktitransfer') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: true,
                    dataType: "JSON",
                    type: "POST",
                    success: function(result) {
                        if (result) {
                            Swal.fire(
                                'Sukses',
                                'anda berhasil upload bukti transfer',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Opss',
                                'anda gagal upload bukti transfer',
                                'warning'
                            )
                        }
                    }
                })
            })
        })

    </script>
@endsection

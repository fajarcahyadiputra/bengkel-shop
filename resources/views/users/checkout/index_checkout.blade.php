@extends('users.templet.index')
@section('title', 'Halaman Checkout')
@section('css')
    <style>
        .select2 {
            width: 100% !important;
            height: 30px !important;
        }

    </style>
@endsection
@section('content')
    <div class="container" style=" margin-bottom: 100px;">
        <h3>Halaman Checkout</h3>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a style="pointer-events: none;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                    role="tab" aria-controls="home" aria-selected="true">Alamat</a>
            </li>
            <li class="nav-item">
                <a style="pointer-events: none;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                    role="tab" aria-controls="profile" aria-selected="false">Pengiriman</a>
            </li>
            <li class="nav-item">
                <a style="pointer-events: none;" class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                    role="tab" aria-controls="contact" aria-selected="false">Pembayaran</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form id="formAlamat" method="post">
                    @csrf
                    <input type="hidden" name="alamat_id" value="{{ $alamat->id }}">
                    <div class="form-group">
                        <label for="nama_penerima">Nama Penerima</label>
                        <input required type="text" name="nama_penerima" class="form-control"
                            value="{{ isset(Session('transaksi')['alamat']) ? Session('transaksi')['alamat']['nama_penerima'] : $alamat->nama_penerima }}">
                    </div>
                    <div class="form-group">
                        <label for="nomer_hp">Nomer HP</label>
                        <input required type="text" name="nomer_hp" class="form-control"
                            value="{{ isset(Session('transaksi')['alamat']) ? Session('transaksi')['alamat']['nama_penerima'] : $alamat->nomer_hp }}">
                    </div>
                    <div class=" form-group">
                        <label for="provinsi">-- Pilih Provinsi --</label>
                        <input type="hidden" name="provinsi" value="{{ $alamat->provinsi }}">
                        <select required name="provinsi_id" id="provinsi" class="form-control">
                            @foreach ($provinsi as $prov)
                                <option {{ $prov['province_id'] == $alamat->prov_id ? 'selected' : '' }}
                                    value="{{ $prov['province_id'] }}">
                                    {{ $prov['province'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" form-group">
                        <label for="kabupaten">-- Pilih Kabupaten --</label>
                        <input type="hidden" name="kabupaten" value="{{ $alamat->kabupaten }}">
                        <select required name="kabupaten_id" id="kabupaten" class="form-control">
                            @foreach ($kabupaten as $kab)
                                <option {{ $kab['city_id'] == $alamat->kab_id ? 'selected' : '' }}
                                    value="{{ $kab['city_id'] }}">
                                    {{ $kab['city_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" form-group">
                        <label for="kecamatan">-- Pilih Kecamatan --</label>
                        <select required name="kecamatan" id="kecamatan" class="form-control">
                            @foreach ($kecamatan as $kec)
                                <option {{ $kec == $alamat->kecamatan ? 'selected' : '' }} value="{{ $kec }}">
                                    {{ $kec }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input required type="number" id="kode_pos" name="kode_pos" class="form-control"
                            value="{{ isset(Session('transaksi')['alamat']) ? Session('transaksi')['alamat']['kode_pos'] : $alamat->kode_pos }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea required name="alamat" id="alamat" class="form-control" cols="30"
                            rows="4">{{ isset(Session('transaksi')['alamat']) ? Session('transaksi')['alamat']['alamat'] : $alamat->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="patokan">Patokan</label>
                        <textarea required name="patokan" id="patokan" class="form-control" cols="30"
                            rows="4">{{ isset(Session('transaksi')['alamat']) ? Session('transaksi')['alamat']['patokan'] : $alamat->patokan }}</textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success text-white">Next</button>
                    </div>
                </form>
                <!--/. form element wrap -->

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <form id="formPengiriman" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="kurir">Kurir</label>
                        <select name="kurir" id="kurir" class="custom-select">
                            <option value="" disabled selected hidden>-- Pilih Kurir --</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS Indonesia</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pengiriman">Jenis Pengiriman</label>
                        <select name="jenis_pengiriman" id="jenis_pengiriman" class="custom-select">
                            <option value="" selected disabled hidden>-- Pilih Jenis Pengiriman --</option>
                        </select>
                    </div>
                    <div class="">
                        <a class="btn btn-danger btnPrevious text-white">Previous</a>
                        <button type="submit" class="btn btn-success">Next</button>
                    </div>
                </form>
                <!--/. form element wrap -->
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                <form id="formPembayaran" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="rekeningTujuan">Rekening Tujuan</label>
                        <select required class="custom-select" name="rekening_id" id="rekening_id">
                            <option value="" disabled selected hidden>-- Pilih Bank Tujuan --</option>
                            @foreach ($rekening as $rek)
                                <option
                                    {{ isset(Session('transaksi')['pembayaran']) ? (Session('transaksi')['pembayaran']['rekening_id'] == $rek->id ? 'selected' : '') : '' }}
                                    value="{{ $rek->id }}">{{ $rek->nama_bank }} -
                                    {{ $rek->nomer_rekening }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="atas_nama">Atas Nama</label>
                        <input required type="text" name="atas_nama" class="form-control"
                            value="{{ isset(Session('transaksi')['pembayaran']) ? Session('transaksi')['pembayaran']['atas_nama'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nomer_rekening">Nomer Rekening</label>
                        <input required type="text" name="nomer_rekening" class="form-control"
                            value="{{ isset(Session('transaksi')['pembayaran']) ? Session('transaksi')['pembayaran']['nomer_rekening'] : '' }}">
                    </div>
                    <div class="">
                        <a class=" text-white btn btn-danger btnPrevious">Previous</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>

                <!--/. form element wrap -->
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            //select2
            $('#provinsi').select2({
                placeholder: "--Pilih Provinsi--",
                selectOnClose: true
            });
            $('#kabupaten').select2({
                placeholder: "--Pilih Kabupaten/Kota--",
            });
            $('#kecamatan').select2({
                placeholder: "--Pilih Kecamatan--",
            });
            //tabs

            //ajax to push session alamat to session transaksi
            $(document).on('submit', '#formAlamat', function(e) {
                e.preventDefault();
                const dataAlamat = $(this).serialize() + '&isAlamat=true';
                $.ajax({
                    url: "{{ route('pushTransaksi') }}",
                    data: dataAlamat,
                    type: 'POST',
                    dataType: "JSON",
                    success: function(result) {
                        if (result) {
                            $('.nav-tabs .active').parent().next('li').find('a').trigger(
                                'click');
                        } else {
                            Swal.fire(
                                'Error!!',
                                'alamat tidak tersimpan...',
                                'error'
                            )
                        }
                    }
                })
            })
            //ajax push pengiriman to transaksi
            $(document).on('submit', '#formPengiriman', function(e) {
                e.preventDefault();
                const dataPengirin = $(this).serialize() + '&isPengeriman=true';
                $.ajax({
                    url: "{{ route('pushTransaksi') }}",
                    data: dataPengirin,
                    type: 'POST',
                    dataType: "JSON",
                    success: function(result) {
                        if (result) {
                            $('.nav-tabs .active').parent().next('li').find('a').trigger(
                                'click');
                        } else {
                            Swal.fire(
                                'Error!!',
                                'alamat tidak tersimpan...',
                                'error'
                            )
                        }
                    }
                })
            })
            $('.btnPrevious').click(function() {
                $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
            });
            //ajax to check cost kurir
            $(document).on('click', '#kurir', function(e) {
                const kurir = $(this).val();

                $.ajax({
                    url: "{{ route('checkCost') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        kurir
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(result) {
                        let costs = new Object(result[0].costs);
                        costs.forEach(cost => {
                            const option = document.createElement('option');
                            option.value = `${cost.service}-${cost.cost[0].value}`
                            option.innerHTML = `${cost.service}-${cost.cost[0].value}`
                            $('#jenis_pengiriman').append(option)
                        });
                    }
                })
            })
            //ajax for action add pembayaran in session
            $(document).on('submit', '#formPembayaran', function(e) {
                e.preventDefault();
                const dataPembayaran = $(this).serialize() + '&isPembayaran=true';

                $.ajax({
                    url: "{{ route('pushTransaksi') }}",
                    data: dataPembayaran,
                    type: 'POST',
                    dataType: "JSON",
                    success: function(result) {
                        console.log(result);
                        if (result.status) {
                            Swal.fire(
                                'Error!!',
                                'Transaksi Berhasil Di Buat...',
                                'success'
                            ).then(() => {
                                document.location.href =
                                    `/detail-transaksi/${result.id_transaksi}`;
                            })
                        } else {
                            Swal.fire(
                                'Error!!',
                                'Opss Gagal Membuat Transaksi...',
                                'error'
                            )
                        }
                    }
                })

            })
        });

    </script>
@endsection

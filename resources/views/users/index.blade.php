@extends('users.templet.index')
@section('title', 'Home Page')

@section('content')

    <!-- plant -->
    <div id="plant" class="section  product">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2><strong class="black"> Our</strong> Products</h2>
                        <span>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected randomised words which don't look even
                            slightly believable</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clothes_main section ">
        <div class="container">
            <div class="row box-product">
                @foreach ($barang as $mainIndex => $br)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="sport_product">
                            <figure>
                                <div id="carouselExampleControls{{ $mainIndex }}" class="carousel slide"
                                    data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($br->foto_barang as $index => $fotoBarang)
                                            <div class="carousel-item @if ($index==0) active @endif">
                                                <img src="{{ URL::asset('foto/barang/') . '/' . $fotoBarang['foto'] }}"
                                                    class="d-block w-100" alt="foto barang">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls{{ $mainIndex }}"
                                        role="button" data-slide="prev">
                                        <span style="background-color: black" class="carousel-control-prev-icon"
                                            aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls{{ $mainIndex }}"
                                        role="button" data-slide="next">
                                        <span style="background-color: black" class="carousel-control-next-icon"
                                            aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </figure>
                            <h3>Rp.<strong class="price_text">{{ number_format($br->harga, 0, ',', '.') }}</strong>
                            </h3>
                            <h4>{{ $br->nama }}</h4>
                            <div class="tombol-bawah d-flex justify-content-around">
                                <button data-id="{{ $br->id }}" id="addToCart" class="btn btn-primary mt-3">Add To
                                    Cart</button>
                                <button data-id="{{ $br->id }}" id="addToCart"
                                    class="btn btn-primary mt-3">Detail</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- end plant -->
    <!--about -->
    <div class="section about ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="titlepage">
                        <h2><strong class="black"> About</strong> Us</h2>
                        <span>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected randomised words which don't look even
                            slightly believable</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end about -->

    <!-- start Contact Us-->

    {{-- <div id="plant" class="contact_us layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2><strong class="black"> Contact</strong> Us</h2>
                        <span style="text-align: center;">available, but the majority have suffered alteration in some
                            form, by injected randomised words which don't look even slightly believable</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addToCart', function() {
                const idBarang = $(this).data('id');

                $.ajax({
                    url: `/add-to-cart/${idBarang}`,
                    type: "GET",
                    dataType: 'json',
                    success: function(result) {
                        if (result == true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses...',
                                text: 'sukses menambah ke kerajang',
                            })
                        } else if (result == 'notLogin') {
                            Swal.fire(
                                'Warning!!',
                                'anda harus login terlebih dahulu',
                                'warning'
                            )
                        } else {
                            Swal.fire(
                                'Warning!!',
                                'barang sudah ada di keranjang',
                                'warning'
                            )
                        }
                    }
                })
            })
            $(document).on('click', '#btn-seacrh', function() {
                const value = $('#input-search').val();
                $.ajax({
                    url: `/search-product?search=${value}`,
                    dataType: 'HTML',
                    type: "GET",
                    success: function(result) {
                        $('.box-product').html('');
                        $('.box-product').html(result);
                    }
                })
            })
        })

    </script>
@endsection
{{-- footer: '<a class="btn btn-primary btn-sm" href="/keranjang/{{ auth()->user()->id }}">Go To Cart?</a>' --}}

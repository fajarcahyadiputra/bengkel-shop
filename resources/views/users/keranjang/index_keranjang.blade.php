@extends('users.templet.index')
@section('title', 'Halaman Keranjang')
@section('css')
    <style>
        @charset "utf-8";

        #basket-subtotal,
        #basket-total {
            width: 180px;
        }

        strong {
            font-weight: bold;
        }

        p {
            margin: 0.75rem 0 0;
        }

        h1 {
            font-size: 0.75rem;
            font-weight: normal;
            margin: 0;
            padding: 0;
        }


        img,
        .basket-module,
        .basket-labels,
        .basket-product {
            width: 100%;
        }

        .basket,
        .basket-module,
        .basket-labels,
        .item,
        .price,
        .quantity,
        .subtotal,
        .basket-product,
        .product-image,
        .product-details {
            float: left;
        }


        .hide {
            display: none;
        }

        main {
            clear: both;
            font-size: 0.75rem;
            margin: 0 auto;
            overflow: hidden;
            padding: 1rem 0;
            width: 100%;
        }

        .basket,
        aside {
            padding: 0 1rem;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .basket {
            width: 70%;
        }

        .basket-module {
            color: #111;
        }

        label {
            display: block;
            margin-bottom: 0.3125rem;
        }


        .promo-code-field:hover,
        .promo-code-field:focus {
            border: 1px solid #999;
        }




        .item {
            width: 55%;
        }

        .price,
        .quantity,
        .subtotal {
            width: 25%;
        }

        .subtotal {
            text-align: right;
        }

        .remove {
            bottom: 1.125rem;
            float: right;
            right: 0;
            text-align: right;
            width: 45%;
        }

        .remove #btn-removeBarang {
            background-color: transparent;
            color: #777;
            float: none;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .item-heading {
            padding-left: 4.375rem;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .basket-product {
            border-bottom: 1px solid #ccc;
            padding: 1rem 0;
            position: relative;
        }

        .product-image {
            width: 35%;
        }

        .product-details {
            width: 65%;
        }

        .product-frame {
            border: 1px solid #aaa;
        }

        .product-details {
            padding: 0 1.5rem;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }


        aside {
            float: right;
            position: relative;
            width: 30%;
        }

        .summary {
            background-color: #eee;
            border: 1px solid #aaa;
            padding: 1rem;
            position: fixed;
            width: 250px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .summary-total-items {
            color: #666;
            font-size: 0.875rem;
            text-align: center;
        }

        .summary-subtotal,
        .summary-total {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            clear: both;
            margin: 1rem 0;
            overflow: hidden;
            padding: 0.5rem 0;
        }

        .subtotal-title,
        .subtotal-value,
        .total-title,
        .total-value,
        .promo-title,
        .promo-value {
            color: #111;
            float: left;
            width: 30%;
        }

        .promo-title {
            float: left;
            width: 70%;
        }

        .promo-value {
            color: #8B0000;
            float: left;
            text-align: right;
            width: 30%;
        }

        .summary-delivery {
            padding-bottom: 3rem;
        }

        .subtotal-value,
        .total-value {
            text-align: right;
        }

        .total-title {
            font-weight: bold;
            text-transform: uppercase;
        }

        .summary-checkout {
            display: block;
        }

        .checkout-cta {
            display: block;
            float: none;
            font-size: 0.75rem;
            text-align: center;
            text-transform: uppercase;
            padding: 0.625rem 0;
            width: 100%;
        }

        .summary-delivery-selection {
            background-color: #ccc;
            border: 1px solid #aaa;
            border-radius: 4px;
            display: block;
            font-size: 0.625rem;
            height: 34px;
            width: 100%;
        }

        @media screen and (max-width: 640px) {

            aside,
            .basket,
            .summary,
            .item,
            .remove {
                width: 100%;
            }


            .basket-labels {
                display: none;
            }

            .basket-module {
                margin-bottom: 1rem;
            }

            .item {
                margin-bottom: 1rem;
            }

            .product-image {
                width: 40%;
            }

            .product-details {
                width: 60%;
            }

            .price,
            .subtotal {
                width: 33%;
            }

            .quantity {

                width: 34%;
                float: right;
                margin-bottom: 10px;
            }

            .quantity-field {
                float: none;
            }


            .summary {
                margin-top: 1.25rem;
                position: relative;
            }
        }

        @media screen and (min-width: 641px) and (max-width: 960px) {
            aside {
                padding: 0 1rem 0 0;
            }

            .summary {
                width: 28%;
            }
        }

        @media screen and (max-width: 960px) {
            main {
                width: 100%;
            }

            .product-details {
                padding: 0 1rem;
            }
        }

    </style>
@endsection

@section('content')
    <div class="container" style=" margin-bottom: 100px;">
        <section>
            <main>
                @if ($keranjang == null)
                    <div class="alert alert-warning">
                        <h3>Anda Belum Menambahkan Barang Ke Keranjang</h3>
                    </div>
                @else
                    <div class="basket">
                        <div class="basket-labels">
                        </div>
                        @php
                            $subtotal = 0;
                            $totalBerat = 0;
                        @endphp
                        @foreach ($keranjang as $item)
                            @if ($item['user_id'] == auth()->user()->id)
                                @php
                                    $subtotal += $item['harga'] * $item['qty'];
                                    $totalBerat += $item['berat'];
                                @endphp
                                <div class="basket-product">
                                    <div class="item">
                                        <div class="product-image">
                                            <img height="250"
                                                src="{{ URL::asset('foto/barang/') . '/' . $item['foto']['foto'] }}"
                                                alt="Placholder Image 2" class="product-frame">
                                        </div>
                                        <div class="product-details">
                                            <h1><strong><span class="item-quantity">{{ $item['nama'] }}</h1>
                                            <p><strong>{{ $item['berat'] }} GRAM</strong></p>
                                            <p>Kode Barang - {{ $item['kode_barang'] }}</p>
                                        </div>
                                    </div>
                                    <div class="penengah">
                                        <div id="price" class="price">{{ number_format($item['harga'], 0, ',', '.') }}
                                        </div>
                                        <div class="quantity">
                                            <input data-id="{{ $item['id'] }}" type="number" value="{{ $item['qty'] }}"
                                                id="add-qty" class="form-control">
                                        </div>
                                    </div>
                                    <div class="remove">
                                        <button data-id="{{ $item['id'] }}" id="btn-removeBarang"
                                            class="btn btn-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <aside>
                        <form method="post" action="{{ route('goCheckout') }}">
                            @csrf
                            <div class="">
                                <div class="summary-subtotal">
                                    <div class="subtotal-title">Subtotal</div>
                                    <div class="subtotal-value final-value"> <input type="text" style="margin-right: 20px"
                                            readonly name="subtotal" id="basket-subtotal"></div>
                                    <div class="summary-promo hide">
                                        <div class="promo-title">Promotion</div>
                                        <div class="promo-value final-value" id="basket-promo"></div>
                                    </div>
                                </div>
                                <div class="summary-delivery">
                                    <h3>Catatan</h3>
                                    <textarea name="catatan" id="catatan" cols="30" rows="3"></textarea>
                                </div>
                                <div class="summary-total">
                                    <div class="total-title">Total</div>
                                    <div class="total-value final-value"><input name="total" type="text" id="basket-total"
                                            id="total" readonly></div>
                                    <input type="hidden" value="{{ $totalBerat }}" name="totalBerat">
                                </div>
                                <div class="summary-checkout">
                                    <button type="submit" class="checkout-cta">Go to Checkout</button>
                                </div>
                            </div>
                        </form>
                    </aside>
                @endif
            </main>
        </section>
    </div>
@endsection
@section('javascript')
    @if ($keranjang != null)
        <script>
            $(document).ready(function() {

                setSubTot({{ $subtotal }}, {{ $subtotal }});

                function setSubTot(subtotal, total) {
                    $('#basket-subtotal').val(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(subtotal))
                    $('#basket-total').val(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(total))
                }

                $(document).on('change keyup', '#add-qty', function() {
                    const qty = $(this).val();
                    const id = $(this).data('id');
                    $.ajax({
                        url: "{{ route('add-qty') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            qty,
                            id
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(result) {
                            setSubTot(result.subtotal, result.total)
                        }
                    })
                })
                $(document).on('click', '#btn-removeBarang', function() {
                    const id = $(this).data('id');

                    $.ajax({
                        url: `/hapus-barang/${id}`,
                        type: "GET",
                        dataType: 'JSON',
                        success: function(result) {
                            if (result) {
                                location.reload();
                            }
                        }
                    })
                })
            })

        </script>
    @else
        <script>
            $(document).ready(function() {
                Swal.fire(
                    'Warning!!',
                    'Keranjang Anda Masih Kosong..',
                    'warning'
                ).then(() => {
                    document.location.href = '/';
                })
            })

        </script>
    @endif
@endsection

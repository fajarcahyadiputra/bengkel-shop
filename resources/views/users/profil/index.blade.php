@extends("users.layouts.index")

@section('title', 'Header')

@section('contents')


    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <h2>Data Profil</h2>
            <div class="row mt-3">
                <div class="col-12">
                    <h1></h1>
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <form id="formRegister" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="type" name="nama" id="name" class="form-control">
                                                    <small id="error-nama" class="text-danger">

                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control">
                                                    <small id="error-email" class="text-danger">

                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" minlength="6">
                                                    <small id="error-password" class="text-danger">

                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirmation">Comfirm Password</label>
                                                    <input type="password" id="password_confirmation"
                                                        name="password_confirmation" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="avatar">Avatar</label>
                                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                                    <small id="error-avatar" class="text-danger">

                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <label for="provinsi">Provinsi</label>
                                                <select name="provinsi" id="provinsi" class="custom-select">
                                                    @foreach ($provinsi as $prov)
                                                        <option value="{{ $prov['province_id'] }}">
                                                            {{ $prov['province'] }}</option>
                                                    @endforeach
                                                </select>
                                                <small id="error-provinsi" class="text-danger">

                                                </small>

                                                <div class="form-group">
                                                    <label for="kabupaten">Kabupaten</label>
                                                    <select name="kabupaten" id="kabupaten" class="form-control">
                                                        @foreach ($kabupaten as $kab)
                                                            <option value="{{ $kab['city_id'] }}">
                                                                {{ $kab['city_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    <small id="error-kabupaten" class="text-danger">

                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kecamatan">Kecamatan</label>
                                                    <select style="width: 100%" name="kecamatan" id="kecamatan"
                                                        class="form-control">
                                                        @foreach ($kecamatan as $kec)
                                                            <option value="{{ $kec }}">
                                                                {{ $kec }}</option>
                                                        @endforeach
                                                    </select>
                                                    <small id="error-kecamatan" class="text-danger">

                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_pos">Kode Pos</label>
                                                    <input type="number" id="kode_pos" name="kode_pos" class="form-control">
                                                    <small id="error-kode" class="text-danger">

                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomer_hp">Nomer Handphone</label>
                                                    <input type="text" id="nomer_hp" name="nomer_hp" class="form-control">
                                                    <small id="error-nomer" class="text-danger">

                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    {{-- <label for="jenis_kelamin">Jenis Kelamin</label> --}}
                                                    <select name="jenis_kelamin" id="jenis_kelamin">
                                                        <option selected disabled hidden>Pilih Jenis Kelamin
                                                        </option>
                                                        <option value="perempuan">Perempuan</option>
                                                        <option value="laki-laki">Laki-laki</option>
                                                    </select>
                                                    <small id="error-jenis" class="text-danger">

                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                        <hr>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!--/ End Single Tab -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="https://via.placeholder.com/569x528" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="https://via.placeholder.com/569x528" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="https://via.placeholder.com/569x528" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="https://via.placeholder.com/569x528" alt="#">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Flared Shift Dress</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (1 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                    </div>
                                </div>
                                <h3>$29.00</h3>
                                <div class="quickview-peragraph">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad
                                        impedit pariatur
                                        esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option selected="selected">s</option>
                                                <option>m</option>
                                                <option>l</option>
                                                <option>xl</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Color</h5>
                                            <select>
                                                <option selected="selected">orange</option>
                                                <option>purple</option>
                                                <option>black</option>
                                                <option>pink</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000"
                                            value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="btn">Add to cart</a>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                <div class="default-social">
                                    <h4 class="share-now">Share:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->


@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $('#provinsi').select2({

            });
            $('#kabupaten').select2({
                placeholder: "--Pilih Kabupaten/Kota--",
                allowClear: true
            });
            $('#kecamatan').select2({
                placeholder: "--Pilih Kecamatan--",
                allowClear: true
            });
        })

    </script>
@endsection

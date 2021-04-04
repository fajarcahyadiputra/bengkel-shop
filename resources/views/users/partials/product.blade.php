 @if (count($barang) == 0)
     <div class="alert alert-warning" style="width: 100%">
         <h3>Produck Yang Anda Cari Tidak Ada</h3>
     </div>
 @else

     @foreach ($barang as $mainIndex => $br)
         <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
             <div class="sport_product">
                 <figure>
                     <div id="carouselExampleControls{{ $mainIndex }}" class="carousel slide" data-ride="carousel">
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
                     <button data-id="{{ $br->id }}" id="addToCart" class="btn btn-primary mt-3">Detail</button>
                 </div>
             </div>
         </div>
     @endforeach

 @endif

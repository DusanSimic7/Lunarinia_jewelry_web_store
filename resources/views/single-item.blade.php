@extends('layouts.app')

<!-- Default box -->
@section('content')
    <!-- Content Wrapper. Contains page content -->


    <div class="text-dark single-item-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header m-0 p-0">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        @if($item->in_stock == 0 and $item->available_to_make > 0)

                            <h2 class="font-antiqua text-white">Napomena!</h2>
                            <p class="font-antiqua m-0 text-white">Ovaj proizvod se radi samo po narudžbini i plaća se pre početka izrade.
                                    Prilikom naručivanja možete izabrati drugačiju boju ili lanac koji vam
                                    se više dopada (dobićete više informacija u imejlu).
                                    Ako želite da naručite ovaj proizvod i da nastavite kupovinu, kliknite
                                    na Dodaj u korpu.</p>

                        @endif

                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <?php $first_image = json_decode($item->image) ;?>





            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h1 class="d-inline-block d-sm-none font-allura text-dark">{{ $item->name }}</h1>
                            <div class="col-12">
                                <img src="/images/<?php echo $first_image[0] ;?>" class="product-image rounded" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                @foreach($first_image as $value)
                                    <div class="product-image-thumb" ><img src="/images/{{ $value }}" class="rounded cursor-grab" alt="Product Image"></div>

                                @endforeach
{{--                                <div class="product-image-thumb active"><img src="/images/<?php echo $first_image[0] ;?>" class="rounded cursor-grab" alt="Product Image"></div>--}}
{{--                                <div class="product-image-thumb" ><img src="/images/<?php echo $first_image[1] ;?>" class="rounded cursor-grab" alt="Product Image"></div>--}}
{{--                                <div class="product-image-thumb" ><img src="/images/<?php echo $first_image[2] ;?>" class="rounded cursor-grab" alt="Product Image"></div>--}}
{{--                                <div class="product-image-thumb" ><img src="/images/<?php echo $first_image[3] ;?>" class="rounded cursor-grab" alt="Product Image"></div>--}}
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h1 style="" class="my-3 font-allura text-dark ">{{ $item->name }}</h1>
                            <p style="font-size: 18px;" class="font-antiqua">{{ $item->description }}
                                Donec rutrum congue leo eget malesuada. Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus
                                orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada.
                                Proin eget tortor risus. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla porttitor accumsan tincidunt.
                            </p>

                            <hr>




                            <div class="py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    @if($item->discount > 0)

                                     <span class="text-danger text-center single-price-for-mob font-antiqua"> {{ $item->price - ($item->discount / 100 * $item->price) }},00 RSD</span>
                                            <span class="float-right text-danger single-price-for-mob"><p class="m-0">{{ $item->discount }}%</p></span>
                                       <br>
                                        <p class="m-0 single-price-for-mob font-antiqua"><strike>{{ $item->price }},00 RSD </strike></p>

                                    @else
                                        <p class="single-price-for-mob font-antiqua">{{ $item->price }},00 RSD</p>
                                    @endif
                                </h2>

                            </div>

                            <div class="mt-4">

                                <div class="btn-lg btn-flat">
                                @if($item->in_stock == 0 and $item->available_to_make == 0)
                                        <button type="submit" class="btn btn-default btn-lg disabled">Nije dostupna
                                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        </button>
                                @else
                                        <form class="add_to_cart">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button style="background: #850106" type="submit" class="btn btn-primary btn-lg">DODAJ U KORPU
                                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                            </button>
                                        </form>


                                @endif
                                </div>

                            </div>

{{--                            <div class="mt-4 product-share">--}}
{{--                                <a href="#" class="text-gray">--}}
{{--                                    <i class="fab fa-facebook-square fa-2x"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#" class="text-gray">--}}
{{--                                    <i class="fab fa-twitter-square fa-2x"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#" class="text-gray">--}}
{{--                                    <i class="fas fa-envelope-square fa-2x"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#" class="text-gray">--}}
{{--                                    <i class="fas fa-rss-square fa-2x"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}

                        </div>
                    </div>
{{--                    <div class="row mt-4">--}}
{{--                        <nav class="w-100">--}}
{{--                            <div class="nav nav-tabs" id="product-tab" role="tablist">--}}
{{--                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>--}}
{{--                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>--}}
{{--                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>--}}
{{--                            </div>--}}
{{--                        </nav>--}}
{{--                        <div class="tab-content p-3" id="nav-tabContent">--}}
{{--                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>--}}
{{--                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>--}}
{{--                            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <!-- /.card-body -->
            </div>


            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection


{{--@section('content')--}}

{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}

{{--        <!-- Default box -->--}}
{{--        <div class="card card-solid">--}}
{{--            <div class="card-body p-4">--}}
{{--                <div class="row">--}}
{{--                    <div class=" col-sm-12 col-md-6 p-5">--}}
{{--                        <div class="div-for-height"></div>--}}

{{--                        <h3 class="d-md-none single-item-name font">{{ $item->name }}</h3>--}}

{{--                            <div class="text-center"><img class="single-image-width" src="/svg/{{ $item->image }}"  class="rounded" alt="Product Image"></div>--}}

{{--                        <div class="col-12 d-flex text-center px-5 pt-2">--}}
{{--                            <div class=""><img class="single-image-width2"  src="/svg/{{ $item->image }}" alt="Product Image"></div>--}}
{{--                            <div class=""><img class="single-image-width2"  src="/svg/{{ $item->image }}" alt="Product Image"></div>--}}
{{--                            <div class=""><img class="single-image-width2"  src="/svg/{{ $item->image }}" alt="Product Image"></div>--}}
{{--                            <div class=""><img class="single-image-width2"  src="/svg/{{ $item->image }}" alt="Product Image"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 col-md-6 p-5">--}}
{{--                        <div class="div-for-height"></div>--}}

{{--                        <h3 class="my-3 font">{{ $item->name }}</h3>--}}
{{--                        <p>{{ $item->description }}</p>--}}
{{--                        <p>Quisque velit nisi, pretium ut lacinia in, elementum id enim.--}}
{{--                            Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet,--}}
{{--                            consectetur adipiscing elit.</p>--}}
{{--                        <hr>--}}

{{--                        <div class="bg-gray py-2 px-3 mt-4">--}}
{{--                            <h2 class="mb-0">--}}
{{--                                @if($item->discount > 0)--}}

{{--                                    <span class="text-danger text-center single-price-for-mob"> {{ $item->price - ($item->discount / 100 * $item->price) }},00 RSD</span>--}}
{{--                                    <span class="float-right text-danger single-price-for-mob"><p class="m-0">{{ $item->discount }}%</p></span>--}}
{{--                                    <br>--}}
{{--                                    <p class="m-0 single-price-for-mob"><strike>{{ $item->price }},00 RSD </strike></p>--}}

{{--                                @else--}}
{{--                                    <p class="single-price-for-mob">{{ $item->price }},00 RSD</p>--}}
{{--                                @endif--}}
{{--                            </h2>--}}
{{--                            <h4 class="mt-0">--}}
{{--                            </h4>--}}
{{--                        </div>--}}

{{--                        <div class="mt-4">--}}
{{--                            <div class="btn btn-primary btn-lg btn-flat">--}}
{{--                                <form class="add_to_cart">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="id" value="{{ $item->id }}" >--}}
{{--                                    <button type="submit" class="btn btn-primary btn-lg">--}}
{{--                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>--}}
{{--                                        Dodaj u korpu--}}
{{--                                    </button>--}}
{{--                                </form>--}}

{{--                            </div>--}}

{{--                            <div class="btn btn-default btn-lg btn-flat">--}}
{{--                                <i class="fas fa-heart fa-lg mr-2"></i>--}}
{{--                                Add to Wishlist--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- /.card-body -->--}}


{{--        </div>--}}
{{--        <!-- /.card -->--}}

{{--                <h6 class="text-center mt-4 font">MOZDA STE ZAINTERESOVANI ZA</h6>--}}
{{--        <div class="row px-5 py-2">--}}
{{--            @foreach($four_items as $item)--}}
{{--                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-3 text-center">--}}
{{--                    <a href="{{ route('item.show', $item) }}"><img style="" class="single-item-four-images rounded" src="/svg/{{ $item->image }}" alt="ove"></a>--}}

{{--                    <p class="mb-1">{{ $item->name }}</p>--}}

{{--                    @if($item->discount > 0)--}}


{{--                        <span class="text-danger text-center"> {{ $item->price - ($item->discount / 100 * $item->price) }},00 RSD</span>--}}
{{--                        <span class="float-right text-danger"><p>{{ $item->discount }}%</p></span><br>--}}
{{--                        <p class="m-0"><strike>{{ $item->price }},00 RSD </strike></p>--}}



{{--                    @else--}}
{{--                        <p>{{ $item->price }},00 RSD</p>--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--            @endforeach--}}

{{--        </div>--}}

{{--    </section>--}}


{{--@endsection--}}

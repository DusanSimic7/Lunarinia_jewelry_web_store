@extends('layouts.app')


@section('content')

<!-- Image Slider -->
<div class="wrapper-slider">
    <div id="slides" class="carousel slide slider-height" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="svg/slider_image1.jpg" class="rounded" alt="">
                <div class="carousel-caption">
                    <h2 style="color: black" class="font-allura">Zagrli Lunu u sebi!</h2>

                </div>
            </div>
            <div class="carousel-item">
                <img src="svg/slider_image2.png" class="rounded" alt="">
                <div class="carousel-caption">
                    <h2 style="color: black" class="font-allura">Zagrli Lunu u sebi!</h2>

                </div>
            </div>
            <div class="carousel-item">
                <img src="svg/slider_image3.jpg" class="rounded" alt="">
                <div class="carousel-caption">
                    <h2 style="color: black" class="font-allura">Zagrli Lunu u sebi!</h2>

                </div>
            </div>
        </div>
    </div>
</div>





    <div class="container-fluid padding">
        <div class="row text-center pt-5">

            <div class="col-md-6 pb-4 under-slider">
                <a href="{{ route('collection.show', $collection[0]->collection_id) }}">
                    <img src="svg/{{ $collection[0]->image }}" width="450" class="img-fluid rounded" alt="">
                    <div class="carousel-caption under-slider">
                        <h3 style="color: #e2e3e6" class="font-antiqua bg-dark d-inline-block rounded p-2">{{ $collection[0]->name }}</h3>
                        <br>

                    </div>
                </a>
            </div>


            <div class="col-md-6 pb-4 under-slider">
                <a  href="/make_alone">

                <img src="svg/merkur1.jpg" width="450" class="img-fluid rounded" alt="">

                <div class="carousel-caption under-slider">
                    <h3 style="color: #e2e3e6" class="font-antiqua bg-dark d-inline-block rounded p-2">Kreirajte sami</h3>
                    <br>

                </div>
                </a>
            </div>

{{--            <div class="col-xs-12 col-sm-6 col-md-4 pb-4 ">--}}
{{--                <a href="{{ route('discount.show') }}">--}}
{{--                    <img src="svg/ljubicasti_mesec.jpg" class="img-fluid rounded" alt="">--}}
{{--                    <div class="carousel-caption under-slider">--}}
{{--                        <h3 style="color: #e2e3e6" class="font-antiqua">Favoriti</h3>--}}
{{--                        <button style="color: #e2e3e6" type="button" class="btn btn-outline-light btn-lg">--}}
{{--                            POGLEDAJ--}}
{{--                        </button>--}}

{{--                    </div>--}}
{{--                </a>--}}

{{--            </div>--}}


        </div>
        <hr class="my-4">
    </div>


    <div class="container-fluid padding text-white">
        <div class="row text-center color-link pb-3">
           <div class="col-12">
               <h1 style="color: #e2e3e6" class="text-center font-antiqua">Preporuka</h1>

           @foreach($products as $value)

                   <a style="color: #e2e3e6; font-size: 18px;" class="font-antiqua" href="{{ route('items.show', $value) }}">{{ $value->name }}</a> |

               @endforeach
           </div>
            <div class="div-for-border"></div>
        </div>
    </div>



    <div class="container-fluid padding">
        <div class="row">
            @foreach($four_items as $item)

                <?php $first_image = json_decode($item->image) ;?>


                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-3 text-center">
                    <a href="{{ route('item.show', $item) }}"><img height="200" width="200" class="img-fluid rounded" src="/images/<?php echo $first_image[0] ;?>" alt=""></a>
                    <p style="color: #e2e3e6; font-size: 23px;" class="mb-1 mt-2 font-allura">{{ $item->name }}</p>

                    @if($item->discount > 0)


                        <span class="text-danger text-center"> {{ $item->price - ($item->discount / 100 * $item->price) }},00 RSD</span>
                        <span class="float-right text-danger"><p>{{ $item->discount }}%</p></span><br>
                        <p class="m-0 font-antiqua text-white"><strike>{{ $item->price }},00 RSD </strike></p>



                    @else
                        <p style="color: #e2e3e6; font-size: 17px;" class="font-antiqua">{{ $item->price }},00 RSD</p>
                    @endif

                    @if($item->in_stock != 0)

                    <form class="add_to_cart">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button style="font-size: 15px;background: #850106" type="submit" class="btn font-antiqua text-white">DODAJ U KORPU</button>

                    </form>

                    @else
                            <button style="background-color: #313233;color:#fff" type="submit" class="btn btn-default btn-sm mb-3" disabled>Nije dostupna</button>
                            <br>
                    @if($item->available_to_make != 0)
                            <a href="{{ route('item.show', $item) }}" id="" class="button-color">Naruči</a>
                    @endif


                    @endif


                </div>

            @endforeach


        </div>

    </div>






@endsection




@extends('layouts.app')


@section('content')

    <div class="container-fluid padding">
        <div class="row text-center color-link pb-3">
            <div class="col-12">
                <h1 class="display-4 font-antiqua">{{ $collection->name }}</h1>
            </div>

            <div class="col-12">
                @foreach($products as $value)

                    <a style="color: #e2e3e6; font-size: 18px;" class="font-antiqua" href="{{ route('items.show', $value) }}">{{ $value->name }}</a> |

                @endforeach

                    <br><br>
                    <form action=" {{ route('collection.show', $collection)}}" method="get">
                        @csrf
                        <input type="hidden" name="available" value="{{$collection->id}}">
                        <button style="border:none;background: black; color:#e2e3e6; font-size: 18px;" type="submit" class="">Prikaži samo dostupne proizvode</button>
                    </form>
                    <a href="{{ route('collection.show', $collection->id) }}" style="border:none;background: black; color:#e2e3e6; font-size: 18px;" class="">Prikaži sve</a>

            </div>

        </div>
    </div>

 <div class="container-fluid padding">


    <div class="row">
        @foreach($items as $item)

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
                        @if($item->available_to_make != 0)
                            <a href="{{ route('item.show', $item) }}" id="" class="button-color">NARUČI</a><br> <br>
                            <button style="background-color: #313233;color:#fff" type="submit" class="btn btn-default btn-sm mb-3" disabled>Nema na stanju</button>
                        @else
                            <button style="background-color: #313233;color:#fff" type="submit" class="btn btn-default btn-sm mb-3" disabled>Nije dostupno</button>

                        @endif
                        <br>



                    @endif


                </div>
        @endforeach


    </div>
{{--     <div class="paginacija" style="margin-top:50px;"> {{ $items->links() }}</div>--}}


 </div>


@endsection

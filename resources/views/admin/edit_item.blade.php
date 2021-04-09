@extends('layouts.admin')







@section('content')
    {{--            @if (Route::has('login'))--}}
    {{--                <div class="top-right links">--}}
    {{--                    @auth--}}

    {{--                        <a href="{{ url('/home') }}">Home</a>--}}
    {{--                    @else--}}
    {{--                        <kurac></kurac>--}}
    {{--                        <a href="{{ route('login') }}">Login</a>--}}

    {{--                        @if (Route::has('register'))--}}
    {{--                            <a href="{{ route('register') }}">Register</a>--}}
    {{--                        @endif--}}
    {{--                    @endauth--}}
    {{--                </div>--}}
    {{--            @endif--}}








    <div class="container-fluid padding">
        <div class="row text-center color-link pb-3">
            <div class="col-12">
                <h1 class="text-center font">Svi proizvodi lunarinie</h1>

                <div class="div-for-toaster pt-5">
                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                @foreach($products as $value)

                    <a href="{{ route('items.show', $value) }}">{{ $value->name }}</a> |

                @endforeach
            </div>
            <div class="div-for-border"></div>
        </div>
    </div>



    <div class="container-fluid padding">
        <div class="row">
            @foreach($items as $item)

                <?php $first_image = json_decode($item->image) ;?>



                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-3 text-center">
                    <a href="{{ route('item.show', $item) }}"><img height="200" width="200" class="img-fluid rounded" src="/images/<?php echo $first_image[0] ;?>" alt=""></a>
                    <p class="mb-1 font-allura">{{ $item->name }}</p>
                    <hr class="mb-3">

                    @if($item->discount > 0)


                        <span class="text-danger text-center"> {{ $item->price - ($item->discount / 100 * $item->price) }},00 RSD</span>
                        <span class="float-right text-danger"><p>{{ $item->discount }}%</p></span><br>
                        <p class="m-0"><strike>{{ $item->price }},00 RSD </strike></p>



                    @else
                        <p>{{ $item->price }},00 RSD</p>
                    @endif
                    <span>Stanje: {{ $item->in_stock }}</span><br>

                    @if($item->in_stock == 0)

                        @if($item->available_to_make == 0)
                        <input type="hidden" name="id" value="{{ $item->id }}">
                            <button style="background-color: #313233;color:#fff" type="submit" class="btn btn-default btn-sm" disabled>Nije dostupna</button>
                        <br>
                        @else
                        <input type="hidden" name="id" value="{{ $item->id }}">
                            <button style="background-color: #313233;color:#fff" type="submit" class="btn btn-default btn-sm" disabled>Nema na stanju</button>
                        <br>
                        @endif
                    @endif

                    <a href="{{ route('edit.create', $item ) }}" class="btn btn-info mt-2">Izmeni</a><br>

                    <form class="d-inline-block" action="{{ route('delete.item', $item ) }}" method="post" onclick="return confirm('Da li ste sigurni?');">
                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger mt-1">Obriši</button>

                    </form>

                </div>

            @endforeach


        </div>
    </div>






@endsection




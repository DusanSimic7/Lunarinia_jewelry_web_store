@extends('layouts.app')


@section('content')

    <div class="text-center">
        <h1 class="m-0">Popusti do 50%</h1>

        <a href="">ogrlice</a> | <a href="">narukvice</a> | <a href="">mindjuse</a> | <a href="">prstenje</a>

    </div>

    <div class="container">


        <div class="row">
           @foreach($discount as $item)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-3 text-center">
                    <a href="{{ route('item.show', $item) }}"><img height="250" width="200" class="img-fluid rounded" src="/svg/{{ $item->image }}" alt=""></a>
                    <p class="mb-1">{{ $item->name }}</p>
                    <hr class="mb-3">

                    @if($item->discount > 0)


                        <span class="text-danger text-center"> {{ $item->price - ($item->discount / 100 * $item->price) }},00 RSD</span>
                        <span class="float-right text-danger"><p>{{ $item->discount }}%</p></span><br>
                        <p class="m-0"><strike>{{ $item->price }},00 RSD </strike></p>



                    @else
                        <p>{{ $item->price }},00 RSD</p>
                    @endif


                    <form class="add_to_cart">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-dark">Dodaj u korpu</button>
                    </form>
                </div>
            @endforeach


        </div>

    </div>


@endsection

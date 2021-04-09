@extends('layouts.app')


@section('content')

    <div class="container-fluid padding">
        <h1 class="text-center font-antiqua">Proizvodi</h1>
        <div class="row text-center color-link pb-3">

            @foreach($products as $value)
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-5">
                    <a href="{{ route('items.show', $value) }}">
                        <img src="svg/{{$value->image}}" class="img-fluid rounded collection-images" alt="">
                    </a>
                    <h4 style="font-size: 28px;" class="font-allura">{{$value->name}}</h4>


                </div>
            @endforeach

        </div>
    </div>





@endsection

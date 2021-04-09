@extends('layouts.admin')

@section('content')


    <div class="container-fluid padding">
        <div class="row text-center color-link pb-3">
            <div class="col-12">
                <h1 class="text-center font">Sve kolekcije lunarinie</h1>

                <div class="div-for-toaster pt-5">
                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>


            </div>
            <div class="div-for-border"></div>
        </div>
    </div>



    <div class="container-fluid padding">
        <div class="row">
            @foreach($collections as $collection)


                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-3 text-center">
                    <a href="{{ route('collection.show', $collection) }}"><img height="200" width="200" class="img-fluid rounded" src="/svg/{{$collection->image}}" alt=""></a>
                    <p class="mb-1 font-allura">{{ $collection->name }}</p>
                    <hr class="mb-3">

                    <form class="d-inline-block" action="{{ route('delete.collection', $collection) }}" method="post" onclick="return confirm('Da li ste sigurni?');">
                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger mt-1">Obriši</button>

                    </form>


                </div>

            @endforeach


        </div>
    </div>






@endsection




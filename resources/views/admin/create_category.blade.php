@extends('layouts.admin')



@section('content')

    <div class="div-for-toaster pt-5">
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Unesite novu kategoriju</h3>
        </div>


        <form method="post" action="{{ route('store.category') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <br>
            <input type="text" required name="kategorija"  class="form-control @error('kategorija') is-invalid @enderror" id="kategorija" placeholder="Unesi ime kategorije...">
            <div class="invalid-feedback">Molimo vas unesite kategoriju.</div>

            @error('kategorija')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mt-3">
                <label for="unesi_sliku">Unesi sliku</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" required  class="@error('slika') is-invalid @enderror" name="slika" id="unesi_sliku" placeholder="Unesi sliku"><br>

                    </div>

                </div>
                @error('slika')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="invalid-feedback">Molimo vas unesite sliku.</div>



            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Unesi</button>
            </div>
        </form>
    </div>



    <h3 class="text-center">Obriši kategoriju</h3>
    <form action="{{ route('destroy.category')}}" method="post">
        @csrf

        @method('DELETE')

        <select class="form-control" name="kategorija" id="kategorija">
            <option value=""><--Izaberite kategoriju--></option>

            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach

        </select>

        <button type="submit" class="btn btn-primary mt-3">Obriši</button>

    </form>


@endsection

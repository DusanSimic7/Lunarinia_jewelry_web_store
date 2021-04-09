@extends('layouts.admin')



@section('content')



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Unesite novu kolekciju</h3>
        </div>


        <form method="post" action="{{ route('store.collection') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <br>
            <input type="text" required name="kolekcija"  class="form-control @error('kolekcija') is-invalid @enderror" id="kolekcija" placeholder="Unesi ime kolekcije...">
            <div class="invalid-feedback">Molimo vas unesite kolekciju.</div>

            @error('kolekcija')
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

@endsection

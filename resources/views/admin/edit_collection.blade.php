@extends('layouts.admin')



@section('content')



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Izmeni glavnu kolekciju</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


        <form method="post" action="{{ route('update.mainCollection', $main_collection) }}" class="needs-validation" novalidate>

            @csrf
            @method('PUT')
            <div class="card-body">


                <div class="form-group">
                    <label for="vrsta_kolekcije">Vrsta kolekcije</label><br>

                    <select class="form-control @error('kolekcija') is-invalid @enderror" required name="kolekcija" id="vrsta_kolekcije">
                        <option value=""><--Izaberite kolekciju--></option>

                        @foreach($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                        @endforeach

                    </select>
                    <div class="invalid-feedback">Molimo vas izaberite kolekciju.</div>

                    @error('kolekcija')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Izmeni</button>
            </div>
        </form>
    </div>

@endsection

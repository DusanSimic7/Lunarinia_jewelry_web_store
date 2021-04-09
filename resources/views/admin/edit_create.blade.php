@extends('layouts.admin')



@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Izmenite proizvod <b>{{ $item->name }}</b></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('edit.item', $item) }}" enctype="multipart/form-data" class="needs-validation" novalidate>

            @method('PUT')
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="vrsta_proizvoda">Vrsta kategorije</label><br>

                    <select class="form-control @error('kategorija') is-invalid @enderror" required name="kategorija" id="vrsta_prizvoda">

                        <option value="{{ $selected_product->id }}"> {{ $selected_product->name }} </option>


                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach

                    </select>
                    <div class="invalid-feedback">Molimo vas izaberite kategoriju.</div>

                    @error('kategorija')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vrsta_kolekcije">Vrsta kolekcije</label><br>

                    <select class="form-control @error('kolekcija') is-invalid @enderror" required name="kolekcija" id="vrsta_kolekcije">
                        <option value="{{ $selected_collection->id }}">{{ $selected_collection->name }}</option>

                        @foreach($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                        @endforeach

                    </select>
                    <div class="invalid-feedback">Molimo vas izaberite kolekciju.</div>

                    @error('kolekcija')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ime_proizvoda">Ime proizvoda</label>
                    <input type="text" required name="ime" class="form-control @error('ime') is-invalid @enderror" value="{{ $item->name }}" id="ime_proizvoda" placeholder="Unesi ime proizvoda...">
                    <div class="invalid-feedback">Molimo vas unesite ime.</div>

                    @error('ime')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="opis_proizvoda">Opis proizvoda</label><br>
                    <textarea required class="form-control mt-0 @error('opis') is-invalid @enderror" name="opis"  id="opis_proizvoda" cols="50" rows="3"> {{ $item->description }}</textarea>
                    <div class="invalid-feedback">Molimo vas unesite opis.</div>

                    @error('opis')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cena_proizvoda">Cena proizvoda</label>
                    <input required type="text" name="cena" class="form-control @error('cena') is-invalid @enderror" id="cena_proizvoda" value="{{ $item->price }}" placeholder="Unesi cenu...">
                    <div class="invalid-feedback">Molimo vas unesite cenu.</div>

                    @error('cena')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="popust">Popust</label>
                    <input required type="text" name="popust" class="form-control @error('popust') is-invalid @enderror" id="popust" value="{{ $item->discount }}" placeholder="Unesi popust...">
                    <div class="invalid-feedback">Molimo vas unesite popust.</div>

                    @error('popust')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>




                <div class="form-group">
                    <label for="kolicina">Količina</label><br>
                    <input required type="number" name="kolicina" class="form-control @error('kolicina') is-invalid @enderror" value="{{$item->in_stock}}" id="kolicina" placeholder="Unesi količinu">
                    <div class="invalid-feedback">Molimo vas unesite količinu.</div>

                    @error('kolicina')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pravljenje">Mogućnost pravljenja</label><br>
                    <input required type="number" name="mogucnost" class="form-control @error('mogucnost') is-invalid @enderror" value="{{$item->available_to_make}}" id="mogucnost" placeholder="Unesi mogućnost pravljenja">
                    <div class="invalid-feedback">Molimo vas unesite mogućnost poručivanja.</div>

                    @error('mogucnost')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Unesi</button>
            </div>
        </form>
    </div>

@endsection

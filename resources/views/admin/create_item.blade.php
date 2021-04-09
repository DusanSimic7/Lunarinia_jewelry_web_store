@extends('layouts.admin')



@section('content')



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Dodaj nov proizvod</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="/post_item" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="vrsta_proizvoda">Vrsta kategorije</label><br>

                    <select class="form-control @error('kategorija') is-invalid @enderror" required name="kategorija" id="vrsta_prizvoda">
                        <option value=""><--Izaberite kategoriju--></option>

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

                    <select class="form-control"  name="kolekcija" id="vrsta_kolekcije">
                        <option value=""><--Izaberite kolekciju--></option>

                        @foreach($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group">
                    <label for="ime_proizvoda">Ime proizvoda</label>
                    <input type="text" name="ime" class="form-control @error('ime') is-invalid @enderror" required id="ime_proizvoda" placeholder="Unesi ime proizvoda...">
                    <div class="invalid-feedback">Molimo vas unesite ime.</div>

                    @error('ime')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="opis_proizvoda">Opis proizvoda</label><br>
                    <textarea class="form-control mt-0 @error('opis') is-invalid @enderror" required name="opis" id="opis_proizvoda" cols="50" rows="3" placeholder="Unesi opis proizvoda"></textarea>
                    <div class="invalid-feedback">Molimo vas unesite opis.</div>

                    @error('opis')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cena_proizvoda">Cena proizvoda</label>
                    <input type="text" name="cena" required class="form-control @error('cena') is-invalid @enderror" id="cena_proizvoda" placeholder="Unesi cenu...">
                    <div class="invalid-feedback">Molimo vas unesite cenu.</div>

                    @error('cena')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="unesi_glavnu_sliku">Unesi slike</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" required class="@error('slike') is-invalid @enderror" name="slike[]" multiple="multiple" id="unesi_glavnu_sliku" placeholder="Unesi slike"><br>
                            <br><div class="invalid-feedback">Molimo vas unesite slike.</div>

                        </div>

                    </div>
                    @error('slike')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kolicina">Mogućnost ponovnog pravljenja</label><br>
                    <input type="number" name="mogucnost" required class="form-control @error('mogucnost') is-invalid @enderror" id="mogucnost" placeholder="Unesi mogućnost ponovnog pravljenja">
                    <div class="invalid-feedback">Molimo vas unesite mogućnost pravljenja.</div>

                    @error('mogucnost')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kolicina">Količina</label><br>
                    <input type="number" name="kolicina" required class="form-control @error('kolicina') is-invalid @enderror" id="kolicina" placeholder="Unesi količinu">
                    <div class="invalid-feedback">Molimo vas unesite količinu.</div>

                    @error('kolicina')
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

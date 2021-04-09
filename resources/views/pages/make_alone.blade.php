@extends('layouts.app')


@section('content')


    <div class="container font-antiqua mt-5">


        <div style="font-size: 18px; max-width: 800px" class="mb-5 mt-5 m-auto">
                Želite sami da kreirate poklon za sebe ili neku dragu osobu? Sve što treba da uradite jeste da mi napišete svoju ideju
            u okviru kontakt forme na dnu strane i ja ću vam se javiti u što kraćem roku. :)
            <br>Poklon prema vašoj zamisli može da sadrži i pisamce,ručno rađenu čestitku, neku čokoladicu ili nešto drugo.
            <br>Javite se da zajedno kreiramo savršeni poklon. :)
            </p>
        </div>


        <form style="max-width: 700px" class="p-4 my-5 rounded needs-validation bg-dark m-auto" method="post" action="{{ route('contact.order') }}" novalidate>
            @csrf

            <label class="font-weight-normal" for="">Ime i prezime *</label>
            <input style="background: #e2e3e6" required class="form-control  @error('ime') is-invalid @enderror" type="text" name="ime">
            <div class="invalid-feedback font">Molimo vas da unesete svoje ime i prezime.</div>

            @error('ime')
            <div class="text-danger">{{ $message }}</div>
            <br>
            @enderror

            <label class="mt-3 font-weight-normal" for="">Imejl adresa *</label>
            <input style="background: #e2e3e6" required class="form-control @error('email') is-invalid @enderror"  type="text" name="email">
            <div class="invalid-feedback font">Molimo vas da unesete svoj imejl.</div>

            @error('email')
            <div class="text-danger">{{ $message }}</div>
            <br>
            @enderror


            <label class="mt-3 font-weight-normal" for="">Vaša poruka</label>

            <textarea style="background: #e2e3e6" required class="form-control @error('poruka') is-invalid @enderror" name="poruka" id="" cols="30" rows="7"></textarea>
            <div class="invalid-feedback font">Molimo vas da unesete svoju poruku.</div>

            @error('poruka')
            <div class="text-danger">{{ $message }}</div>
            <br>
            @enderror


            <input class="btn btn-outline-warning mt-3" type="submit" value="Pošalji poruku">

        </form>

    </div>



@endsection

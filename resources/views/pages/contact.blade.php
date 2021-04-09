@extends('layouts.app')


@section('content')


    <div class="container mt-5">

               <div style="font-size: 18px; max-width: 800px" class="mb-5 m-auto">
                   <p>Zdravo! :) <br><br>
                           Ukoliko imate pitanje na koje nije odgovoreno na stranici sa
                           <a class="text-info" href="/frequently_questions">Najčešćim pitanjima</a> ili biste da naručite nešto čega
                       još uvek nema na sajtu, popunite ovu kontakt formu i odgovoriću vam u što kraćem roku. :)
                   </p>
               </div>


            <div class="mt-5">


               <form style="max-width: 700px;" method="post" class="p-4 bg-dark my-5 rounded needs-validation m-auto mt-5" action="{{ route('contact.order') }}" novalidate>
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

                   <label class="mt-3 font-weight-normal" for="">Vaša poruka *</label>

                   <textarea style="background: #e2e3e6" required class="form-control @error('poruka') is-invalid @enderror" name="poruka" id="" cols="30" rows="7"></textarea>
                   <div class="invalid-feedback font">Molimo vas da unesete svoju poruku.</div>

                   @error('poruka')
                   <div class="text-danger">{{ $message }}</div>
                   <br>
                   @enderror

                   <input class="btn btn-outline-warning mt-3" type="submit" value="Pošalji poruku">

               </form>


            </div>

    </div>

{{--    <div style="background: darkgray; margin-top:60px;" class="container text-white rounded">--}}

{{--        <h1 class="text-center text-white pt-5">LET'S TALK</h1>--}}


{{--        <div style="width: 40%;" class="m-auto text-center bg-secondary--}}
{{--         rounded-top">--}}
{{--            <h4 class="pt-3">Contact us</h4>--}}
{{--            <p class="m-0 pb-3">Please fill this form in a decent manner</p>--}}
{{--        </div>--}}

{{--        <form class="m-auto pl-5 pr-5 pb-4 contact-form rounded-bottom" action="">--}}
{{--            <label class="mt-4" for="">IME *</label>--}}
{{--            <input class="form-control" type="text" name=""><br>--}}

{{--            <label class="m-0" for="">EMAIL *</label>--}}
{{--            <input class="form-control" type="text" name=""><br>--}}


{{--            <label class="m-0" for="">ZELELI STE NESTO DA PITATE? *</label>--}}

{{--            <textarea class="form-control" name="" id="" cols="30" rows="7"></textarea>--}}

{{--            <input class="btn btn-dark mt-3" type="submit" value="Submit">--}}

{{--        </form>--}}


{{--        <br><br>--}}


{{--    </div>--}}

@endsection

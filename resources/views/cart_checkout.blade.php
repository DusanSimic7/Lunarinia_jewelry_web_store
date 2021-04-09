@extends('layouts.app')


@section('content')

<div style="color: #fff;">


    <h2 class="text-center m-0 font-antiqua mt-4">Vaša korpa</h2>


    <div style="color: #e2e3e6" class="container-fluid p-5">


        <div class="card-body table-responsive p-0">

            <table id="table" class="table">
                <thead>
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Ime</td>
                        <td scope="col">Cena</td>
                        <td scope="col">Količina</td>
                        <td scope="col">Napomena</td>
                        <td scope="col">Ukupno</td>


                    </tr>
                </thead>

                <tbody class="tbody">


                </tbody>

            </table>
            <h6 class="total-cart"></h6>


        </div>

                @if(!isset(auth()->user()->firstname))

        <h3 class="text-center font-antiqua mt-5">Unesite svoje podatke</h3>
                @endif
        <div class="m-auto forma-checkout">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/store_order" class="needs-validation" data-toggle="validator" novalidate>
                @csrf

            @if(!isset(auth()->user()->firstname))

                <div class="card-body">


                    <div class="form-group m-0">
                                <label style="font-weight: normal" class="label-checkout" for="ime">Ime</label>
                                <input type="text" name="ime" required class="form-control @error('ime') is-invalid @enderror" id="ime" placeholder="Unesite ime">
                                <div style="font-size:15px;" class="invalid-feedback">Molimo vas da unesete ime.</div>

                            </div>
                    @error('ime')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror


                            <div class="form-group m-0 mt-2">
                                <label style="font-weight: normal" class="label-checkout" for="prezime">Prezime</label>
                                <input type="text" name="prezime" required class="form-control @error('prezime') is-invalid @enderror" id="prezime" placeholder="Unesite prezime">
                                <div style="font-size:15px;" class="invalid-feedback">Molimo vas da unesete prezime.</div>

                            </div>
                    @error('prezime')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror


                            <div class="form-group m-0 mt-2">
                                <label style="font-weight: normal" class="label-checkout" for="email">Imejl adresa</label>
                                <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Unesite imejl">
                                <div style="font-size:15px;" class="invalid-feedback">Molimo vas da unesete imejl adresu.</div>

                            </div>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror


                            <div class="form-group m-0 mt-2">
                                <label style="font-weight: normal" class="label-checkout" for="telefon">Telefon</label>
                                <input type="text" name="telefon" required class="form-control @error('telefon') is-invalid @enderror" id="telefon" placeholder="Unesite telefon">
                                <div style="font-size:15px;" class="invalid-feedback">Molimo vas da unesete telefon.</div>

                            </div>
                    @error('telefon')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror


                            <div class="form-group m-0 mt-2">
                                <label style="font-weight: normal" class="label-checkout" for="drzava">Država</label>
                                <input type="text" name="drzava" required class="form-control @error('drzava') is-invalid @enderror" id="drzava" placeholder="Unesite državu">
                                <div style="font-size:15px;" class="invalid-feedback">Molimo vas da unesete državu.</div>

                            </div>
                    @error('drzava')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                            <div class="form-group m-0 mt-2">
                                <label style="font-weight: normal" class="label-checkout" for="grad">Grad i poštanski broj</label>
                                <input type="text" name="grad" required class="form-control @error('grad') is-invalid @enderror" id="grad" placeholder="Unesite grad i poštanski broj">
                                <div style="font-size:15px;" class="invalid-feedback">Molimo vas da unesete grad.</div>

                            </div>
                    @error('grad')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror


                            <div class="form-group m-0 mt-2">
                                <label style="font-weight: normal" class="label-checkout" for="ulica">Ulica i broj</label>
                                <input type="text" name="ulica" required class="form-control @error('ulica') is-invalid @enderror" id="ulica" placeholder="Unesite ulicu i broj">
                                <div style="font-size:15px;" class="invalid-feedback">Molimo vas da unesete ulicu.</div>

                            </div>
                    @error('ulica')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror



                </div>
            @endif
                        <!-- /.card-body -->

                <h2 class="text-center font-antiqua izaberi-placanje">Izaberi način plaćanja</h2><br>



                        <input class="" type="radio" name="placanje" required  value="preko računa">
                <span class="text-placanje">Uplata na račun</span><br><br> <span class="post-express-text">Uputstvo za direktnu uplatu na račun dobićete na
                    imejl u što kraćem roku. Ukoliko ste naručili personalizovani proizvod, izrada proizvoda otpočeće nakon što uplata bude evidentirana.
                            </span><br>



                @error('placanje')
                <div class="text-danger">{{ $message }}</div>
                @enderror


                <div style="font-size:15px;" class="invalid-feedback">Molimo vas da izaberete plaćanje.</div>

                <script>
                    let item;
                    $(document).ready(function () {

                        for(let i = 0; cart.length > i; i++) {

                            console.log(cart[i].in_stock)

                            if(cart[i].in_stock == 0){
                                $('.izaberi-placanje').html('Kada imate proizvod koji se radi po narudžbini, imate opciju da izaberete samo plaćanje <b>uplata na račun</b>')
                                $('.pouzecem').remove();
                            }
                        }

                        if(cart.length == 0){
                            window.location.href = '/';
                        }

                    });
                </script>


                <br><br>
                <div class="pouzecem">
                    <input class="" type="radio" name="placanje" required value="pouzećem">
                <span style="" class="text-placanje">Plaćanje pouzećem</span><br><br><span class="post-express-text">Ukoliko odaberete ovaj način plaćanja, plaćate gotovinski kuriru
                    prilikom preuzimanja pošiljke.

                            </span>
                </div>

                <br>


                    <script>
                        $(document).ready(function () {

                            $('#input-cart-items').append(`

                           <input type="hidden" name="cart_items" value='${JSON.stringify(cart)}'>

                        `);

                        });

                        // ako ima greska scroll na gore
                        $('form').submit(function(e) {
                            var form = $(this);

                            // HTML5 validility checker
                            if (form[0].checkValidity() === false) {
                                // not valid
                                form.addClass('was-validated');
                                $('html,body').animate({scrollTop: $('.was-validated .form-control:invalid').first().offset().top - 50},'slow');
                                e.preventDefault();
                                e.stopPropagation();
                                return;
                            }
                            // valid, do something else ...
                        });
                    </script>



                <div style="color: #e2e3e6" id="input-cart-items" class="text-center mt-5">

                    <p class="text-placanje">Klikom na dugme će biti izvršena kupovina.</p>

                    <button id="purchase" type="submit" class="btn btn-primary btn-lg">Potvrdi kupovinu</button>


                </div>
            </form>

        </div>




    </div>

</div>
@endsection






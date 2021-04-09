<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

    @if($order['payment'] == 'pouzećem')

        <h1>Hvala vam na narudžbini! :)</h1>

        <p>Vaša narudžbina je primljena.</p>

        <p>Svoju narudžbinu ćete platiti kuriru prilikom preuzimanja pošiljke.
            Pošiljku je moguće platiti jedino gotovinom. Troškovi dostave se obračunavaju prema cenovniku kurirske službe. </p>

        <p>Ispod u tabeli možete pogledati detalje svoje porudžbine:</p><br>

    @else
        <h1>Vaša narudžbina je primljena.</h1>
        <p>Uplatu možete izvršiti uplatnicom na šalteru u banci i pošti ili preko interneta na račun koji će vam,
        uz uputstvo za uplatu, biti dostavljen u što kraćem roku.</p>

        <p>Narudžbina će biti poslata nakon evidentiranja uplate. Troškovi dostave se obračunavaju prema cenovniku kurirske službe.</p>
        <br>
        <p>Ukoliko ste naručili personalizovani proizvod, izrada proizvoda otpočeće nakon što uplata bude evidentirana.</p>

        <p>Ispod u tabeli možete pogledati detalje svoje porudžbine:</p><br>


    @endif



        <span>Ime: </span><b>{{$order['firstname']}}</b><br>
        <span>Prezime: </span><b>{{$order['lastname']}}</b><br>
        <span>Imejl: </span><b>{{$order['email']}}</b><br>
        <span>Telefon: </span><b>{{$order['phone']}}</b><br>
        <span>Država: </span><b>{{$order['country']}}</b><br>
        <span>Grad i poštanski broj: </span><b>{{$order['city_and_zipcode']}}</b><br>
        <span>Plaćanje: </span><b>{{$order['payment']}}</b><br>


        <span>Naručeni proizvodi:</span><br><br>

    <div class="card-body table-responsive p-0">

        <table style="border: 1px solid black;" id="table" class="table">
            <thead>
            <tr>
                <th style="border:1px solid black;" scope="col">Proizvod</th>
                <th style="border:1px solid black;" scope="col">Cena</th>
                <th style="border:1px solid black;" scope="col">Kolicina</th>
                <th style="border:1px solid black;" scope="col">Napomena</th>
                <th style="border:1px solid black;" scope="col">Ukupno</th>


            </tr>
            </thead>
            <?php $total = 0; ?>
            <tbody class="tbody">
            @foreach(json_decode($order['items']) as $value)

                <?php

                $discount_price = $value->price - ($value->discount / 100 * $value->price) ;

                $price_and_quantity = $discount_price *= $value->quantity;

                $napomena = ($value->in_stock == 0) ? "po narudžbini" : "/";

                ?>

                <tr style="border: 1px solid black;">

                    <td style="border:1px solid black;" class="table-line-height border" scope="row">{{$value->name}}</td>
                    <td style="border:1px solid black;" class="table-line-height border"> {{$value->price}},00 RSD</td>
                    <td style="border:1px solid black;" class="table-line-height">{{$value->quantity}}</td>
                    <td style="border:1px solid black;" class="table-line-height">{{$napomena}}</td>
                    <td style="border:1px solid black;" class="table-line-height">{{$price_and_quantity}},00 RSD</td>

                </tr>




                <?php


                $total += $price_and_quantity;

                ?>

            @endforeach
            </tbody>
            <tr style="border: 1px solid black;">

                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;" class="table-line-height"><b class="total-cart">Ukupno:<?php echo $total; ?></b>,00 RSD</td>

            </tr>
        </table>


    </div>



</body>
</html>

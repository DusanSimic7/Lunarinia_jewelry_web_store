
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>


<p>Poštovana Lunarinia, imate novu porudžbinu:</p>

<h3>ID PORUDŽBINE: #{{ $order['id'] }}</h3>

<span>Ime: </span>{{$order['firstname']}}<br>
<span>Prezime: </span>{{$order['lastname']}}<br>
<span>Email: </span>{{$order['email']}}<br>
<span>Telefon: </span>{{$order['phone']}}<br>
<span>Država: </span>{{$order['country']}}<br>
<span>Grad i poštanski broj: </span>{{$order['city_and_zipcode']}}<br>
<span>Plaćanje: </span>{{$order['payment']}}<br>


<div class="card-body table-responsive p-0">

    <span>Naručeni proizvodi:</span><br><br>

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

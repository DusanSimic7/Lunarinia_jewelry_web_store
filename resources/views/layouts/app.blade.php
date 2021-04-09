<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/chantelli-antiqua" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Glass+Antiqua&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Glass+Antiqua&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    {{--    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">--}}


    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


</head>
{{session()->put('user_id', rand(1000000,10000000))}}
<body style="background-color:black;color: #e2e3e6">


<div class="wrapper-body">



<div id="app" class="font-antiqua">

    <!-- Navbar -->
    <div id="navbar5">


        <div id="first-nav" class="text-white">
            <div  class="container">
                <div class="row p-2">
                    <div class="col-9-md">
                        <div class="p-1 text-first-nav ">
{{--                            <span class="mr-5 special-gift">POSEBNE POGODNOSTI ZA REGISTROVANE KORISNIKE!</span>--}}

                            <span style="color: #e2e3e6; font-size: 17px;" class="font-antiqua"><a class="" href="{{url('/frequently_questions')}}">NAJČEŠĆA PITANJA</a></span>


                        </div>

                    </div>


                    <div class="col-3-md ml-auto text-white">


                        <!-- Authentication Links -->
                            @if(!isset(auth()->user()->firstname))
                            <a id="login-link" class=" mr-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a id="register-link" class="" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                            @else
                            <ul class="m-0">
                                <li class="nav-item dropdown">
                                    <a style="color: #e2e3e6"  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->firstname." ".Auth::user()->lastname }} <span class="caret"></span>
                                    </a>

                                    <div style="font-size: 17px;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>

                            @endif


                    </div>
                </div>
            </div>
        </div>

        <div class="div-for-border"></div>



    <?php $products = \App\Product::all() ;?>
    <?php $collections = \App\Collection::all() ;?>

    <!-- Navbar -->
        <nav style="background: black; border-bottom: 1px solid gray" id="nav" class="navbar navbar-expand-lg navbar-light ">

            <!-- Container wrapper -->
            <div class="container-fluid">

                <i class="fas fa-bars hamburger-menu d-lg-none"
                   type="button"
                   data-toggle="collapse"
                   data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent"></i>

                <!-- search mobile dropdown button -->

                <div class="search-for-mobile">
                    <div class="dropdown5 ml-2">
                        <i onclick="functionForSearchMobile()" class="fa fa-search cursor-grab"></i>
                        <div id="searchDropdown-mobile" class="dropdown-search-mobile">
                            <form action=" {{ route('search.item') }}" method="get">
                                <input type="text" name="item" placeholder="Pretraga..." id="myInput-search-mobile" onkeyup="filterFunctionSearchMobile()">

                            </form>

                        </div>
                    </div>
                </div>


                <!-- end search button -->


                <!-- Navbar brand -->
                <div class="logo-center">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h1 class="m-0 heading-nav font-allura-logo">lunarinia</h1>
                    </a>
                </div>



                <div id="cart-for-mobile" class="">


                    <a onclick="myFunction()" class="border-danger cart-icon m-0 p-0 mr-2" type="submit">

                        @if(isset(auth()->user()->firstname))
                        <a href="/my_cart"><i class="fas fa-shopping-cart p-1 cursor-grab" title=""><span id="counter" class="add-cart-number font-weight-bold text-right">0</span></i></a>
                        @else
                        <a data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-shopping-cart p-1 cursor-grab" title=""><span id="counter" class="add-cart-number font-weight-bold text-right">0</span></i></a>
                        @endif
                    </a>
                    <div id="demo" class="demo w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom dropdown-menu dropdown-menu-right">
                        <p class="text-center m-0 p-2 border-bottom">IMATE <b><span class="counter2">0</span></b>PROIZVODA U KORPI</p>








                    </div>
                </div>
                <div class="modal fade" id="modal-secondary">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary">
                            <div class="modal-header text-center">
                                <h4 class="modal-title  text-white font-antiqua">Da li ste sigurni?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Ne</button>
                                <a href="" class="confirm-button btn btn-outline-light" data-dismiss="modal">Da</a>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>




            {{--            modal za korpu ako nije registrovan--}}
            <!-- Modal -->

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h3 class="font-antiqua text-dark" id="exampleModalCenterTitle">Način kupovine</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <a href="/login" class="btn btn-dark btn-lg">Prijavi se</a>
                            </div>
                            <div class="modal-body text-center">
                                <a href="/my_cart" class="btn btn-dark btn-lg">Nastavi kao gost</a>
                            </div>

                        </div>
                    </div>
                </div>




                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left links -->
                    <ul style="font-size:17px" id="" class="navbar-nav m-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a style="color: #e2e3e6"; class="nav-link" href="{{ url('/') }}">POČETNA</a>
                        </li>



                        <li class="nav-item m-0">
                            <div class="dropdown">
                                <a style="color: #e2e3e6" class="nav-link" href="{{ route('products') }}">PROIZVODI</a>
                                <div class="dropdown-content rounded text-decoration">

                                    @foreach($products as $product)
                                        <p><a href="{{ route('items.show', $product) }}">{{ $product->name }}</a></p>

                                    @endforeach


                                </div>
                            </div>
                        </li>



                        <li class="nav-item">
                            <div class="dropdown">

                            <a style="color: #e2e3e6" class="nav-link" href="{{url('/collections')}}">KOLEKCIJE</a>
                                <div class="dropdown-content rounded text-decoration">
                                    @foreach($collections as $collection)
                                        <p><a href="{{ route('collection.show', $collection) }}">{{ $collection->name }}</a></p>

                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a style="color: #e2e3e6" class="nav-link" href="{{url('/make_alone')}}">PERSONALIZUJ</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #e2e3e6" class="nav-link" href="{{url('/contact')}}">KONTAKT</a>
                        </li>


                        <li class="nav-item">
                            <a style="color: #e2e3e6" class="nav-link" href="{{url('/about')}}">O MENI </a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div id="cart-for-desktop" class="ml-auto">
                        <!-- Authentication Links -->

                        <!--  search desktop  -->
                        <div class="dropdown5 mr-2">
                            <i onclick="functionForSearch()" class="fa fa-search cursor-grab"></i>
                            <div id="searchDropdown" class="dropdown-search">
                                <form action="{{ route('search.item') }}" method="get">
                                    <input type="text" name="item" placeholder="Pretraga..." id="myInput-search" onkeyup="filterFunctionSearch()">

                                </form>

                            </div>
                        </div>

                        <!-- end search dropdown button -->

                        <div class="w3-dropdown-hover">

                            <a onclick="myFunction()" class="border-danger">
                                <span id="counter" class="cart-number cart-desktop add-cart-number ">0</span>
                                <i class="fas fa-shopping-cart mr-5"></i>
                            </a>
                            <div id="demo" class="demo w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom dropdown-menu dropdown-menu-right">
                                <p class="text-center m-0 p-2 border-bottom">BROJ PROIZVODA U KORPI: <b><span class="counter2">0</span></b> </p>


                                {{--                            <form action="checkout" method="post" class="checkout d-inline-block">--}}
                                {{--                                @csrf--}}
                                {{--                                <input type="hidden" name="cart_items" value="[hgfhgfgh,jgjhgj]">--}}
                                {{--                                <input type="submit" style="background-color: orangered;" class="mr-4 btn btn-danger" value="MOJA KORPA"/>--}}
                                {{--                            </form>--}}

                            </div>
                        </div>
                        {{--                    uradi i za mobilni--}}

                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->

        </nav>

    </div>
    <div class="">
            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
                <script>
                    localStorage.clear();
                </script>
            @endif

                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>

                @endif

    </div>


    <main id="main" class="">
        @yield('content')
    </main>
    <div style="height: 25px;"></div>


{{--    <footer id="footer">--}}
{{--        <div class="text-center">--}}

{{--            <a href=""><i class="fa fa-facebook p-2 my-3"></i></a>--}}
{{--            <a href=""><i class="fa fa-instagram p-2"></i></a>--}}
{{--            <a href=""><i class="fa fa-pinterest p-2"></i></a>--}}

{{--        </div>--}}


{{--        <div class="text-center footer-nav-text">--}}
{{--            <a class="p-4" href="#">HOME</a>--}}
{{--            <a class="p-4" href="#">PRODUCTS</a>--}}
{{--            <a class="p-4" href="#">ABOUT</a>--}}
{{--            <a class="p-4" href="#">CONTACT</a>--}}
{{--        </div>--}}

{{--        <div class="text-center copyright-text">--}}
{{--            <p class="mb-1 mt-2"> &copy; Copyright 2020.</p>--}}
{{--            <p class="mb-1">All rights reserved. Powered by <a href=""><b>Dušan Simić</b></a>.</p>--}}
{{--        </div>--}}




{{--    </footer>--}}



    <footer class="main-footer ml-0" style="background-color: black">

                <div class="text-center mb-2">
                    <a target="_blank" href="https://www.facebook.com/lunarinia/"><i class="fab fa-facebook-f p-2 text-white"></i></a>
                    <a target="_blank" href="https://www.instagram.com/lunarinia/"><i class="fab fa-instagram p-2"></i></a>
                    <a target="_blank" href="https://www.etsy.com/uk/shop/Lunarinia"><i class="fab fa-etsy p-2 text-white"></i></a>

                </div>


                <div class="text-center footer-nav-text">
                    <a class="px-3" href="{{ url('/') }}">POČETNA</a>
                    <a class="px-3" href="{{ route('products') }}">PROIZVODI</a>
                    <a class="px-3" href="{{url('/collections')}}">KOLEKCIJE</a>
                    <a class="px-3" href="{{ url('/make_alone') }}">PERSONALIZUJ</a>
                    <a class="px-3" href="{{ url('/contact') }}">KONTAKT</a>
                    <a class="px-3" href="{{ url('/about') }}">O MENI</a>

                </div>

                <div class="text-center copyright-text">
                    <p class="mb-1 mt-2"> &copy; Copyright 2021.</p>
                    <p class="mb-1">All rights reserved. Powered by <a target="_blank" href="https://www.linkedin.com/in/du%C5%A1an-simi%C4%87-1292a5166/"><b>Dušan Simić</b></a>.</p>
                </div>
    </footer>

</div>

</div>  {{-- end wrapper --}}


<script>


    function myFunction() {
        var x = document.getElementById("Demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }




    // add to cart
    const data2 = localStorage.getItem("cart");
    var data_obj= JSON.parse(data2);
    if(data_obj == null){
        cart = [];
    }else{
        cart = data_obj;
        // cart5 = JSON.stringify(cart);


    }

    let text = '';

    init_cart();



    $(document).ready(function () {
        delete_item();

        $('.add_to_cart').submit(function (e) {


            // event.returnValue = false;
            if (typeof e.preventDefault === "function") {
                e.preventDefault();
            } else {
                return false;
            }

            // event.preventDefault();
            $.ajax({
                type: 'post',
                url: '/api/add_to_cart',
                contentType: false,
                processData: false,
                data: new FormData(this),
                success: function (data) {

                    console.log(data[0].name)

                    let item_name = "";
                    item_name = data[0].name;
                    let message = "Proizvod " + item_name + " je dodat u korpu :)";
                    let message2 = "Proizvod " + item_name + " nemamo više na stanju :(";
                    let message3 = "Proizvod " + item_name + " ne možete poručiti više od jednog komada :(";




                    // poruka da je predmet dodat u korpu
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    const Toast2 = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })



                    let again_item;

                    for(let i = 0; cart.length > i; i++){

                        //ako je korisnik kliknuo na isti proizvod i hoce vecu kolicinu
                        if(cart[i].id == data[0].id){
                            again_item = cart[i].id;

                            if(cart[i].quantity < data[0].in_stock){
                                let counter = cart[i].quantity + 1;
                                cart[i] = {
                                    id: data[0].id,
                                    user_id: data[1],
                                    name: data[0].name,
                                    price: data[0].price,
                                    discount: data[0].discount,
                                    image: data[0].image,
                                    in_stock: data[0].in_stock,
                                    description: data[0].description,
                                    quantity: counter,

                                };

                                Toast.fire({
                                    icon: 'success',
                                    title: message
                                })

                            }else{
                                if(data[0].in_stock == 0){
                                    Toast2.fire({
                                        icon: 'error',
                                        title: message3
                                    })
                                }else{
                                    Toast2.fire({
                                        icon: 'error',
                                        title: message2
                                    })
                                }

                            }


                        }

                    }


                    if(data[0].id != again_item){
                        cart.push({
                            id: data[0].id,
                            user_id: data[1],
                            name: data[0].name,
                            price: data[0].price,
                            discount: data[0].discount,
                            image: data[0].image,
                            in_stock: data[0].in_stock,
                            description: data[0].description,
                            quantity: 1
                        });

                        Toast.fire({
                            icon: 'success',
                            title: message
                        })
                    }



                    $("#demo > div").remove();




                    localStorage.setItem("cart", JSON.stringify(cart));


                    init_cart();

                },

                error: function (data) {
                    alert("fail");
                }
            });
        });
    });


    function init_cart(){
        const data2 = localStorage.getItem("cart");
        if(data2){
            let total = 0;

            const data_object = JSON.parse(data2);

            let demo = $('.demo');

            $('.add-cart-number').text(data_object.length); // dodavanje broja pored korpe
            $('.counter2').text(data_object.length);   // dodavanje broja u korpu

            // add item in cart

            for (let i = 0; i < data_object.length; i++) {
                let discount_price = data_object[i].price - (data_object[i].discount / 100 * data_object[i].price);

               let first_image = JSON.parse(data_object[i].image);

                total += discount_price * data_object[i].quantity;



                demo.append(`
                                        <div class="row p-2">
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4 border-right">
                                                <img src="/images/${first_image[0]}" alt="" width="80" height="80">
                                            </div>

                                            <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                                                <p class='d-inline-block'>${data_object[i].name}</p>

                                                <a href="#" class="d-inline-block float-right mr-1 delete-item  text-white" data-target="#modal-secondary" data-toggle="modal">
                                                    <i id="fa-times-circle" class="fa fa-times-circle text-dark"><input type="hidden" value="${data_object[i].id}"></i>

                                                </a>

                                                <p class="m-0"> ${discount_price},00 RSD</p>
                                                <p><b>Količina:</b> ${data_object[i].quantity}</p>

                                            </div>
                                        </div>
                                     `);
            }


            if(data_object.length > 0){

                //  console.log(cart);
                //  // let cart10 = cart.toString();
                // cart= cart.map(function (item){
                //      return JSON.stringify(item);
                //  });
                //  console.log('ovde je log');
                //  console.log(cart);

                demo.append(`<div class="m-2">
                                            @if(isset(auth()->user()->firstname))
                                           <a href="/my_cart?cart=5" style="background: #850106";" class="mr-4 btn btn-danger">KORPA</a>
                                            @else
                                            <a href="/my_cart"  data-toggle="modal" data-target="#exampleModalCenter"  style="background: #850106";" class="mr-4 btn btn-danger">KORPA</a>

                                            @endif
                <span class="fa-times-circle>${total},00 RSD</span>
                                </div>`);

                for (let i = 0; i < data_object.length; i++) {

                    let first_image = JSON.parse(data_object[i].image);


                    let discount_price = data_object[i].price - (data_object[i].discount / 100 * data_object[i].price);

                    const in_stock = (data_object[i].in_stock > 0) ? "/" : "(po narudžbini)";




                    $('.tbody').append(`


                                <tr class="label-checkout">
                                    <td class="table-image-border" scope="row"><img class="table-image rounded" src="/images/${first_image[0]}" alt="" width="80" height="80"></td>

                                    <td class="table-line-height" scope="row"><span>Ime:</span> ${data_object[i].name}</td>
                                    <td class="table-line-height"><span>Cena:</span> ${data_object[i].price},00 RSD</td>
                                    <td class="table-line-height"><span>Količina:</span> ${data_object[i].quantity}</td>
                                    <td class="table-line-height"><span>Napomena:</span> ${in_stock}</td>
                                    <td class="table-line-height"><span>Ukupno:</span> ${discount_price *= data_object[i].quantity},00 RSD</td>
                                    <td class="table-line-height"><span>Izbriši:</span><a href="#" class="d-inline-block mr-1 delete-item " data-target="#modal-secondary" data-toggle="modal">
                                          <i class="fa fa-times-circle"><input type="hidden" value="${data_object[i].id}"></i>
                                        </a>
                                    </td>

                                </tr>


                        `);


                }

                $('.total-cart').html(`<b style="font-size: 20px;" class="font-antiqua">Ukupno: ${total}, 00 RSD</b>`);

            }else{
                $('.total-cart').remove();
            }



        }
        delete_item();
        add_remove_scroll();

    }  // end init_cart function


    // function Remove item from cart

    function delete_item(){

        $('.delete-item').click(function (e) {
            // if(confirm('Da li ste sigurni?') == true){
            // let target_id = JSON.parse(e.target.children[0].value);
            $(document).ready(function () {

                $('.confirm-button').click(function (){
                    let target_id = JSON.parse(e.target.children[0].value);
                    console.log(target_id);
                    console.log(e.target.parentElement.parentElement.parentElement);


                    for (let i = 0; cart.length > 0; i++) {

                        if (cart[i].id == target_id) {

                            e.target.parentElement.parentElement.parentElement.remove();
                            $("#demo > div").remove();

                            $(".tbody > tr").remove();

                            $(".modal-dialog").remove();


                            _.remove(cart, function (e) {
                                return e === cart[i];
                            });

                            localStorage.setItem("cart", JSON.stringify(cart));

                            init_cart();


                            break;
                        } else {
                            console.log('ne postoji id');
                        }

                    }
                });
            });
            // }

        });
    }


    function add_remove_scroll(){
        if(cart.length > 3){
            $(".demo").addClass("cart-vertical-scroll")
        }else{
            $(".demo").removeClass("cart-vertical-scroll");
        }
    }


    // $(document).ready(function (){
    //
    //
    //                 axios.get('/api/read_to_cart')
    //                     .then(function (response) {
    //                         let items = response.data;
    //                         // console.log(items);
    //                          console.log(items.length);
    //                         //$('.add-cart-number').text(items.length);
    //
    //                         for (let i = 0; i < items.length; i++) {
    //
    //                             var demo=$('#demo');
    //
    //                             $('.add-cart-number').text(items.length); // dodavanje broja pored korpe
    //                             $('.counter2').text(items.length);   // dodavanje broja u korpu
    //
    //                             demo.append(` <a href="">
    //                                 <div class="row p-2">
    //                                     <div class="col-12 col-sm-4 col-md-4 col-lg-4 border-right">
    //                                         <img src="/svg/${items[i].image}" alt="" width="80" height="80">
    //                                     </div>
    //
    //                                     <div class="col-12 col-sm-8 col-md-8 col-lg-8">
    //                                         <p>${items[i].name}</p>
    //                                         <p>${items[i].price}</p>
    //                                     </div>
    //                                 </div>
    //                                 <hr class="border-secondary m-0 p-0">
    //                              </a>`)
    //                         }
    //
    //                     }).catch(function (error) {
    //                     console.log(error);
    //                 })
    //
    // });




    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function functionForSearch() {
        document.getElementById("searchDropdown").classList.toggle("show");
    }

    function functionForSearchMobile() {
        document.getElementById("searchDropdown-mobile").classList.toggle("show");
    }

    function filterFunctionSearch() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput-search");
        filter = input.value.toUpperCase();
        div = document.getElementById("searchDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }


    function filterFunctionSearchMobile() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput-search-mobile");
        filter = input.value.toUpperCase();
        div = document.getElementById("searchDropdown-mobile");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }




    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();


// ovo mora preko ajaxa

    $(function(){
        $("#items").slice(0, 8).show(); // select the first ten
        $("#load").click(function(e){ // click event for load more
            e.preventDefault();
            $("#items:hidden").slice(0, 8).show(); // select next 10 hidden divs and show them
            if($("#items:hidden").length == 0){ // check if any hidden divs still exist
                alert("No more divs"); // alert if there are none left
            }
        });
    });



</script>

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>--}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
{{--<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>




</body>
</html>

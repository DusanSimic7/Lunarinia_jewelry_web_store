<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Mail\OrderToCustomer;
use App\Mail\OrderToOwner;
use App\Mail\SendOrderToOwner;
use App\Mail\SendOrderToCustomer;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function create()
    {
        $item = Item::find(\request()->id);
//        $item_count = Item::where('id',\request()->id)->get();
//        $count = count($item_count);

        if(isset(auth()->user()->id)){
            $auth = auth()->user()->id;
        }else{
            $auth = session('user_id');
        }

        return array($item, $auth);
    }



    public function read()
    {
        if(isset(auth()->user()->id)){
            $auth = auth()->user()->id;
        }else{
            $auth = session('user_id');
        }

        return Cart::where('user_id', $auth)->get();

    }

    public function cart(Request $request)
    {
//        dd($request->cart_items);
        //ovde proveravamo da li nije prodato nesto dok predmeti stoje u korpi

//        $table_items = Item::all();
//
//        $cart_items = json_decode($request->cart_items);
//
//        $check_items = [];
//        $sold_items = [];
//        foreach ($cart_items as $cart_item) {
//
//            foreach ($table_items as $table_item) {
//
//
//                if($cart_item->id == $table_item->id){
//
//                    if($cart_item->quantity <= $table_item->in_stock){
//                        $check_items[] = $cart_item;
//
//                    }elseif ($table_item->in_stock == 0 and $table_item->available_to_make > 0 and $cart_item->quantity == 1){
//                        $check_items[] = $cart_item;
//
//                    }elseif ($table_item->in_stock == 0 and $table_item->available_to_make > 0 and $cart_item->quantity >  1){
//                        return redirect('/')->with('error', "Neki od vaših predmeta u korpi je nažalost upravo prodat, a to je $cart_item->name,
//                        proverite da li može da se poruči preko narudžbine");
//
//                    }elseif($table_item->in_stock == 0 and $table_item->available_to_make == 0){
//                        return redirect('/')->with('error', "Neki od vaših predmeta u korpi je nažalost upravo prodat, a to je $cart_item->name,
//                        njega nije moguće više poručiti");
//
//                    }else{
//                        return redirect('/')->with('error', "Neki od vaših predmeta u korpi je nažalost upravo prodat,
//                                                        ili vam je smanjio količinu proizvoda, a to je $cart_item->name, ostao je $table_item->in_stock na stanju");
//                    }
//
//
//
//                }
//
//            }
//        }


        return view('cart_checkout');


    }


    public function store_order(Request $request, User  $user)
    {
        $cart_items = json_decode($request->cart_items);


        if(!isset(auth()->user()->id)) {

            $request->validate([
                'ime' => 'required',
                'prezime' => 'required',
                'email' => ['required', 'email', 'unique:users'],
                'telefon' => 'required',
                'drzava' => 'required',
                'grad' => 'required',
                'ulica' => 'required',
                'placanje' => 'required',
            ]);
        }else{
            $request->validate([
                'placanje' => 'required'
            ]);
        }

        // ovde proveravamo da li  prodato nesto dok predmeti stoje u korpi

        $table_items = Item::all();


        $check_items = [];
        $sold_items = [];
        foreach ($cart_items as $cart_item) {

            foreach ($table_items as $table_item) {


                if($cart_item->id == $table_item->id){

                    if($cart_item->quantity <= $table_item->in_stock){
                        $check_items[] = $cart_item;

                    }elseif ($table_item->in_stock == 0 and $table_item->available_to_make > 0 and $cart_item->quantity == 1){
                        $check_items[] = $cart_item;

                    }elseif ($table_item->in_stock == 0 and $table_item->available_to_make > 0 and $cart_item->quantity >  1){
                        return redirect('/')->with('error', "Nažalost, neki od predmeta u vašoj korpi je upravo proda($cart_item->name),
                        proverite da li može da se poruči preko narudžbine");

                    }elseif($table_item->in_stock == 0 and $table_item->available_to_make == 0){
                        return redirect('/')->with('error', "Nažalost, neki od predmeta u vašoj korpi je upravo prodat, ($cart_item->name),
                        njega nije moguće više poručiti");

                    }else{
                        return redirect('/')->with('error', "Nažalost, neki od vaših predmeta u vašoj korpi je upravo prodat,
                                                        ili vam je smanjio količinu proizvoda, a to je $cart_item->name, ostalo je $table_item->in_stock na stanju");
                    }



                }

            }
        }


        if(isset(auth()->user()->id)){
            $auth = auth()->user()->id;
        }else{
            $auth = session('user_id');
        }

        if(!isset(auth()->user()->id)) {

          $order = Order::create([
                'user_id' => $auth,
                'firstname' => $request->ime,
                'lastname' => $request->prezime,
                'email' => $request->email,
                'phone' => $request->telefon,
                'country' => $request->drzava,
                'city_and_zipcode' => $request->grad,
                'street_number' => $request->ulica,
                'payment' => $request->placanje,
                'items' => $request->cart_items,
            ]);
        }else{
           $order = Order::create([
                'user_id' => $auth,
                'firstname' => auth()->user()->firstname,
                'lastname' => auth()->user()->lastname,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone,
                'country' => auth()->user()->country,
                'city_and_zipcode' => auth()->user()->city_and_zipcode,
                'street_number' => auth()->user()->street_number,
                'payment' => $request->placanje,
                'items' => $request->cart_items,
            ]);
        }



        foreach ($cart_items as $item) {

          Item::where('id', $item->id)->update(
                [
                    'in_stock' => $item->in_stock - $item->quantity,
                ]);

          $items = Item::find($item->id);


            if($items->in_stock < 0){

                Item::where('id', $item->id)->update(
                    [
                        'in_stock' => 0

                    ]);
            }

        }





        Mail::to($order['email'])->send(new OrderToCustomer($order));

        Mail::to('dusansimic202@gmail.com')->send(new OrderToOwner($order));


        return redirect('/')->with('status', 'Porudžbina je uspešna!Proverite vaš imejl.');


    }


}


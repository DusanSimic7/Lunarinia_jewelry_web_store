<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Item::all()->count();

        $collection = \App\Collection::find(4);
        $products = \App\Product::all();

        if($count > 3){
            $items = \App\Item::all()->random(4);
        }else{
            $items = Item::all();
        }

        return view('home', [
            'four_items' => $items,
            'products' => $products,
            'collection' => $collection
        ]);
    }

    public function welcome()
    {
        $count = Item::all()->count();


        $collection = \App\MainCollection::all();

        if($count > 3){

           $items = Item::where('in_stock', '!=', 0)->inRandomOrder()->limit(4)->get();

        }else{
            $items = Item::all();
        }
        $products = \App\Product::all();

        return view('welcome', [
            'four_items' => $items,
            'products' => $products,
            'collection' => $collection

        ]);
    }
}

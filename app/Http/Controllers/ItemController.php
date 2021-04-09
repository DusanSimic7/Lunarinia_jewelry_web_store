<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Product;

class ItemController extends Controller
{

    public function items(Product $product, Request $request)
    {

        $products = Product::all();

        if($request->available == $product->id){
            $items = Item::where([['available_to_make', '>', 0], ['in_stock', '=', 0], ['product_id', '=', $product->id]])
                ->orWhere([['available_to_make', '>', 0], ['in_stock', '>', 0], ['product_id', '=', $product->id]])
                ->orWhere([['available_to_make', '=', 0], ['in_stock', '>', 0], ['product_id', '=', $product->id]])->get();
        }else{
            $items = Item::where('product_id', $product->id)->get();

        }


        return view('items', [
            'products' => $products,
            'product' => $product,
            'items' => $items
        ]);


    }




    public function show(Item $item){


        return view('single-item', [
            'item' => $item
        ]);
    }




    public function about()
    {
        return view('pages.about');
    }

    public function frequently_questions()
    {
        return view('pages.frequently_questions');

    }

    public function make_alone()
    {
        return view('pages.make_alone');

    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function proba()
    {
        return view('proba');
    }


    public function search(Request $request)
    {
       $products = Product::all();


       if($request->in_stock == "5"){
           $search_item = Item::where('in_stock', '>', 0)->orWhere('available_to_make', '>', 0)->get();

       }else{
           $search_item = Item::query()
               ->where('name', 'LIKE', "%{$request->item}%")
               ->orWhere('description', 'LIKE', "%{$request->item}%")
               ->get();
       }




       return view('search', ['search_item' => $search_item, 'products' => $products]);
    }





}

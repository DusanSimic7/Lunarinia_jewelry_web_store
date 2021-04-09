<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Http\Request;
use App\Item;


class CollectionController extends Controller
{
    public function index()
    {
        return view('pages.collections', [
            'collections' => Collection::all()
        ]);
    }


    public function show(Collection $collection, Request $request)
    {
//        if($request->available == 1){
//            dd($request->available);
//
//        }

        $products = Product::all();

        if($request->available == $collection->id){
            $items = Item::where([['available_to_make', '>', 0], ['in_stock', '=', 0], ['collection_id', '=', $collection->id]])
                       ->orWhere([['available_to_make', '>', 0], ['in_stock', '>', 0], ['collection_id', '=', $collection->id]])
                       ->orWhere([['available_to_make', '=', 0], ['in_stock', '>', 0], ['collection_id', '=', $collection->id]])->get();

        }else{
            $items = Item::where('collection_id', $collection->id)->get();

        }

        return view('collection', [
            'collection' => $collection,
            'products' => $products,
            'items' => $items
        ]);
    }

}

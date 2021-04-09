<?php

namespace App\Http\Livewire;

use App\Item;
use App\Product;
use Illuminate\Http\Request;
use Livewire\Component;

class Items extends Component
{
    public $amount = 8;

    public function render(Product $product, Request $request)
    {
        $products = Product::all();

        if($request->product_id == true){
            $items = Item::where('available_to_make', '>', 0)->where('product_id', $request->product_id)->limit($this->amount)->get();
        }else{
            $items = Item::where('product_id', $product->id)->limit($this->amount)->get();

        }

//        $items = $product->items;
        return view('livewire.items', [
            'products' => $products,
            'product' => $product,
            'items' => $items
        ]);

//        return view('livewire.items');
    }

    public function load()
    {
        $this->amount += 8;
    }





}

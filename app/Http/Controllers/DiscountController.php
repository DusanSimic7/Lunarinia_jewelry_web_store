<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function discount()
    {
        $discount = Item::where('discount','>', 0)->get();
        return view('discount', [
            'discount' => $discount
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactOrder;
use App\Mail\OrderToOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function sendOrder(Request $request)
    {

        $request->validate([
            'ime' => 'required',
            'email' => ['required', 'email'],
            'poruka' => 'required',

        ]);

        $order = [
            'name' => $request->ime,
            'email' =>$request->email,
            'message' =>$request->poruka
        ];

        Mail::to('dusansimic202@gmail.com')->send(new ContactOrder($order));


        return redirect('/')->with('status', 'Uspešno ste poslali poruku!');


    }
}

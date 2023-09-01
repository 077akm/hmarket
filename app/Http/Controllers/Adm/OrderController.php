<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Document;
use App\Models\Zaiavka;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function cart(){
        $itemsInCart = Zaiavka::where('active', 1)
            ->orderBy('created_at')
            ->get();
        return view('adm.cart', ['itemsInCart'=>$itemsInCart]);
    }

    public function confirm(Zaiavka $cart){
        $cart->update([
            'active' => 0
        ]);
        return back();
    }
}

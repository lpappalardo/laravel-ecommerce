<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\SUpport\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function show()
    {
        $orders = Order::all();

        $user = Auth::user();

        $user_id = $user->id;

        $products = $orders->where('user_fk', $user_id);

        return view('profile.index', [
            'products' => $products,
            'user' => $user,
        ]);
    }
}

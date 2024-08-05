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

class MercadoPagoController extends Controller
{
    public function show()
    {
        $carts = Cart::all();

        $user = Auth::user();

        $user_id = $user->id;

        $products = $carts->where('user_fk', $user_id);

        $items = [];

        if($products->isNotEmpty()){
            foreach($products as $product) {
                $items[] = [
                    'title' => $product->book->title,
                    'quantity' => 1,
                    'unit_price' => $product->book->price,
                ];
            }
        }else{
            // $items[] = [
            //     'title' => 'vacio',
            //     'quantity' => 0,
            //     'unit_price' => 0,
            // ];
        }

        MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));

        $preferenceFactory = new PreferenceClient();

        $preference = $preferenceFactory->create([
            'items' => $items,

            'back_urls' => [
                'success' => route('cart.successProcess'),
                'pending' => route('cart.pendingProcess'),
                'failure' => route('cart.failureProcess'),
            ],    

            'auto_return' => 'approved',
            ]);

        return view('cart.view', [
            'products' => $products,
            'preference' => $preference,

            'mpPublicKey' => config("mercadopago.public_key"),
        ]);
    }

    public function successProcess(Request $request)
    {

        $user = Auth::user();

        $user_fk = $user->id;

        $carts = Cart::where('user_fk', $user_fk)->get();

        foreach($carts as $cart)
        {
            $order = new Order;

            $order->user_fk = $user_fk;

            $order->book_fk = $cart->book_fk;

            $order->order_date = now();

            $order->save();
        }

        $cart_clear = Cart::where('user_fk', $user_fk)->get();

        foreach($cart_clear as $cart)
        {
            $product = Cart::find($cart->id);

            $product->delete();
        }

        return redirect()
                ->route('products.index')
                ->with('feedback.message', 'Se generó la orden de compra con éxito');
    }

    public function pendingProcess(Request $request)
    {
        dd($request->query()); 
    }

    public function failureProcess(Request $request)
    {
        dd($request->query()); 
    }

    public function deleteProcess(int $id)
    {
        $cart = Cart::findOrFail($id);

        try {

            DB::beginTransaction();

            $cart->delete();

            DB::commit();

            return redirect()
                ->route('cart.view')
                ->with('feedback.message', 'Se eliminó una copia del libro ' . e($cart->book->title) . ' con éxito del carrito.');
        }catch(\Exception $e){

            return redirect()
                ->back(fallback: route('cart.view'))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y el libro no pudo ser eliminado.')
                ->with('feedback.type', 'danger');
        }
    }

    public function clearProcess()
    {
        $user = Auth::user();

        $user_fk = $user->id;

        $carts = Cart::all();

        $carts_user = $carts->where('user_fk', $user_fk);

        try {

            DB::beginTransaction();

            foreach($carts_user as $cart)
            {
                $cart->delete();
            }

            DB::commit();

            return redirect()
                ->route('cart.view')
                ->with('feedback.message', 'Se vació el carrito con éxito.');
        }catch(\Exception $e){

            return redirect()
                ->back(fallback: route('cart.view'))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error al tratar de vaciar el carrito.')
                ->with('feedback.type', 'danger');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cart;
use Illuminate\SUpport\Facades\Auth;

class ProductsController extends Controller
{
    public function all()
    {

        $books = Book::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $user_id = $user->id;

            $count = Cart::where('user_fk', $user_id)->count();
        }
        else
        {
            $count = '';
        }

        return view('products.index', [
            'books' => $books,
            'count' => $count,
        ]);
    }

    public function view(int $id)
    {

        $book = Book::findOrFail($id);

        if(Auth::id())
        {
            $user = Auth::user();

            $user_id = $user->id;

            $count = Cart::where('user_fk', $user_id)->count();
        }
        else
        {
            $count = '';
        }

        return view('products.view', [
            'book' => $book,
            'count' => $count,
        ]);
    }

    public function addCart(int $id)
    {
        $book_fk = $id;

        $user = Auth::user();

        $user_fk = $user->id;

        $data = new Cart;

        $data->user_fk = $user_fk;

        $data->book_fk = $book_fk;

        $data->save();

        $book = Book::findOrFail($id);

        return redirect()
                ->route('products.index')
                ->with('feedback.message', 'El libro ' . e($book->title) . ' se agregó con éxito al carrito.');
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
                ->with('feedback.message', 'Se eliminó un libro ' . e($cart->book->title) . ' con éxito del carrito.');
        }catch(\Exception $e){

            return redirect()
                ->back(fallback: route('cart.view'))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y el libro no pudo ser eliminado.')
                ->with('feedback.type', 'danger');
        }
    }
}
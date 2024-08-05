<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

use App\Models\Cart;
use Illuminate\SUpport\Facades\Auth;

class NoveltyController extends Controller
{
    public function all()
    {

        $publications = Publication::all();

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

        return view('news.index', [
            'publications' => $publications,
            'count' => $count,
        ]);
    }

    public function view(int $id)
    {

        $publication = Publication::findOrFail($id);

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

        return view('news.view', [
            'publication' => $publication,
            'count' => $count,
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publication;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class UsersController extends Controller
{
    public function all()
    {

        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function view(int $id)
    {
        $user = User::findOrFail($id);

        $orders = Order::all();

        $user_id = $user->id;

        $products = $orders->where('user_fk', $user_id);

        return view('users.view', [
            'products' => $products,
            'user' => $user,
        ]);
    }

    public function editForm(int $id)
    {
        $user = User::findOrFail($id);

        return view('profile.edit-form', [
            'user' => $user,
        ]);
    }

    public function editProcess(int $id, Request $request)
    {
        $request->validate(User::VALIDATION_RULES, User::VALIDATION_MESSAGES);

        $user = User::findOrFail($id);

        $input = $request->only(['name', 'email']);

        try{

            DB::beginTransaction();

            $user->update($input);

            DB::commit();

            return redirect()
                ->route('profile.index')
                ->with('feedback.message', 'El usuario ' . e($user->email) . ' se editó con éxito.')
                ->with('feedback.type', 'success');
        }catch(\Exception $e){

            DB::rollback();

            return redirect()
                ->back(fallback: route('profile.edit-form', ['id' => $id]))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error y el usuario no pudo ser editado.')
                ->with('feedback.type', 'dander');;

        }
    }
}
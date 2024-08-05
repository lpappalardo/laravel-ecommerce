<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view("auth.login-form");
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!auth()->attempt($credentials)) {

            return redirect()
                ->route('auth.login.form')
                ->withInput()
                ->with('feedback.message', 'Las credenciales ingresadas no coinciden con nuestros registros.')
                ->with('feedback.type', 'danger');  
        }

        return redirect()
            ->route('books.index')
            ->withInput()
            ->with('feedback.message', 'Sesión iniciada con éxito.')
            ->with('feedback.type', 'success');
    }

    public function logoutProcess(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login.form')
            ->withInput()
            ->with('feedback.message', 'Sesión cerrada con éxito.')
            ->with('feedback.type', 'success');
    }

    public function registerForm()
    {
        return view("auth.register-form");
    }

    public function registerProcess(Request $request)
    {

        $request->validate(User::VALIDATION_RULES, User::VALIDATION_MESSAGES);

        $input = $request->only(['email', 'password']);

        try {

            DB::beginTransaction();

            // $user = User::create($input);

            User::create($input);

            DB::commit();
            
            return redirect()
                ->route('auth.login.form')
                ->with('feedback.message', 'Se ha generado el nuevo usuario con éxito.');
        }catch(\Exception $e){

            DB::rollback();

            return redirect()
                ->back(fallback: route('auth.register.form'))
                ->withInput()
                ->with('feedback.message', 'Ocurrió un error no se pudo regitrar el usuario.')
                ->with('feedback.type', 'danger');
        }
    }
}

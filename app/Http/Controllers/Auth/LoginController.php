<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/app/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request)
    {
        $erro = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe.';
        }
        if ($request->get('erro') == 2) {
            $erro = 'Necesśario realizar login para ter acesso à pagina.';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'email' => 'required|email',
            'senha' => 'required',
        ];

        $feedback = [
            'email.required' => 'O campo email é obrigatório.',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $credentials = $request->only('email', 'senha');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
            $user = Auth::user();

            if ($user->hasVerifiedEmail()) {
                return redirect()->intended($this->redirectTo);
            } else {
                Auth::logout();

                return redirect()->route('verification.notice');
            }
        } else {
            return redirect()->route('login', ['erro' => 1]);
        }
    }

    public function logout(Request $request)
    {
        Log::info('Método sair foi chamado');
        Auth::logout();

        return redirect()->route('app.home');
    }
}

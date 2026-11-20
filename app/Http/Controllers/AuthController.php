<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect()
            ->route('signin')
            ->with('success', 'Регистрация успешно завершена. Теперь войдите в аккаунт.');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Неверный email или пароль.',
            ])->withInput();
        }

        $request->session()->regenerate();

        Auth::login($user);

        $token = $user->createToken('auth-token');

        $request->session()->put(
            'auth_token_id',
            $token->accessToken->id
        );

        return redirect()
            ->route('home')
            ->with('success', 'Вы успешно вошли в аккаунт.');
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $tokenId = $request->session()->pull('auth_token_id');

        if ($tokenId) {
            $user->tokens()->whereKey($tokenId)->delete();
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('home');
    }
}

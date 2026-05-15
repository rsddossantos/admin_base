<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'current_password' => ['required', 'current_password'],
                'password' => [
                    'required',
                    Password::defaults()->letters()->numbers()->symbols(),
                    'confirmed',
                ],
            ],
            [
                'current_password.required' => 'Informe sua senha atual.',
                'current_password.current_password' => 'A senha atual informada está incorreta.',

                'password.required' => 'Informe a nova senha.',
                'password.letters' => 'A senha deve conter letras, números e ao menos 1 caractere especial.',
                'password.numbers' => 'A senha deve conter letras, números e ao menos 1 caractere especial.',
                'password.symbols' => 'A senha deve conter letras, números e ao menos 1 caractere especial.',
                'password.confirmed' => 'A confirmação da senha não confere.',
            ]
        );

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }
}

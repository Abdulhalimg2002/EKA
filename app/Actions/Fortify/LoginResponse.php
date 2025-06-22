<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        // توجيه حسب الدور
        if ($user->role === 'admin') {
            return redirect()->intended('/Adashboard');
        }

        return redirect()->intended('/home');
    }
}

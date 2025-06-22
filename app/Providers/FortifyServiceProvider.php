<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\RedirectsUsers;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Actions\Fortify\LoginResponse as CustomLoginResponse;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);

    // إن كنت أضفت أيضاً LogoutResponse
    $this->app->singleton(
        \Laravel\Fortify\Contracts\LogoutResponse::class,
        \App\Actions\Fortify\LogoutResponse::class
    );
        //
    }

    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // إعادة التوجيه بناءً على نوع المستخدم بعد login أو reset password
        app()->singleton(RedirectsUsers::class, fn () => new class implements RedirectsUsers {
            public function redirectPath()
            {
                $user = auth()->user();

                if ($user && property_exists($user, 'role')) {
                    return $user->role === 'admin' ? '/Adashboard' : '/home';
                }

                // إذا لم يكن مسجلاً الدخول أو لا يوجد دور معرف، التوجيه للصفحة الرئيسية
                return '/home';
            }
        });
    }
}

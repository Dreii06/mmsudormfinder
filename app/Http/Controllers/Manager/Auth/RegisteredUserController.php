<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Dorms;
use App\Models\Registrant;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('manager.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:managers',
            'password' => 'required|string|confirmed|min:8',
            'dorm_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:255'
        ]);

        $registrant = Registrant::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dorm_name' => $request->dorm_name,
            'mobile_num' => $request->mobile_number
        ]);

        VerifyEmail::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'manager.verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });

        event(new Registered($registrant));

        return view('manager.auth.registerlogin');
    }
}

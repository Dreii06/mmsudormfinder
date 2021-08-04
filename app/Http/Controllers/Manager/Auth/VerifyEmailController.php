<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated manager's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user('manager')->hasVerifiedEmail()) {
            return redirect()->intended(route('manager.dashboard').'?verified=1');
        }

        if ($request->user('manager')->markEmailAsVerified()) {
            event(new Verified($request->user('manager')));
        }

        return redirect()->intended(route('manager.dashboard').'?verified=1');
    }
}

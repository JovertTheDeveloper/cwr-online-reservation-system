<?php

namespace App\Http\Controllers\Root\Auth;

use App\User;
use App\PasswordReset;
use App\Notifications\SendsPasswordResetLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Carbon\Carbon, Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('root.guest');
    }

    public function showLinkRequestForm()
    {
        return view('root.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ]);

        $email = $request->input('email');
        $token = $this->generateResetToken();

        $user = User::where('email', $email)->first();
        $user->notify(new SendsPasswordResetLink($token));
        $this->saveResetToken($user, $token);

        return redirect()->route('root.login');
    }

    protected function generateResetToken() {
        $key = config('app.key');

        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }

        return hash_hmac('sha256', Str::random(40), $key);
    }

    protected function saveResetToken(User $user, $token) {
        PasswordReset::where('email', $user->email)->delete();

        $password_reset = new PasswordReset;
        $password_reset->email = $user->email;
        $password_reset->token = $token;
        $password_reset->created_at = Carbon::now();
        $password_reset->save();
    }
}

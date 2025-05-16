<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Str;

class ResetPassword extends Component
{
    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    public function mount($token, $email)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
    if (Auth::check()) {
        Auth::logout(); // Đăng xuất người dùng
    }
        $this->token = $token;
        $this->email = $email;
        Log::info('Received token:', ['token' => $this->token, 'email' => $this->email]);
    }
    //save function
    public function save(){
        $this->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset(
            [
            'email' => $this->email,
            'token' => $this->token,
            'password' => $this->password,
            ],
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        }
        );
        Log::info('Password reset status:', ['status' => $status]);

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login');
        } else {
            Log::error('Password reset failed', ['status' => $status]);
            $this->addError('email', __($status));
            return redirect()->back();
        }
    }
    public function render()
    {
        return view('livewire.reset-password');
    }
}

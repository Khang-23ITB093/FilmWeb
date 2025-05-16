<?php

namespace App\Livewire;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginPage extends Component
{
    public $email;
    public $password;

    public function save(){
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                // Chuyển hướng admin đến Filament Dashboard
                return redirect('/admin');
            }

            // Chuyển hướng người dùng không phải admin đến trang khác
            return redirect('/');
        } else {
            session()->flash('error', 'Invalid credentials');
        }
    }


    public function render()
    {
        return view('livewire.login-page')->layout('components.layouts.log-res');  // Chỉ định layout thông qua phương thức render()

    }
}

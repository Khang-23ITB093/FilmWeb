<?php

namespace App\Livewire;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Models\User;
use App\Models\UserSubscriptions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
class RegisterPage extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

public function save()
{
    $this->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:1|confirmed',
    ]);

    $user = User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
        'avatar' => 'default-avatar.png',
        'role' => 'user',
        'sex' => 'male',
        'remember_token' => Str::random(10),
    ]);

    try {
        UserSubscriptions::create([
            'user_id' => $user->id,
            'subscription_id' => 6,
            'subscribed_at' => now(),
            'expiry_date' => now()->addDays(30),
        ]);
    } catch (\Exception $e) {
        \Log::error('Error creating user subscription: ' . $e->getMessage());
        session()->flash('error', 'An error occurred while creating your subscription. Please try again.');
        return;
    }

    auth()->login($user);

    return redirect('/');
}
    public function render()
    {
        return view('livewire.register-page')->layout('components.layouts.log-res');  // Chỉ định layout thông qua phương thức render()

    }
}

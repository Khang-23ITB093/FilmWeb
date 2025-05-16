<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ProfilePage extends Component
{
    public User $user;
    public $subscription_name;

    public function mount($id){
        $this->user = User::find($id);
        if ($this->user->subscription) {
            $this->subscription_name = $this->user->subscription->subscription->name;
        } else {
            $this->subscription_name = 'No subscription'; // Nếu người dùng không có subscription
        }
    }
    public function render()
    {
        return view('livewire.profile-page');
    }
}

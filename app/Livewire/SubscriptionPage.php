<?php

namespace App\Livewire;

use App\Models\Subscription;
use Livewire\Component;

class SubscriptionPage extends Component
{
    public $services;
    public $endows=[];
    public function render()
    {
        $this->services = Subscription::query()->where('duration', '1 month')->get();
        foreach ($this->services as $service) {
            // Kiểm tra nếu 'endow' là chuỗi, nếu không thì bỏ qua việc giải mã
            if (is_string($service->endow)) {
                // Giải mã nếu là chuỗi JSON
                $this->endows[] = json_decode($service->endow, true);
            } else {
                // Nếu không phải chuỗi, thêm trực tiếp mảng vào
                $this->endows[] = $service->endow;
            }
        }

        return view('livewire.subscription-page');
    }
}

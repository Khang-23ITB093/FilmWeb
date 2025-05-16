<?php

namespace App\Livewire;

use App\Models\Subscription;
use App\Models\UserSubscriptions;
use Carbon\Carbon;
use Livewire\Attributes\Url;
use Livewire\Component;

class Service extends Component
{
    #[Url]
    public $name;
    public $id_user;
    public $month;
    public $price;
    public $emailUser;
    public $duration;
    public $discountCode;
    public $discountAmount;
    public $total;
    public $option;

    public $showModal = false;
    public $timeRemaining = 540; // 9 minutes

    protected $listeners = ['startTimer'];

    public function showModal()
    {
        $this->showModal = true;
        $this->startTimer();
    }

    public function hideModal()
    {
        $this->showModal = false;
        $this->timeRemaining = 540; // Reset the timer
    }

    public function startTimer()
    {
        $this->dispatchBrowserEvent('start-timer');
    }

    public function countdown()
    {
        if ($this->timeRemaining > 0) {
            $this->timeRemaining--;
        }
    }
    public function mount($month = '1 month')
    {
        $this->month = $month;
        $this->id_user = auth()->id();
        $this->emailUser = auth()->user()->email;
        $this->updatePrice();
    }

    public function updatedMonth($value)
    {
        $this->updatePrice();
    }


    private function updatePrice()
    {
        $subscription = Subscription::query()
            ->where('name', $this->name)
            ->where('duration', $this->month)
            ->first();

        $this->price = $subscription ? $subscription->price : 0;
    }

    public function applyDiscount()
    {
        // Ví dụ mã khuyến mãi "PROMO10" giảm 10%
        if ($this->discountCode == 'PROMO10') {
            $this->discountAmount = $this->price * 0.10;
        } else {
            $this->discountAmount = 0;
        }
    }

    public function getTotalPrice()
    {
        return $this->price - $this->discountAmount;
    }
    public function handlePayment()
    {
        // Tìm gói đăng ký dựa trên tên của gói
        $subscription = Subscription::where('name', $this->name)->first();

        if ($subscription) {
            $userSubscription = UserSubscriptions::where('user_id', auth()->id())->first();

            if ($userSubscription) {
                // Cập nhật subscription_id với ID của gói đăng ký tìm thấy
                $userSubscription->subscription_id = $subscription->id;

                // Cập nhật lại thời gian bắt đầu
                $userSubscription->subscribed_at = now();

                // Chuyển đổi chuỗi '1 month', '3 months' thành số nguyên tương ứng
                $monthsToAdd = $this->parseMonths($this->month); // Ví dụ: '1 month' -> 1, '3 months' -> 3

                // Kiểm tra và đảm bảo expiry_date là một đối tượng Carbon
                $expiryDate = $userSubscription->expiry_date ? Carbon::parse($userSubscription->expiry_date) : now();

                // Cập nhật thời gian hết hạn
                $userSubscription->expiry_date = $expiryDate->addMonths($monthsToAdd); // Cộng thêm tháng vào ngày hiện tại

                // Lưu thay đổi vào cơ sở dữ liệu
                $userSubscription->save();
            }
        }
    }

    /**
     * Hàm phân tích chuỗi tháng và chuyển đổi thành số nguyên.
     *
     * @param string $monthString Chuỗi tháng như '1 month', '3 months'
     * @return int
     */
    private function parseMonths($monthString)
    {
        // Tách chuỗi để lấy số tháng
        preg_match('/\d+/', $monthString, $matches);

        // Trả về số tháng, mặc định là 1 nếu không thể tìm thấy số
        return isset($matches[0]) ? (int) $matches[0] : 1;
    }



    public function render()
    {
        return view('livewire.service',[
            'pack' => Subscription::query()->get()
        ]);
    }
}

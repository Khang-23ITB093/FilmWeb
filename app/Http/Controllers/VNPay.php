<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\UserSubscriptions;
use Carbon\Carbon;
use Illuminate\Support\Str;

class VNPay extends Controller
{
    public function payment(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return', ['id' => $request->id,'name'=>$request->name,'month'=> $request->month]); // Sử dụng route trả về sau thanh toán
        $vnp_TmnCode = "RN9DBPK7"; // Mã website tại VNPAY
        $vnp_HashSecret = "SJYVI1JQTQ3BM0ZFSUYL3HT5PH18HBXI"; // Chuỗi bí mật

        $vnp_TxnRef = Str::random(12); // Mã đơn hàng
        $vnp_OrderInfo = "Payment " . $request->name;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->amount * 2500000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = $request->option;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // Trả về URL để người dùng được chuyển hướng đến VNPay
        $returnData = array('code' => '00', 'message' => 'success', 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    // Phương thức xử lý khi VNPay trả về
    public function vnpayReturn(Request $request)
    {
        // Xác minh trạng thái thanh toán
        $paymentStatus = $this->verifyPayment($request);

        if ($paymentStatus === 'success') {
            // Gọi phương thức xử lý thanh toán
            $this->handlePayment($request);
            return redirect()->route('profile.page', ['id' => $request->id])->with('success', 'Thanh toán thành công!');
        } else {
            return redirect()->route('profile.page', ['id' => $request->id])->with('error', 'Thanh toán thất bại!');
        }
    }

    // Xử lý logic thanh toán thành công
    public function handlePayment(Request $request)
    {
        $subscription = Subscription::where('name', $request->name)->first();

        if ($subscription) {
            $userSubscription = UserSubscriptions::where('user_id', auth()->id())->first();

            if ($userSubscription) {
                $userSubscription->subscription_id = $subscription->id;
                $userSubscription->subscribed_at = now();

                // Chuyển đổi '1 month', '3 months' thành số nguyên
                $monthsToAdd = $this->parseMonths($request->month);
                $expiryDate = now();

                // Tạo một bản sao của expiryDate để tránh thay đổi đối tượng gốc
                $newExpiryDate = $expiryDate->copy()->addMonths($monthsToAdd);

                // Cập nhật thời gian hết hạn
                $userSubscription->expiry_date = $newExpiryDate;

                // Cập nhật thời gian hết hạn
//                dd( $monthsToAdd,$expiryDate,'Months to add:', $monthsToAdd, 'New expiry date:', $newExpiryDate); // Kiểm tra giá trị sau khi cập nhật
                // Lưu thay đổi vào cơ sở dữ liệu
                $userSubscription->save();
            }
        }
    }

    // Xác minh thanh toán dựa trên phản hồi từ VNPay
    private function verifyPayment(Request $request)
    {
        // VNPay trả về mã phản hồi, '00' chỉ ra thanh toán thành công
        if ($request->vnp_ResponseCode === '00') {
            return 'success';
        }
        return 'failed';
    }

    // Chuyển chuỗi tháng thành số nguyên
    private function parseMonths($monthString)
    {
        $months = (int) filter_var($monthString, FILTER_SANITIZE_NUMBER_INT);
        return $months;
    }

}

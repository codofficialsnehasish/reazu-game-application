<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\PaymentMethod;
use App\Models\SubscriptionPlan;

class WalletApiController extends Controller
{
    public function get_payment_methods(){
        $payment_methods = PaymentMethod::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get()
            ->map(function ($paymentMethod) {
                $paymentMethod->image = asset('storage/' . $paymentMethod->image);
                return $paymentMethod;
            });

        return apiResponse(true, 'Payment Methods', ['payment_methods' => $payment_methods], 200);
    }

    public function get_subscription_plans(){
        $subscription_plans = SubscriptionPlan::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return apiResponse(true, 'Subscription Plans', ['ubscription_plans' => $subscription_plans], 200);
    }
}
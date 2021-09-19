<?php

namespace App\Components;

use Payjp\Payjp;
use Payjp\Customer;
use Payjp\Charge;

class PaymentComponent
{

    public function __construct()
    {
        Payjp::setApiKey(config('payjp.secret_key'));
    }

    /*
     * PayJPに与信枠を確保
     * $customer_id: 必須: 顧客番号
     * $fixed_price: 必須: 取引金額
     */
    public function makeAuthorization($customer_id, $fixed_price)
    {

        $charge = Charge::create([
            "customer" => $customer_id,
            "amount" => $fixed_price,
            "currency" => 'jpy',
            "capture" => 'false',
            "expiry_days" => 60,
        ]);
        return $charge;

    }

    /*
     * PayJPに売上確定
     * $charge_id: 必須: 取引番号
     */
    public function makeSettlement($charge_id)
    {
        $ch = Charge::retrieve($charge_id);
        $ch->capture();
    }

    /*
     * PayJPの顧客を作成
     * $token: 必須: トークン
     */
    public function createCustomer($token)
    {
        $customer = Customer::create([
            'card' => $token,
        ]);
        return $customer;
    }

    /*
     * 顧客のカード情報を取得
     * $customer_id: 必須: 顧客番号
     */
    public function searchCustomer($customer_id)
    {
        return Customer::retrieve($customer_id);
    }

    /*
     * PayJPの与信枠、売上を払い戻し
     * $charge_id: 必須: 取引番号
     */
    public function refundPayment($charge_id)
    {
        $ch = Charge::retrieve($charge_id);
        $ch->refund();
    }
}

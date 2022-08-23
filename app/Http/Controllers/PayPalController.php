<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaid;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class PayPalController extends Controller
{
    public function getExpressCheckout($orderId)
    {
        $checkoutData = $this->checkoutData($orderId);
        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($checkoutData);
        
        return redirect($response['paypal_link']);
    }

    public function getExpressCheckoutSuccess(Request $request, $orderId)
    {
        $provider = new ExpressCheckout;
        $token = $request->token;
        $PayerID = $request->PayerID;
        $checkoutData = $this->checkoutData($orderId);
        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // Note that 'token', 'PayerID' are values returned by PayPal when it redirects to success page after successful verification of user's PayPal info.
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $PayerID);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

            if (in_array($status, ['Completed', 'Processed'])) {

                $order = Order::find($orderId);
                $order->is_paid = 1;
                $order->save();
                Mail::to($order->user->email)->send(new OrderPaid($order));

                Cart::clear();

                return redirect()->route('order.complete', $order)->withMessage('Pago exitoso');
            }
        } else {
            return redirect()->route('show.index')->withMessage('Pago fallido');
        }
    }
    public function cancelPage()
    {
    }

    public function checkoutData($orderId)
    {

        $cartItems = array_map(
            function ($item) {
                return [
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['quantity'],
                ];
            },
            Cart::getContent()->toarray());

        if (Cart::getCondition('flat-rate')) {
            $flat_rate = [
                'name' => 'flat-rate',
                'price' => number_format(Cart::getCondition('flat-rate')->parsedRawValue,2),
                'qty' => 1
            ];
            array_push ($cartItems, $flat_rate);
        }
        
        $checkoutData = [
            'items' => $cartItems,
            "invoice_id" => uniqid(),
            "invoice_description" => "descripcion de orden",
            "return_url" => route('paypal.success', $orderId),
            "cancel_url" => route('paypal.cancel'),
            "total" => number_format(Cart::getTotal(),2),
            
        ];


        return $checkoutData;
    }
}

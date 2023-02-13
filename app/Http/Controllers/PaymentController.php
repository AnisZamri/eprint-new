<?php
   
namespace App\Http\Controllers;
   
use Omnipay\Omnipay;
use App\Models\Orders;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\OrderProducts;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
   
class PaymentController extends Controller
{
   
    private $gateway;
   
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }
   
    /**
     * Call a view.
     */
    public function index()
    {
        return view('payment');
    }
   
    /**
     * Initiate a payment on PayPal.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function charge(Request $request)
    {
        if($request->input('submit'))
        {   try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
                ))->send();

                $orderId = Orders::insertGetId([
                    'custId'=>Auth::user()->id,
                    'orderName'=>$request->orderName,
                    'orderPhone'=>$request->orderPhone,
                    'orderEmail'=>$request->orderEmail,
                    'orderAddress'=>$request->orderAddress,
                    'orderTotalPrice'=>$request->orderTotalPrice,
                    'orderStatus'=>$request->orderStatus,
                    'created_at'=>Carbon::now()
                ]);
        
                $cart = session()->get('cart', []);
                foreach($cart as $key=>$val){
                    OrderProducts::insert
                    ([
                        'orderId' => $orderId,
                        'subProductId' => $val['id'],
                        'orderQuantity' => $val['quantity'],
                        'orderProduct' => $val['product_name'],
                        'orderPrice' => $val['price'],
                        'created_at' => Carbon::now()
                    ]);}
            
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }
   
    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
           
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();
           
                // Insert transaction data into the database
                $payment = new Payment;
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();

                $notification = array(
                    'message' => 'Payment Successfully Updated',
                    'alert-type' => 'success'
                );
        
                return redirect()->route('custViewOrder')->with('success','Payment Successful');
           
           

                
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }
   
    /**
     * Error Handling.
     */
    public function error()
    {
        return 'User cancelled the payment.';
    }
}
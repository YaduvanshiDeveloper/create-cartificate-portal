<?php
namespace App\Http\Helper;
use Ixudra\Curl\Facades\Curl;
use Log;
use Session;
class paymentHelper{
    public static function  MakePayment($trans_id,$amount)
    {


        $payload = [
            "merchantId"=> "PGTESTPAYUAT",
            "merchantTransactionId"=> $trans_id,
            "merchantUserId"=> "MUID123",
            "amount"=> $amount*100,
            "redirectUrl"=>  "http://127.0.0.1:8000",
            "redirectMode"=> "REDIRECT",
            "callbackUrl"=> "http://127.0.0.1:8000/response",
            "mobileNumber"=> "9140896260",
            "paymentInstrument"=> [
              "type"=> "PAY_PAGE"
            ]
            ];

        $data = base64_encode(json_encode($payload));
        // $salt_key = '6963f6ae-e802-4f4c-bdba-13eb4a02b775';
        $salt_key = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;
        $string = $data.'/pg/v1/pay'.$salt_key;
        $sha256 =hash('sha256',$string);
        $finalXheader = $sha256.'###'.$saltIndex;
        $header_token = "X-Verify: ".$finalXheader;
         $response = Curl::to('https://api-preprod.phonepe.com/apis/hermes/pg/v1/pay')
        ->withHeader('Content-Type:application/json')
        ->withHeader('accept:application/json')
        ->withHeader('X-VERIFY:' .$finalXheader)
        ->withData(json_encode(['request'=>$data]))->post();

        $data = json_decode($response);
        return $data->data->instrumentResponse->redirectInfo->url;


    }

     public static function PaymentStatus($payment)
     {
         if($payment){
             $callBack = base64_decode($payment['response']);

             Log::info(json_encode(Session::get('details')));
             $service = Session::get('details');
             $data = json_decode($callBack);
             if($data->success==true)
             {
                 $update_payment_status = $service['model_name']::where('id',session()->get('order_id'))->first();
                 $update_payment_status->payment_staus = $data->code;
                 $update_payment_status->merchant_id = $data->data->merchantId;
                 $update_payment_status->merchant_transaction_id = $data->data->merchantTransactionId;
                 $update_payment_status->transactionid = $data->data->transactionId;
                 $update_payment_status->status = $data->data->state;
                 $update_payment_status->amount = $data->data->amount/100;
                 $update_payment_status->save();
             }else{
                 Log::info('Something went wrong'.$data);
             }
         }
     }
}

?>
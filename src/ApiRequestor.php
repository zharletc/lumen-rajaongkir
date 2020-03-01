<?php

namespace Zharletc\Rajaongkir;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class ApiRequestor extends Controller
{
    public static function get($url)
    {
        $ch = curl_init();
        $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . Config::$clientKey
            ),
        );
        curl_setopt_array($ch, $curl_options);
        
        $response = json_decode(curl_exec($ch));
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
          return "cURL Error #:" . $err;
        } else {
          $status = $response->rajaongkir->status->code;
          if($status == 200){
            return ['code' => 1 , 'message' => 'Ok From Rajaongkir' , 'result' => $response->rajaongkir->results];
          }
          else{
            return ['code' => 0 , 'message' => 'Error From Rajaongkir' ];
          }
        }
        
    }

    public static function post($url, $request_body)
    {
        $body = http_build_query($request_body);
        $ch = curl_init();
        $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . Config::$clientKey
            ),
        );

        curl_setopt_array($ch, $curl_options);
        
        $response = json_decode(curl_exec($ch));
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
          $status = $response->rajaongkir->status->code;
          if($status == 200){
            return ['code' => 1 , 'message' => 'Ok From Rajaongkir' , 'result' => $response->rajaongkir->results];
          }
          else{
            return ['code' => 0 , 'message' => $response ];
          }
        }
        
    }
}

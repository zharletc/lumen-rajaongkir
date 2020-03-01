<?php

namespace Zharletc\Rajaongkir;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class ShipmentRequest extends Controller
{
    public static function cost($data)
    {
        $costs = ApiRequestor::post(
            Config::getBaseUrl() . '/cost',
            $data
        );

        if($costs['code'] == 1){
            return $costs['result'];
        }else{
            return $costs['message'];
        }
    }

    public static function province()
    {
        return ApiRequestor::get(Config::getBaseUrl() . '/province');
    }

    public static function city($province = false)
    {
        $cities = $province ? ApiRequestor::get(Config::getBaseUrl() . '/city?province='.$province) : ApiRequestor::get(Config::getBaseUrl() . '/city');
        if($cities['code'] == 1){
            return $cities['result'];
        }else{
            return $cities['message'];
        }
    }

}

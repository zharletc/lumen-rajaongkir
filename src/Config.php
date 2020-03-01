<?php

namespace Zharletc\Rajaongkir;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class Config extends Controller
{
    public static $clientKey = "c2a67ea04179fd3bcc04800a1a6fb0c9";

    const STARTER_BASE_URL = 'https://api.rajaongkir.com/starter';
    const BASIC_BASE_URL = 'https://api.rajaongkir.com/basic';
    const PRO_BASE_URL = 'https://pro.rajaongkir.com/api';

    public static function getBaseUrl()
    {
        return Config::STARTER_BASE_URL;
    }
}

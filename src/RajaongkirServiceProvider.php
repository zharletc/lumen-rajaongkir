<?php

namespace Zharletc\Rajaongkir;

use Illuminate\Support\ServiceProvider;

class RajaongkirServiceProvider extends ServiceProvider{
	public function boot(){

	}
	public function register(){
		// $this->app->bind('shipment',function($app){
		// 	return new ShipmentRequest;
		// });
	}
	public function provides(){
		// return ShipmentRequest::class;
	}
}
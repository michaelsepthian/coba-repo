<?php

class Controller {
	public function view($view ,$data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}
	public function service($service){
		require_once '../app/domain/sales/service/' . $service . '.php';
		return new $service;
	}
}

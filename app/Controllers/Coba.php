<?php

namespace App\Controllers;

class Coba extends BaseController
{
	public function index()
	{
		echo "coba coba euy";
	}

	public function about($name = '', $age = '')
	{
		echo "Halo nama saya $name, usia saya $age";
	}
}

<?php

namespace App\Controllers;

class Comic extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Daftar Komik'
		];
		return view('comic/index', $data);
	}
}

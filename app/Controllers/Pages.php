<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "Home | LearningCI4",
			'tes' => ['satu', 'dua', 'tiga']
		];
		echo view('pages/home', $data);
	}

	public function about()
	{
		$data = [
			'title' => "About Me | LearningCI4"
		];
		echo view('pages/about', $data);
	}
}

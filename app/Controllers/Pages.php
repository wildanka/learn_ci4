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


	public function contact()
	{
		$data = [
			'title' => "Contact Us | LearningCI4",
			'alamat' => [
				[
					'tipe' => 'rumah',
					'alamat' => 'Jl. yang lurus no.1',
					'kota' => 'Cilegon'
				],
				[
					'tipe' => 'kantor',
					'alamat' => 'Jl. yang diberkahi no.1',
					'kota' => 'Cilegon'
				]
			]

		];
		return view('pages/contact', $data);
	}
}

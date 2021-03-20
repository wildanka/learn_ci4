<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Daftar Komik'
		];

		//
		//$komikModel = new /App/ //-> slashnya dibalik (backslash)
		$komikModel = new ComicModel();
		$comics = $komikModel->findAll();

		dd($comics);

		return view('comic/index', $data);
	}
}

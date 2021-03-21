<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{
	protected $comicModel;
	public function __construct()
	{
		$this->comicModel = new ComicModel();
	}


	public function index()
	{
		$komik = $this->comicModel->getComic();

		$data = [
			'title' => 'Daftar Komik',
			'komik' => $komik
		];

		//
		//$komikModel = new /App/ //-> slashnya dibalik (backslash)
		// $komikModel = new ComicModel();
		// $comics = $komikModel->findAll();

		// dd($comics);

		return view('comic/index', $data);
	}

	public function detail($slug)
	{
		$komik = $this->comicModel->getComic($slug);

		$data = [
			'title' => 'Detail Komik',
			'komik' => $komik
		];
		return view('comic/detail', $data);
	}

	public function add()
	{
		// $komik = $this->comicModel->getComic($slug);

		$data = [
			'title' => 'Tambah Data Komik'
		];
		return view('comic/add', $data);
	}

	public function save()
	{
		$req = $this->request->getVar();
		dd($req);
	}
}

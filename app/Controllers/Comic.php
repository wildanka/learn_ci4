<?php

namespace App\Controllers;

use App\Models\ComicModel;
use Config\Validation;

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

		//jika komik tidak ada di tabel
		if (empty($data['komik'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan.');
		}

		return view('comic/detail', $data);
	}

	public function add()
	{
		// $komik = $this->comicModel->getComic($slug);
		// session();

		$data = [
			'title' => 'Tambah Data Komik',
			'validation' => \Config\Services::validation()
		];

		return view('comic/add', $data);
	}

	public function save()
	{
		//validasi input
		if (!$this->validate([
			'title' => 'required|is_unique[comic.title]'
		])) {
			$validation = \Config\Services::validation();
			// dd($validation);
			return redirect()->to('add')->withInput()->with('validation', $validation);
		}

		$slug = url_title($this->request->getVar('title'), '-', true);

		$this->comicModel->save([
			'title' => $this->request->getVar('title'),
			'slug' => $slug,
			'writter' => $this->request->getVar('writter'),
			'publisher' => $this->request->getVar('publisher'),
			'cover' => $this->request->getVar('cover'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/comic');
		// $req = $this->request->getVar();
		// dd($req);

	}
}

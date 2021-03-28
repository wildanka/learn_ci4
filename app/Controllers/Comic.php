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
			'title' => [
				'rules' => 'required|is_unique[comic.title]',
				'errors' => [
					'required' => '{field} komik harus diisi.',
					'is_unique' => '{field} komik sudah pernah terdaftar.'
				]
			]
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

	//hard delete
	public function delete($id)
	{
		$id_comic = $id;
		// $this->comicModel->delete($id); ini cuma bisa dijalankan kalau nama kolom id di table db kita adalah 'id'
		$this->comicModel->where(['id_comic' => $id])->delete(); //karena kolom id di table kita bernama 'id_comic', maka lakukan seperti ini
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');

		return redirect()->to('/comic');
	}


	public function edit($slug)
	{
		$data = [
			'title' => 'Tambah Data Komik',
			'validation' => \Config\Services::validation(),
			'comic' => $this->comicModel->getComic($slug)
		];

		return view('comic/edit', $data);
	}


	public function update($id)
	{
		//validasi input dengan slug
		//cek, kalau user tidak mengganti judul maka jangan pakai is_unique, jika user mengganti judul maka gunakan rules is_unique
		$oldComicSlug = $this->comicModel->getComic($this->request->getVar('slug'));
		$newComicSlug = $this->request->getVar('judul');
		if ($oldComicSlug['title'] == $newComicSlug) {
			$title_rule = 'required';
		} else {
			$title_rule = 'required|is_unique[comic.title]';
		}

		if (!$this->validate([
			'title' => [
				'rules' => $title_rule,
				'errors' => [
					'required' => '{field} komik harus diisi.',
					'is_unique' => '{field} komik sudah pernah terdaftar.'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			// dd($validation);
			return redirect()->to('/comic/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
		}

		$slug = url_title($this->request->getVar('title'), '-', true);

		//method save di ci4 sekarang lebih canggih, jika ada ID maka dia akan update data, jika tidak ada, maka dia akan input data baru.
		$this->comicModel->save([
			'id_comic' => $id,
			'title' => $this->request->getVar('title'),
			'slug' => $slug,
			'writter' => $this->request->getVar('writter'),
			'publisher' => $this->request->getVar('publisher'),
			'cover' => $this->request->getVar('cover'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/comic');
	}
}

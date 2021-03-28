<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = 'comic';
    protected $useTimestamps = true;
    //https://codeigniter4.github.io/userguide/models/model.html
    protected $primaryKey = 'id_comic';
    protected $allowedFields = ['title', 'slug', 'writter', 'publisher', 'cover'];

    public function getComic($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        } else {
            return $this->where(['slug' => $slug])->first();
        }
    }
}

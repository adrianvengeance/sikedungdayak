<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'id_news';
    protected $allowedFields    = ['title', 'slug', 'body', 'author', 'image', 'groupmonth'];
    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getNewsBySlug($slug = false)
    {
        if ($slug === false) {
            return $this->get()->getResult();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getNewsById($id = false)
    {
        if ($id === false) {
            return $this->get()->getResultArray();
        }
        return $this->where(['id_news' => $id])->first();
    }

    public function getNewsGroup()
    {
        $builder = $this->db->table('news');
        $builder->select('*');
        $builder->orderBy('created_at', 'DESC');
        return $builder->get()->getResult();
    }
}

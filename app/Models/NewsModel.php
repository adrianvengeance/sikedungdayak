<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'id_news';
    protected $allowedFields    = ['title', 'slug', 'body', 'author', 'category', 'image', 'groupmonth'];
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
        $builder->like('category', 'Berita');
        $builder->orderBy('created_at', 'DESC');
        return $builder->get()->getResult();
    }

    public function getArticlesGroup()
    {
        $builder = $this->db->table('news');
        $builder->select('*');
        $builder->notLike('category', 'Berita');
        $builder->orderBy('created_at', 'DESC');
        return $builder->get()->getResult();
    }

    public function getNewest()
    {
        // $query = $this->query("SELECT * FROM news ORDER BY UNIX_TIMESTAMP(updated_at) DESC");
        $query = $this->query("SELECT *, DATE(updated_at) as mydate, TIME(updated_at) as mytime FROM news ORDER BY mydate DESC, mytime DESC");
        return $query->getResult();
    }

    public function categorylist()
    {
        $builder = $this->query("SELECT DISTINCT category FROM news");
        return $builder->getResultArray();
    }
}

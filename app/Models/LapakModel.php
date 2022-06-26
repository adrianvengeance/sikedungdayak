<?php

namespace App\Models;

use CodeIgniter\Model;

class LapakModel extends Model
{
    protected $table            = 'lapak';
    protected $primaryKey       = 'id_produk';
    protected $allowedFields    = ['nama', 'gambar', 'deskripsi', 'harga', 'no_wa'];
    protected $useTimestamps    = false;

    public function getproduct()
    {
        return $this->findAll();
    }
}

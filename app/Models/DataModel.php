<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table            = 'data';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = false;
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'numkk', 'nik', 'namaagt', 'tmplahir', 'tgllahir', 'umur', 'agama', 'goldar', 'jeniskel', 'keluarga', 'statusdiri', 'statuswarga', 'pendidikan', 'pekerjaan', 'ayah', 'ibu', 'hubungkel', 'alamatasal', 'alamatdesa', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kota', 'kodepos', 'provinsi', 'pbi', 'pkh', 'bpnt', 'bst'
    ];

    public function semuanya()
    {
        $query = $this->db->query("SELECT *, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age FROM data;");
        return $query->getResult();
    }

    public function umursemua()
    {
        $query = $this->db->query("SELECT tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS umur FROM data;");
        return $query->getResultArray();
    }

    public function umurjeniskel($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS umur");
        $builder->where("jeniskel", $lorp);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // public function umurjeniskel_05($lorp)
    public function umurjeniskel_03($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS umur");
        $builder->where("jeniskel", $lorp);
        // $builder->where("umur>0 AND umur<6");
        $builder->where("umur>0 AND umur<4");
        $query = $builder->get()->getResultArray();
        return count($query);
    }
    // public function umurjeniskel_0612($lorp)
    public function umurjeniskel_46($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS umur");
        $builder->where("jeniskel", $lorp);
        // $builder->where("umur>6 AND umur<13");
        $builder->where("umur>3 AND umur<7");
        $query = $builder->get()->getResultArray();
        return count($query);
    }
    // public function umurjeniskel_1317($lorp)
    public function umurjeniskel_718($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS umur");
        $builder->where("jeniskel", $lorp);
        // $builder->where("umur>12 AND umur<18");
        $builder->where("umur>6 AND umur<19");
        $query = $builder->get()->getResultArray();
        return count($query);
    }
    // public function umurjeniskel_1825($lorp)
    public function umurjeniskel_1956($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS umur");
        $builder->where("jeniskel", $lorp);
        // $builder->where("umur>17 AND umur<26");
        $builder->where("umur>18 AND umur<57");
        $query = $builder->get()->getResultArray();
        return count($query);
    }
    // public function umurjeniskel_64($lorp)
    public function umurjeniskel_57($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS umur");
        $builder->where("jeniskel", $lorp);
        // $builder->where("umur>63");
        $builder->where("umur>56");
        $query = $builder->get()->getResultArray();
        return count($query);
    }

    public function jumlahjeniskel($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select('id, namaagt');
        $builder->where('jeniskel', $lorp);
        $query = $builder->get()->getResultArray();
        return count($query);
    }

    public function pendidikanbyusia($pnddkn)
    {
        // $query = $this->db->query("SELECT namaagt, pendidikan, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS umur FROM data WHERE pendidikan LIKE '%$pnddkn%' AND umur BETWEEN 17 AND 63;");
        $query = $this->db->query("SELECT namaagt, pendidikan, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS umur FROM data WHERE pendidikan LIKE '%$pnddkn%';");
        return $query->getResultArray();
    }
    public function pendidikanall($pnddkn)
    {
        $query = $this->db->query("SELECT namaagt, pendidikan, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS umur FROM data WHERE pendidikan LIKE '%$pnddkn%';");
        return $query->getResultArray();
    }

    public function inforumah($nokk)
    {
        $builder = $this->db->table('data');
        $builder->select("*, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("numkk", $nokk);
        return $builder->get()->getResult();
    }

    public function jumlahkk($rt)
    {
        $builder = $this->db->table('data');
        $builder->select("numkk, namaagt");
        $builder->where("rt", $rt);
        $builder->where("hubungkel", "KEPALA KELUARGA");
        $query = $builder->get()->getResultArray();
        return count($query);
    }

    public function jobs()
    {
        $builder = $this->select("pekerjaan")->distinct()->orderBy('pekerjaan', 'ASC');
        return $builder->get()->getResult();
    }

    public function birthplace()
    {
        $builder = $this->select("tmplahir")->distinct()->orderBy('tmplahir', 'ASC');
        $result = $builder->get()->getResultArray();
        $newarray = array_column($result, "tmplahir");
        $gk = array_search('GUNUNG KIDUL', $newarray);
        unset($newarray[$gk]);
        return $newarray;
    }

    public function nik()
    {
        $builder = $this->db->table('data');
        $builder->select("nik");
        $builder->orderBy('nik', 'ASC');
        return $builder->get()->getResultArray();
    }

    public function namaagt()
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt");
        $builder->orderBy('namaagt', 'ASC');
        return $builder->get()->getResultArray();
    }

    public function niknamaagt()
    {
        return $this->select("nik, namaagt")->orderBy('nik', 'ASC')->get()->getResultArray();
    }

    // public function statuspindah()                           //cari table data where statuswarga = pindah, just used 1 time
    // {
    //     $builder = $this->db->table('data');
    //     $builder->select('nik, numkk, namaagt, jeniskel, tgllahir, agama, goldar, keluarga, statusdiri, statuswarga, pendidikan, pekerjaan, ayah, ibu, hubungkel');
    //     $builder->where('statuswarga', 'PINDAH');
    //     return $builder->get()->getResultArray();
    // }

    public function carinumkk($cari)
    {
        $builder = $this->db->table('data');
        $builder->select('*');
        $builder->Where('numkk', $cari);
        return $builder->get()->getRow();
    }
    public function carinik($cari)
    {
        $builder = $this->db->table('data');
        $builder->select('*');
        $builder->Where('nik', $cari);
        return $builder->get()->getRow();
    }
    public function carinamaagt($cari)
    {
        $builder = $this->db->table('data');
        $builder->select('*');
        $builder->Where('namaagt', $cari);
        return $builder->get()->getRow();
    }
    public function cariid($cari)
    {
        $builder = $this->db->table('data');
        $builder->select('*');
        $builder->Where('id', $cari);
        return $builder->get()->getRow();
    }

    public function cariniknama($cari)
    {
        $builder = $this->db->table('data');
        $builder->select('nik, numkk, namaagt, jeniskel, tgllahir, agama, goldar, keluarga, statusdiri, statuswarga, pendidikan, pekerjaan, ayah, ibu, hubungkel');
        $builder->Where('nik', $cari);
        $builder->orWhere('namaagt', $cari);
        return $builder->get()->getRow();
    }

    public function hapus($cari)
    {
        $builder = $this->db->table('data');
        $builder->select('*');
        $builder->Where('nik', $cari);
        return $builder->delete();
    }

    public function jobslist()
    {
        $jobs = $this->jobs();
        foreach ($jobs as $x => $y) {
            $kerjaan[] = $y->pekerjaan;
        };
        // $array = array_diff($kerjaan, ['Belum Bekerja', 'Tidak Bekerja']);
        // $array = array_diff($kerjaan, ['petani/pekebun']);
        return ($kerjaan);
    }
    public function getjobs($job)
    {
        $query = $this->db->query("SELECT namaagt, pekerjaan, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS umur FROM data WHERE pekerjaan LIKE '$job';");
        return $query->getResultArray();
    }

    public function kkrt($rt, $jeniskel)
    {
        return $this->where('rt', $rt)->where('hubungkel', 'KEPALA KELUARGA')->where('jeniskel', $jeniskel)->findAll();
    }
    public function jeniskelperrt($rt, $jeniskel)
    {
        return $this->where('rt', $rt)->where('jeniskel', $jeniskel)->findAll();
    }
    public function totalperrt($rt)
    {
        return $this->where('rt', $rt)->findAll();
    }
}

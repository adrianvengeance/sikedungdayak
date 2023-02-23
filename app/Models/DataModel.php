<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\AseptorModel;

class DataModel extends Model
{
    protected $table            = 'data';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = false;
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'numkk', 'nik', 'namaagt', 'tmplahir', 'tgllahir', 'umur', 'agama', 'goldar', 'jeniskel', 'keluarga', 'statusdiri', 'statuswarga', 'pendidikan', 'pekerjaan', 'ayah', 'ibu', 'hubungkel', 'alamatasal', 'alamatdesa', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kota', 'kodepos', 'provinsi', 'pbi', 'pkh', 'bpnt', 'bst', 'age'
    ];

    public function semuanya()
    {
        // $query = $this->db->query("SELECT *, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age FROM data;");
        $query = $this->db->query("SELECT *, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age FROM data LEFT JOIN aseptor ON aseptor.data_id=data.id");
        return $query->getResult();
    }

    public function umursemua()
    {
        $query = $this->db->query("SELECT tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS age FROM data;");
        return $query->getResultArray();
    }

    // public function umurjeniskel($lorp)
    // {
    //     $builder = $this->db->table('data');
    //     $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS umur");
    //     $builder->where("jeniskel", $lorp);
    //     $query = $builder->get()->getResultArray();
    //     return $query;
    // }

    public function umurjeniskel_03($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", $lorp);
        $builder->having("age>0 AND age<4");
        $query = $builder->get()->getResultArray();
        return count($query);
    }

    public function umurjeniskel_46($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", $lorp);
        $builder->having("age>3 AND age<7");
        $query = $builder->get()->getResultArray();
        return count($query);
    }

    public function umurjeniskel_718($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", $lorp);
        $builder->having("age>6 AND age<19");
        $query = $builder->get()->getResultArray();
        return count($query);
    }

    public function umurjeniskel_1956($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", $lorp);
        $builder->having("age>18 AND age<57");
        $query = $builder->get()->getResultArray();
        return count($query);
    }

    public function umurjeniskel_57($lorp)
    {
        $builder = $this->db->table('data');
        $builder->select("namaagt, jeniskel, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", $lorp);
        $builder->having("age>56");
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
        $query = $this->db->query("SELECT namaagt, pendidikan, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS age FROM data WHERE pendidikan LIKE '%$pnddkn%';");
        return $query->getResultArray();
    }
    // public function pendidikanall($pnddkn)
    // {
    //     $query = $this->db->query("SELECT namaagt, pendidikan, tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS age FROM data WHERE pendidikan LIKE '%$pnddkn%';");
    //     return $query->getResultArray();
    // }

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
        $builder->join('aseptor', "aseptor.data_id = data.id", 'left');
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

    public function badutamale()
    {
        $builder = $this->table('data');
        $builder->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", 'LAKI-LAKI');
        $builder->having("age <=", 2);
        return ($builder->get()->getResultArray());
    }
    public function badutafemale()
    {
        $builder = $this->table('data');
        $builder->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", 'PEREMPUAN');
        $builder->having("age <=", 2);
        return ($builder->get()->getResultArray());
    }

    public function batitamale()
    {
        $builder = $this->table('data');
        $builder->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", 'LAKI-LAKI');
        $builder->having("age <=", 3);
        return ($builder->get()->getResultArray());
    }
    public function batitafemale()
    {
        $builder = $this->table('data');
        $builder->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", 'PEREMPUAN');
        $builder->having("age <=", 3);
        return ($builder->get()->getResultArray());
    }

    public function balitamale()
    {
        $builder = $this->table('data');
        $builder->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", 'LAKI-LAKI');
        $builder->having("age <=", 5);
        return ($builder->get()->getResultArray());
    }
    public function balitafemale()
    {
        $builder = $this->table('data');
        $builder->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", 'PEREMPUAN');
        $builder->having("age <=", 5);
        return ($builder->get()->getResultArray());
    }
    public function balita()
    {
        $builder = $this->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->having('age <=', 5);
        $builder->orderBy('age ASC, jeniskel ASC, namaagt ASC');
        return $builder->get()->getResultArray();
    }

    public function pasubur()
    {
        $this->select("t1.numkk, t1.namaagt AS wanita, t1.tgllahir AS tgllahirwanita, TIMESTAMPDIFF(YEAR, t1.tgllahir, CURDATE()) AS agewanita, t2.namaagt AS pria, t2.tgllahir AS tgllahirpria, TIMESTAMPDIFF(YEAR, t2.tgllahir, CURDATE()) AS agepria");
        $this->from("data t1");
        $this->join("data t2", "t1.numkk = t2.numkk", "inner");
        $this->where("t1.jeniskel", "PEREMPUAN");
        $this->where("t1.statusdiri", "SUDAH KAWIN");
        $this->having("agewanita <", 50);
        $this->where("t2.jeniskel", "LAKI-LAKI");
        $this->where("t2.statusdiri", "SUDAH KAWIN");
        $this->where("t2.hubungkel", "KEPALA KELUARGA");
        $this->orderBy('agewanita ASC');
        $this->distinct();
        $query = $this->get();
        return $query->getResultArray();
    }

    public function wasubur()
    {
        $builder = $this->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("jeniskel", "PEREMPUAN");
        $builder->where("statusdiri !=", "SUDAH KAWIN");
        $builder->having("age>11 AND age<51");
        $builder->orderBy('age ASC');
        return $builder->get()->getResultArray();
    }
}

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
        'numkk', 'nik', 'namaagt', 'tmplahir', 'tgllahir', 'umur', 'agama', 'goldar', 'jeniskel', 'keluarga', 'statusdiri', 'statuswarga', 'pendidikan', 'pekerjaan', 'ayah', 'ibu', 'hubungkel', 'alamatasal', 'alamatdesa', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kota', 'kodepos', 'provinsi', 'pbi', 'pkh', 'bpnt', 'bst', 'age'
    ];

    public function semuanya()
    {
        $query = $this->db->query("SELECT *, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age FROM data LEFT JOIN aseptor ON aseptor.data_id=data.id");
        return $query->getResult();
    }

    public function umursemua()
    {
        $query = $this->db->query("SELECT tgllahir, CURDATE(), TIMESTAMPDIFF(YEAR,tgllahir,CURDATE()) AS age FROM data;");
        return $query->getResultArray();
    }

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

    public function baduta($jeniskel)
    {
        $builder = $this->query("SELECT *, TIMESTAMPDIFF(MONTH, tgllahir, now()) % 12 as month, FLOOR(TIMESTAMPDIFF(DAY, tgllahir, now()) % 30.4375) as day,
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, tgllahir, NOW()) > 2 THEN 0 
            WHEN TIMESTAMPDIFF(YEAR, tgllahir, NOW()) = 2 THEN 
                CASE 
                    WHEN TIMESTAMPDIFF(MONTH, tgllahir, NOW()) > 0 THEN 0 
                    WHEN TIMESTAMPDIFF(MONTH, tgllahir, NOW()) = 0 AND TIMESTAMPDIFF(DAY, tgllahir, NOW()) >= 0 THEN 0 
                    ELSE TIMESTAMPDIFF(DAY, tgllahir, NOW()) 
                END 
            ELSE TIMESTAMPDIFF(YEAR, tgllahir, NOW()) 
        END AS age
        FROM data
        WHERE jeniskel = '$jeniskel'
        HAVING age <= 2 AND age != 0
        ORDER BY age ASC, jeniskel ASC, namaagt ASC");
        return $builder->getResultArray();
    }

    public function batita($jeniskel)
    {
        $builder = $this->query("SELECT *, TIMESTAMPDIFF(MONTH, tgllahir, now()) % 12 as month, FLOOR(TIMESTAMPDIFF(DAY, tgllahir, now()) % 30.4375) as day,
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, tgllahir, NOW()) > 3 THEN 0 
            WHEN TIMESTAMPDIFF(YEAR, tgllahir, NOW()) = 3 THEN 
                CASE 
                    WHEN TIMESTAMPDIFF(MONTH, tgllahir, NOW()) > 0 THEN 0 
                    WHEN TIMESTAMPDIFF(MONTH, tgllahir, NOW()) = 0 AND TIMESTAMPDIFF(DAY, tgllahir, NOW()) >= 0 THEN 0 
                    ELSE TIMESTAMPDIFF(DAY, tgllahir, NOW()) 
                END 
            ELSE TIMESTAMPDIFF(YEAR, tgllahir, NOW()) 
        END AS age
        FROM data
        WHERE jeniskel = '$jeniskel'
        HAVING age <= 3 AND age != 0
        ORDER BY age ASC, jeniskel ASC, namaagt ASC");
        return $builder->getResultArray();
    }

    public function balita($jeniskel)
    {
        $builder = $this->query("SELECT *, TIMESTAMPDIFF(MONTH, tgllahir, now()) % 12 as month, FLOOR(TIMESTAMPDIFF(DAY, tgllahir, now()) % 30.4375) as day,
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, tgllahir, NOW()) > 5 THEN 0 
            WHEN TIMESTAMPDIFF(YEAR, tgllahir, NOW()) = 5 THEN 
                CASE 
                    WHEN TIMESTAMPDIFF(MONTH, tgllahir, NOW()) > 0 THEN 0 
                    WHEN TIMESTAMPDIFF(MONTH, tgllahir, NOW()) = 0 AND TIMESTAMPDIFF(DAY, tgllahir, NOW()) >= 0 THEN 0 
                    ELSE TIMESTAMPDIFF(DAY, tgllahir, NOW()) 
                END 
            ELSE TIMESTAMPDIFF(YEAR, tgllahir, NOW()) 
        END AS age
        FROM data
        WHERE jeniskel = '$jeniskel'
        HAVING age <= 5 AND age != 0
        ORDER BY age ASC, jeniskel ASC, namaagt ASC");
        return $builder->getResultArray();
    }
    public function balitaall()
    {
        // $builder = $this->query("SELECT *, TIMESTAMPDIFF(MONTH, tgllahir, now()) % 12 as month, FLOOR(TIMESTAMPDIFF(DAY, tgllahir, now()) % 30.4375) as day,
        $builder = $this->query("SELECT *, FLOOR((DATEDIFF(CURDATE(),tgllahir)/365 - FLOOR(DATEDIFF(CURDATE(),tgllahir)/365))* 12) month, CEILING((((DATEDIFF(CURDATE(),tgllahir)/365 - FLOOR(DATEDIFF(CURDATE(),tgllahir)/365))* 12) - FLOOR((DATEDIFF(CURDATE(),tgllahir)/365 - FLOOR(DATEDIFF(CURDATE(),tgllahir)/365))* 12))* 30) day,
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, tgllahir, NOW()) > 5 THEN 0 
            WHEN TIMESTAMPDIFF(YEAR, tgllahir, NOW()) = 5 THEN 
                CASE 
                    WHEN TIMESTAMPDIFF(MONTH, tgllahir, NOW()) > 0 THEN 0 
                    WHEN TIMESTAMPDIFF(MONTH, tgllahir, NOW()) = 0 AND TIMESTAMPDIFF(DAY, tgllahir, NOW()) >= 0 THEN 0 
                    ELSE TIMESTAMPDIFF(DAY, tgllahir, NOW()) 
                END 
            ELSE TIMESTAMPDIFF(YEAR, tgllahir, NOW()) 
        END AS age
        FROM data 
        HAVING age <= 5 AND age != 0
        ORDER BY tgllahir DESC, jeniskel ASC, namaagt ASC");
        return $builder->getResultArray();
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

    public function bansos()
    {
        $builder = $this->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->join('aseptor', "aseptor.data_id = data.id", 'left');
        $builder->where("pbi", 'PBI');
        $builder->orWhere("pkh", 'PKH');
        $builder->orWhere("bpnt", 'BPNT');
        $builder->orWhere("bst", 'BST');
        return $builder->get()->getResultArray();
    }

    public function bansoskategori($bansos)
    {
        $builder = $this->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->where("pbi", $bansos);
        $builder->orWhere("pkh", $bansos);
        $builder->orWhere("bpnt", $bansos);
        $builder->orWhere("bst", $bansos);
        return $builder->get()->getResultArray();
    }

    public function aseptor()
    {
        $builder = $this->db->table('data');
        $builder->select('*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age');
        $builder->join('aseptor', "aseptor.data_id = data.id", 'inner');
        $builder->where('jenis_aseptor !=', null);
        return $builder->get()->getResultArray();
    }
}

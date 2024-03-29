<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataModel;
use App\Models\UsersModel;
use App\Models\PindahModel;
use App\Models\BigimgModel;
use App\Models\SmallimgModel;
use App\Models\AseptorModel;
use App\Models\VideoytModel;
use App\Models\VisitorModel;
use App\Models\MeninggalModel;
use App\Models\PengungumanModel;
use App\Models\KritiksaranModel;
use Config\Services;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->datamodel = new DataModel();
        $this->usersmodel = new UsersModel();
        $this->bigimgmodel = new BigimgModel();
        $this->smallimgmodel = new SmallimgModel();
        $this->pindahmodel = new PindahModel();
        $this->videoytmodel = new VideoytModel();
        $this->visitor_model = new VisitorModel();
        $this->meninggalmodel = new MeninggalModel();
        $this->pengungumanmodel = new PengungumanModel();
        $this->kritiksaranmodel = new KritiksaranModel();
        $this->aseptormodel = new AseptorModel();
        $this->uri = current_url(true);

        $this->db = \Config\Database::connect();
        $this->user = $this->db->table('users')->where(['id_user' => session('id_user')])->get()->getRow();

        helper(['visitor']);
        $site_statics_today = $this->visitor_model->get_site_data_for_today();
        $site_statics_last_week = $this->visitor_model->get_site_data_for_last_week();
        $this->visits_today = isset($site_statics_today['visits']) ? $site_statics_today['visits'] : 0;
        $this->visits_last_week = isset($site_statics_last_week['visits']) ? $site_statics_last_week['visits'] : 0;
        $chart_data_today = $this->visitor_model->get_chart_data_for_today();
        $chart_data_curr_month = $this->visitor_model->get_chart_data_for_month_year();
        $this->visits_data_today = isset($chart_data_today) ? $chart_data_today : array();

        $sum = 0;
        foreach ($chart_data_curr_month as $x) {
            $sum += $x->visits;
        }
        $this->visits_curr_month =  $sum;
        $this->visits_statics_total = count($this->visitor_model->findAll());
    }
    public function login()
    {
        if (session('id_user')) {
            return redirect()->to('/home');
        }

        $data = [
            'title' => 'Login | Padukuhan Kedung Dayak'
        ];
        return view('/auth/login', $data);
    }

    public function loginprocess()
    {
        $postt = $this->request->getPost();
        $query = $this->db->table('users')->getWhere(['username' => $postt['username']]);
        $user = $query->getRow();

        if ($user) {
            if (password_verify($postt['password'], $user->password)) {
                $params = ['id_user' => $user->id_user];
                session()->set($params);
                $referred_from = session('referred_from');  //reffered from is login from info rumah
                if ($referred_from) {
                    return redirect()->to($referred_from);
                } else {
                    return redirect()->to(site_url('home'));
                }
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->remove('referred_from');
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }

    public function dashboard()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $batasumur = ['0-3', '4-6', '7-18', '19-56', '57+'];
        $umurpria = [
            $this->datamodel->umurjeniskel_03('LAKI-LAKI'),
            $this->datamodel->umurjeniskel_46('LAKI-LAKI'),
            $this->datamodel->umurjeniskel_718('LAKI-LAKI'),
            $this->datamodel->umurjeniskel_1956('LAKI-LAKI'),
            $this->datamodel->umurjeniskel_57('LAKI-LAKI'),
        ];
        $umurwanita = [
            $this->datamodel->umurjeniskel_03('PEREMPUAN'),
            $this->datamodel->umurjeniskel_46('PEREMPUAN'),
            $this->datamodel->umurjeniskel_718('PEREMPUAN'),
            $this->datamodel->umurjeniskel_1956('PEREMPUAN'),
            $this->datamodel->umurjeniskel_57('PEREMPUAN'),
        ];

        $jmlhrt = ['RT 1', 'RT 2', 'RT 3', 'RT 4'];
        $jmlhkk = [
            $this->datamodel->jumlahkk(1),
            $this->datamodel->jumlahkk(2),
            $this->datamodel->jumlahkk(3),
            $this->datamodel->jumlahkk(4),
        ];

        $data = [
            'semuaorang'    => count($this->datamodel->semuanya()),
            'semuapria'     => $this->datamodel->jumlahjeniskel('LAKI-LAKI'),
            'semuawanita'   => $this->datamodel->jumlahjeniskel('PEREMPUAN'),
            'pindah'        => $this->pindahmodel->jumlah(),
            'meninggal'     => $this->meninggalmodel->jumlah(),
            'batasumur'     => $batasumur,
            'umurpria'      => $umurpria,
            'umurwanita'    => $umurwanita,
            'jumlahrt'      => $jmlhrt,
            'jumlahkk'      => $jmlhkk,
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Home | Padukuhan Kedung Dayak',
            'smallimg'      => $this->smallimgmodel->findAll(),
            'badutam'       => count($this->datamodel->baduta('LAKI-LAKI')),
            'badutaf'       => count($this->datamodel->baduta('PEREMPUAN')),
            'batitam'       => count($this->datamodel->batita('LAKI-LAKI')),
            'batitaf'       => count($this->datamodel->batita('PEREMPUAN')),
            'balitam'       => count($this->datamodel->balita('LAKI-LAKI')),
            'balitaf'       => count($this->datamodel->balita('PEREMPUAN')),
            'pasubur'       => count($this->datamodel->pasubur()),
            'wasubur'       => count($this->datamodel->wasubur()),
            'bansosPBI'     => count($this->datamodel->bansoskategori('PBI')),
            'bansosPKH'     => count($this->datamodel->bansoskategori('PKH')),
            'bansosBPNT'    => count($this->datamodel->bansoskategori('BPNT')),
            'bansosBST'     => count($this->datamodel->bansoskategori('BST')),
            'akspIMP'       => count($this->aseptormodel->count('Pemerintah', 'IMP')),
            'akspMOP'       => count($this->aseptormodel->count('Pemerintah', 'MOP')),
            'akspMOW'       => count($this->aseptormodel->count('Pemerintah', 'MOW')),
            'akspIUD'       => count($this->aseptormodel->count('Pemerintah', 'IUD')),
            'akspPIL'       => count($this->aseptormodel->count('Pemerintah', 'PIL')),
            'akspKondom'    => count($this->aseptormodel->count('Pemerintah', 'Kondom')),
            'akspSuntik'    => count($this->aseptormodel->count('Pemerintah', 'Suntik')),
            'akssIMP'       => count($this->aseptormodel->count('Swasta', 'IMP')),
            'akssMOP'       => count($this->aseptormodel->count('Swasta', 'MOP')),
            'akssMOW'       => count($this->aseptormodel->count('Swasta', 'MOW')),
            'akssIUD'       => count($this->aseptormodel->count('Swasta', 'IUD')),
            'akssPIL'       => count($this->aseptormodel->count('Swasta', 'PIL')),
            'akssKondom'    => count($this->aseptormodel->count('Swasta', 'Kondom')),
            'akssSuntik'    => count($this->aseptormodel->count('Swasta', 'Suntik')),
            'akssTIAL'      => count($this->aseptormodel->count('Swasta', 'TIAL')),
            'akssIAS'       => count($this->aseptormodel->count('Swasta', 'IAS')),
        ];
        return view('/dashboard/home', $data);
    }

    // -----------------Penduduk-----------------
    public function penduduk()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'data'          => $this->datamodel->semuanya(),
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
        ];
        // dd($data['data']);
        return view('/dashboard/penduduk/penduduk', $data);
    }

    public function penduduktambah($numkk = false)
    {
        if ($this->user->level != 'Super Admin') return redirect()->back();

        $array = $this->datamodel->birthplace();
        $jobs = $this->datamodel->jobs();

        $data = [
            'jobs'          => $jobs,
            'birthplace'    => $array,
            'validation'    => Services::validation(),
            'uri'           => $this->uri,
            'user'          => $this->user,
            'numkk'         => ($numkk) ? $numkk : false,
            'title'         => 'Tambah Penduduk | Padukuhan Kedung Dayak',
        ];
        return view('/dashboard/penduduk/tambahpenduduk', $data);
    }

    public function penduduktambahprocess()
    {
        if (!$this->validate([
            'namaagt'      => [
                'rules'  => 'required|namaValidation[namaagt]',
                'errors' => [
                    'required'  => 'Nama diperlukan',
                    'namaValidation' => 'Format nama hanya boleh a-z . ,'
                ]
            ],
            'nik'  => [
                'rules'  => 'required|is_natural|exact_length[16]|is_unique[data.nik]',
                'errors' => [
                    'required'  => 'NIK diperlukan',
                    'is_natural' => 'Format NIK tidak benar',
                    'exact_length' => 'NIK harus berjumlah 16 digit',
                    'is_unique' => 'NIK sudah terdaftar'
                ]
            ],
            'numkk'  => [
                'rules'  => 'required|is_natural|exact_length[16]',
                'errors' => [
                    'required'  => 'Nomor KK diperlukan',
                    'is_natural' => 'Format Nomor KK tidak benar',
                    'exact_length' => 'Nomor KK harus berjumlah 16 digit'
                ]
            ],
            'jeniskel' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Jenis kelamin diperlukan',
                ]
            ],
            'tmplahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Tempat lahir diperlukan',
                ]
            ],
            'tgllahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Tanggal lahir diperlukan',
                ]
            ],
            'agama' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Agama diperlukan',
                ]
            ],
            'goldar' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Golongan darah diperlukan, jika tidak tahu pilih ' . "'-'",
                ]
            ],
            'statusdiri' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Status diri diperlukan',
                ]
            ],

            'statuswarga' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Status warga diperlukan',
                ]
            ],
            'pendidikan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Pendidikan diperlukan',
                ]
            ],
            'pekerjaan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Pekerjaan diperlukan',
                ]
            ],
            'ayah' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Nama ayah diperlukan',
                ]
            ],
            'ibu' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Nama ibu diperlukan',
                ]
            ],
            'hubungkel' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Hubungan keluarga diperlukan',
                ]
            ],
            'alamatdesa' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Alamat desa diperlukan',
                ]
            ],
            'rt' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => 'No RT diperlukan',
                    'is_natural'    => 'No RT harus berupa angka'
                ]
            ],
            'rw' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => 'No RW diperlukan',
                    'is_natural'    => 'No RW harus berupa angka'
                ]
            ],
            'kelurahan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Kelurahan diperlukan',
                ]
            ],
            'kecamatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Kecamatan diperlukan',
                ]
            ],
            'kota' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Kota diperlukan',
                ]
            ],
            'provinsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Provinsi diperlukan',
                ]
            ],
            'kodepos' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Kode POS diperlukan',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $bio = $this->request->getPost();
        $this->db->table('data')->insert($bio);

        session()->setFlashData('tambah', 'Berhasil menambahkan penduduk baru');
        return redirect()->to('/home/penduduk');
    }

    public function jumlahbayi()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
            'balita'        => $this->datamodel->balitaall()
        ];
        // dd($data['balita']);
        return view('/dashboard/penduduk/bayi', $data);
    }

    public function pasubur()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
            'pasubur'       => $this->datamodel->pasubur()
        ];
        return view('/dashboard/penduduk/pasubur', $data);
    }

    public function wasubur()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
            'wasubur'       => $this->datamodel->wasubur()
        ];
        return view('/dashboard/penduduk/wasubur', $data);
    }

    public function bansospbi()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
            'data'          => $this->datamodel->bansoskategori('PBI')
        ];
        return view('/dashboard/penduduk/bansospbi', $data);
    }
    public function bansospkh()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
            'data'          => $this->datamodel->bansoskategori('PKH')
        ];
        return view('/dashboard/penduduk/bansospkh', $data);
    }
    public function bansosbpnt()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
            'data'          => $this->datamodel->bansoskategori('BPNT')
        ];
        return view('/dashboard/penduduk/bansosbpnt', $data);
    }
    public function bansosbst()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
            'data'          => $this->datamodel->bansoskategori('BST')
        ];
        return view('/dashboard/penduduk/bansosbst', $data);
    }

    public function akseptor($akseptor)
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Penduduk | Padukuhan Kedung Dayak',
            'tabletitle'    => $akseptor,
            'data'          => $this->aseptormodel->listPeople($akseptor)
        ];
        return view('/dashboard/penduduk/aseptor', $data);
    }

    // -----------------Pindah-----------------
    public function pindah()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'data'          => $this->pindahmodel->semuanya(),
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Tambah Penduduk | Padukuhan Kedung Dayak',
        ];
        return view('/dashboard/penduduk/pindah', $data);
    }

    public function pindahcari()
    {
        if ($this->user->level != 'Super Admin') return redirect()->back();

        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'nik'           => $this->datamodel->nik(),
            'namaagt'       => $this->datamodel->namaagt(),
            'validation'    => Services::validation(),
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Tambah Penduduk | Padukuhan Kedung Dayak',
        ];
        return view('/dashboard/penduduk/pindahcari', $data);
    }

    public function pindahcariprocess()
    {
        if ($this->user->level != 'Super Admin') return redirect()->back();

        $key = $this->request->getVar('cari');
        if (!$key) {
            session()->setFlashdata('cari', 'Silakan masukan NIK atau Nama.');
            return redirect()->back();
        }

        $ada = $this->datamodel->cariniknama($key);
        if (!$ada) {
            session()->setFlashdata('cari', 'Identitas tidak ditemukan.');
            return redirect()->back();
        }

        session()->set('orangpindah', $ada);
        return redirect()->to('/home/pindah/tambah');
    }

    public function pindahtambah()
    {
        if ($this->user->level != 'Super Admin') return redirect()->back();

        $orang = session('orangpindah');
        if (!$orang) {
            return redirect()->to('/home/pindah/cari');
        }
        $asal = session('inforumah');
        $data = [
            'orang'         => $orang,
            'asal'          => !is_null($asal) ? $asal : null,
            'validation'    => Services::validation(),
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Tambah Penduduk | Padukuhan Kedung Dayak',
        ];
        return view('/dashboard/penduduk/tambahpindah', $data);
    }

    public function pindahtambahprocess()
    {
        if (!$this->validate([
            'namaagt'      => [
                'rules'  => 'required|namaValidation[namaagt]',
                'errors' => [
                    'required'  => 'Nama diperlukan',
                    'namaValidation' => 'Format nama hanya boleh a-z . ,'
                ]
            ],
            'nik'  => [
                'rules'  => 'required|is_natural|exact_length[16]',
                'errors' => [
                    'required'  => 'NIK diperlukan',
                    'is_natural' => 'Format NIK tidak benar',
                    'exact_length' => 'NIK harus berjumlah 16 digit'
                ]
            ],
            'numkk'  => [
                'rules'  => 'required|is_natural|exact_length[16]',
                'errors' => [
                    'required'  => 'Nomor KK diperlukan',
                    'is_natural' => 'Format Nomor KK tidak benar',
                    'exact_length' => 'Nomor KK harus berjumlah 16 digit'
                ]
            ],
            'jeniskel' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Jenis kelamin diperlukan',
                ]
            ],
            'tglpindah' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Tanggal pindah diperlukan',
                ]
            ],
            'alamatpindah' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => "Alamat pindah diperlukan, jika tidak tahu masukan '-'",
                ]
            ],
            'keterangan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => "Keterangan diperlukan, jika tidak tahu masukan '-'",
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $post = [
            'tglpindah' => $this->request->getVar('tglpindah'),
            'alamatpindah' => $this->request->getVar('alamatpindah'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        $orang = session('orangpindah');
        $this->pindahmodel->insert($orang);
        $this->db->table('pindah')->where(['nik' => $orang->nik])->update($post);
        $this->datamodel->hapus($orang->nik);
        session()->setFlashdata('pindah', 'Berhasil ditambahkan ke table pindah.');
        return redirect()->to('/home/pindah');
    }

    //---------------Meninggal-----------------
    public function meninggal()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'data'          => $this->meninggalmodel->semuanya(),
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Tambah Penduduk | Padukuhan Kedung Dayak',
        ];
        return view('/dashboard/penduduk/meninggal', $data);
    }

    public function meninggalcari()
    {
        if ($this->user->level != 'Super Admin') return redirect()->back();

        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'nik'           => $this->datamodel->nik(),
            'namaagt'       => $this->datamodel->namaagt(),
            'validation'    => Services::validation(),
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Tambah Penduduk | Padukuhan Kedung Dayak',
        ];
        return view('/dashboard/penduduk/meninggalcari', $data);
    }

    public function meninggalcariprocess()
    {
        if ($this->user->level != 'Super Admin') return redirect()->back();

        $key = $this->request->getVar('cari');

        if (!$key) {
            session()->setFlashdata('cari', 'Silakan masukan NIK atau Nama.');
            return redirect()->back();
        }
        $ada = $this->datamodel->cariniknama($key);
        if (!$ada) {
            session()->setFlashdata('cari', 'Identitas tidak ditemukan.');
            return redirect()->back();
        }
        session()->set('orangmeninggal', $ada);
        return redirect()->to('/home/meninggal/tambah');
    }

    public function meninggaltambah()
    {
        if ($this->user->level != 'Super Admin') return redirect()->back();

        $orangdie = session('orangmeninggal');
        if (!$orangdie) {
            return redirect()->to('/home/meninggal/cari');
        }
        $asal = session('inforumah');
        $data = [
            'orang'         => $orangdie,
            'asal'          => !is_null($asal) ? $asal : null,
            'validation'    => Services::validation(),
            'uri'           => $this->uri,
            'user'          => $this->user,
            'title'         => 'Tambah Penduduk | Padukuhan Kedung Dayak',
        ];
        return view('/dashboard/penduduk/tambahmeninggal', $data);
    }

    public function meninggaltambahprocess()
    {
        if (!$this->validate([
            'namaagt'      => [
                'rules'  => 'required|namaValidation[namaagt]',
                'errors' => [
                    'required'  => 'Nama diperlukan',
                    'namaValidation' => 'Format nama hanya boleh a-z . ,'
                ]
            ],
            'nik'  => [
                'rules'  => 'required|is_natural|exact_length[16]',
                'errors' => [
                    'required'  => 'NIK diperlukan',
                    'is_natural' => 'Format NIK tidak benar',
                    'exact_length' => 'NIK harus berjumlah 16 digit'
                ]
            ],
            'numkk'  => [
                'rules'  => 'required|is_natural|exact_length[16]',
                'errors' => [
                    'required'  => 'Nomor KK diperlukan',
                    'is_natural' => 'Format Nomor KK tidak benar',
                    'exact_length' => 'Nomor KK harus berjumlah 16 digit'
                ]
            ],
            'jeniskel' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Jenis kelamin diperlukan',
                ]
            ],
            'tgllahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Tanggal lahir diperlukan',
                ]
            ],
            'tgldie' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => "Tanggal meninggal diperlukan",
                ]
            ],
            'usia' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => "Usia diperlukan",
                    'is_natural'    => "Format usia harus angka"
                ]
            ],
            'penyebab' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => "Penyebab diperlukan, jika tidak tahu masukan '-'",
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $post = [
            'tgldie' => $this->request->getVar('tgldie'),
            'usia' => $this->request->getVar('usia'),
            'penyebab' => $this->request->getVar('penyebab')
        ];
        $orang = session('orangmeninggal');
        $this->meninggalmodel->insert($orang);
        $this->db->table('meninggal')->where('nik', $orang->nik)->update($post);
        $this->datamodel->hapus($orang->nik);
        session()->setFlashdata('meninggal', 'Berhasil ditambahkan ke table meninggal.');
        return redirect()->to('/home/meninggal');
    }

    // ---------------- 

    public function data()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data  = [
            'title' => 'Data Warga | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'data'  => $this->datamodel->semuanya()
        ];
        return view('/dashboard/alldata', $data);
    }

    public function info()
    {
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $cari = $this->request->getVar('keyword');
        if ($cari) {
            $adakk = $this->datamodel->inforumah($cari);
            if ($adakk) {
                $data = [
                    'title' => 'Informasi No. KK | Padukuhan Kedung Dayak',
                    'user'  => $this->user,
                    'uri'   => $this->uri,
                    'data'  => $adakk,
                    'nokk'  => $cari
                ];
                return view('/dashboard/info', $data);
            } else {
                session()->setFlashdata('nokk', 'No. KK Tidak ditemukan.');
            }
        }

        $data = [
            'title' => 'Informasi No. KK | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'cari'  => $cari
        ];
        return view('/dashboard/info', $data);
    }

    public function infoedit($nokk)
    {
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $cari = $this->request->getVar('keyword');
        if ($cari) {
            $adakk = $this->datamodel->inforumah($cari);
            if ($adakk) {
                $data = [
                    'title' => 'Informasi No. KK | Padukuhan Kedung Dayak',
                    'user'  => $this->user,
                    'uri'   => $this->uri,
                    'data'  => $adakk,
                    'nokk'  => $cari
                ];
                return view('/dashboard/info', $data);
            } else {
                session()->setFlashdata('nokk', 'No. KK Tidak ditemukan.');
            }
        }

        $data = [
            'title' => 'Informasi No. KK | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'nokk'  => $nokk,
            'data'  => $this->datamodel->inforumah($nokk),
        ];
        return view('/dashboard/info', $data);
    }

    public function editpenduduk($nik)
    {
        if ($this->user->level != 'Super Admin') {
            session()->setFlashdata('adminbiasa', 'Akun harus level super admin.');
            return redirect()->back();
        }

        $orang = ($this->datamodel->carinik($nik));
        $asal = session('inforumah');

        if ($orang) {
            $array = $this->datamodel->birthplace();
            $jobs = $this->datamodel->jobs();

            $data = [
                'jobs'          => $jobs,
                'birthplace'    => $array,
                'orang'         => $orang,
                'asal'          => !is_null($asal) ? $asal : null,
                'validation'    => Services::validation(),
                'uri'           => $this->uri,
                'user'          => $this->user,
                'title'         => 'Edit Penduduk | Padukuhan Kedung Dayak',
            ];

            return view('/dashboard/penduduk/editpenduduk', $data);
        }
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan');
    }

    public function editpendudukprocess($nik)
    {
        if (!$this->validate([
            'namaagt'      => [
                'rules'  => 'required|namaValidation[namaagt]',
                'errors' => [
                    'required'  => 'Nama diperlukan',
                    'namaValidation' => 'Format nama hanya boleh a-z . ,'
                ]
            ],
            'nik'  => [
                'rules'  => 'required|is_natural|exact_length[16]',
                'errors' => [
                    'required'  => 'NIK diperlukan',
                    'is_natural' => 'Format NIK tidak benar',
                    'exact_length' => 'NIK harus berjumlah 16 digit'
                ]
            ],
            'numkk'  => [
                'rules'  => 'required|is_natural|exact_length[16]',
                'errors' => [
                    'required'  => 'Nomor KK diperlukan',
                    'is_natural' => 'Format Nomor KK tidak benar',
                    'exact_length' => 'Nomor KK harus berjumlah 16 digit'
                ]
            ],
            'jeniskel' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Jenis kelamin diperlukan',
                ]
            ],
            'tmplahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Tempat lahir diperlukan',
                ]
            ],
            'tgllahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Tanggal lahir diperlukan',
                ]
            ],
            'agama' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Agama diperlukan',
                ]
            ],
            'goldar' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Golongan darah diperlukan, jika tidak tahu pilih ' . "'-'",
                ]
            ],
            'statusdiri' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Status diri diperlukan',
                ]
            ],

            'statuswarga' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Status warga diperlukan',
                ]
            ],
            'pendidikan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Pendidikan diperlukan',
                ]
            ],
            'pekerjaan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Pekerjaan diperlukan',
                ]
            ],
            'ayah' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Nama ayah diperlukan',
                ]
            ],
            'ibu' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Nama ibu diperlukan',
                ]
            ],
            'hubungkel' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Hubungan keluarga diperlukan',
                ]
            ],
            'alamatdesa' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Alamat desa diperlukan',
                ]
            ],
            'rt' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => 'No RT diperlukan',
                    'is_natural'    => 'No RT harus berupa angka'
                ]
            ],
            'rw' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => 'No RW diperlukan',
                    'is_natural'    => 'No RW harus berupa angka'
                ]
            ],
            'kelurahan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Kelurahan diperlukan',
                ]
            ],
            'kecamatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Kecamatan diperlukan',
                ]
            ],
            'kota' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Kota diperlukan',
                ]
            ],
            'provinsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Provinsi diperlukan',
                ]
            ],
            'kodepos' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => 'Kode POS diperlukan',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $orang = $this->datamodel->carinik($nik);
        $id = $orang->id;
        $info = $this->request->getPost();

        $dataaseptor = [
            'sumber_aseptor'    => $this->request->getPost('aseptor'),
            'jenis_aseptor'     => $this->request->getPost('jenisaseptor')
        ];
        $adaaseptor = $this->aseptormodel->getId($id);

        if ($adaaseptor) {
            $this->aseptormodel->update($adaaseptor['aseptor_id'], $dataaseptor);
        } else {
            $dataaseptor['data_id'] = $id;
            $this->aseptormodel->insert($dataaseptor);
        }

        $info['pbi'] = ($this->request->getPost('pbi')) ? $this->request->getPost('pbi') : '';
        $info['pkh'] = ($this->request->getPost('pkh')) ? $this->request->getPost('pkh') : '';
        $info['bpnt'] = ($this->request->getPost('bpnt')) ? $this->request->getPost('bpnt') : '';
        $info['bst'] = ($this->request->getPost('bst')) ? $this->request->getPost('bst') : '';
        $this->datamodel->update($id, $info);

        $asal = session('inforumah');
        if (is_null($asal)) {
            session()->setFlashdata('tambah', 'Data berhasil diubah');
            return redirect()->to('/home/penduduk/');
        }
        session()->setFlashdata('edit', 'Data berhasil diubah');
        return redirect()->to('/home/info/edit/' . $orang->numkk);
    }

    public function infoeditubah($nik)
    {
        $orang = $this->datamodel->cariniknama($nik);
        $alamat = base_url("/home/info/edit/$orang->numkk");
        session()->set('inforumah', $alamat);
        return redirect()->to('/home/penduduk/edit/' . $nik);
    }

    public function infoeditmove($nik)
    {
        $orang = $this->datamodel->cariniknama($nik);
        $alamat = base_url("/home/info/edit/$orang->numkk");
        session()->set('inforumah', $alamat);
        session()->set('orangpindah', $orang);
        return redirect()->to('/home/pindah/tambah');
    }

    public function infoeditdied($nik)
    {
        $orang = $this->datamodel->cariniknama($nik);
        $alamat = base_url("/home/info/edit/$orang->numkk");
        session()->set('inforumah', $alamat);
        session()->set('orangmeninggal', $orang);
        return redirect()->to('/home/meninggal/tambah');
    }

    // ----------------Akun-------------------

    public function listakun()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data = [
            'title' => 'Daftar Akun | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'data'  => $this->usersmodel->findall()
        ];
        return view('/dashboard/account/list', $data);
    }

    public function tambahakun()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        if ($this->user->level != 'Super Admin') return redirect()->back();

        $data = [
            'title' => 'Tambah Akun | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'nik'   => $this->datamodel->nik(),
            'iden'  => $this->datamodel->niknamaagt(),
            'validation'    => Services::validation()
        ];
        return view('/dashboard/account/register', $data);
    }

    public function tambahakunproses()
    {
        if ($this->user->level == 'Super Admin') {
            if (!$this->validate([
                'username'  => [
                    'rules'  => 'required|is_unique[users.username]',
                    'errors' => [
                        'required'  => 'Username diperlukan',
                        'is_unique' => 'Username sudah terdaftar'
                    ]
                ],
                'name'      => [
                    'rules'  => 'required|namaValidation[name]',
                    'errors' => [
                        'required'  => 'Nama diperlukan',
                        'nameValidation' => 'Format nama tidak benar'
                    ]
                ],
                'password1' => [
                    'rules'  => 'required|min_length[8]',
                    'errors' => [
                        'required'      => 'Password diperlukan',
                        'min_length'    => 'Password minimal 8 karakter'
                    ]
                ],
                'password2' => [
                    'rules'  => 'required|matches[password1]',
                    'errors' => [
                        'required'  => 'Verifikasi Password diperlukan',
                        'matches'   => 'Password tidak sama'
                    ]
                ],
                'level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'  => 'Level dibutuhkan'
                    ]
                ]
            ])) {
                return redirect()->back()->withInput();
            }
            $account = [
                'username'   => $this->request->getVar('username'),
                'name'       => $this->request->getVar('name'),
                'password'   => password_hash($this->request->getVar('password2'), PASSWORD_BCRYPT),
                'level'      => $this->request->getVar('level')
            ];
            $this->db->table('users')->insert($account);
            session()->setFlashdata('akun', 'Akun baru berhasil dibuat');
            return redirect()->to('/home/accounts');
        } else {
            return redirect()->to('/home/accounts');
        }
    }

    public function deleteakun($id)
    {
        if ($this->user->level != 'Super Admin') return redirect()->back();

        if ($this->user->id_user == $id) {
            session()->setFlashdata('akunError', 'Tidak bisa menghapus akun yang sedang login');
            return redirect()->to('/home/accounts');
        } else if ($this->user->id_user != $id) {
            $this->usersmodel->delete($id);
            session()->setFlashdata('akun', 'Akun berhasil dihapus');
            return redirect()->to('/home/accounts');
        }
    }

    public function accountsetting()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data  = [
            'title' => 'Akun | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
        ];

        return view('/dashboard/account/accountsetting', $data);
    }

    public function accountidentity()
    {
        $data  = [
            'title' => 'Ganti Identitas | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'validation' => Services::validation()
        ];

        return view('/dashboard/account/accountidentity', $data);
    }

    public function accountidentitychange()
    {
        if (!$this->validate([
            'name'      => [
                'rules'  => 'required|namaValidation[name]',
                'errors' => [
                    'required'  => 'Nama diperlukan',
                    'namaValidation' => 'Format nama hanya boleh a-z . ,'
                ]
            ],
            'username'  => [
                'rules'  => 'required|is_unique[users.username,username,' . $this->user->username . ']',
                'errors' => [
                    'required'  => 'Username diperlukan',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required'  => 'Masukan ulang password'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        if (!password_verify($this->request->getPost('password'), $this->user->password)) {
            session()->setFlashdata('pass', 'Password salah.');
            return redirect()->back();
        }
        $iden = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
        ];
        $this->db->table('users')->where(['id_user' => $this->user->id_user])->update($iden);
        session()->setFlashdata('berhasil', 'Akun berhasil diubah.');
        return redirect()->to('/home/account');
    }

    public function accountpass()
    {
        $data  = [
            'title' => 'Ganti Kata Sandi | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'validation' => Services::validation()
        ];

        return view('/dashboard/account/accountpass', $data);
    }

    public function accountpasschange()
    {
        $post = $this->request->getPost();

        if ($this->validate([
            'oldpass'   => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Password lama dibutuhkan'
                ]
            ],
            'password1' => [
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'required'      => 'Password baru diperlukan',
                    'min_length'    => 'Password minimal 8 karakter'
                ]
            ],
            'password2' => [
                'rules'  => 'required|matches[password1]',
                'errors' => [
                    'required'  => 'Verifikasi Password diperlukan',
                    'matches'   => 'Password tidak sama'
                ]
            ],
        ])) {
            if (password_verify($post['oldpass'], $this->user->password)) {
                $data = ['password' => password_hash($post['password2'], PASSWORD_BCRYPT)];
                $this->db->table('users')->where(['id_user' => $this->user->id_user])->update($data);

                session()->setFlashdata('berhasil', 'Password akun berhasil diubah.');
                return redirect()->to('/home/account');
            } else {
                session()->setFlashdata('errorpass', 'Password lama salah');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

    // ------------Widget-------------

    public function widget()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data  = [
            'title'         => 'Widget | Padukuhan Kedung Dayak',
            'user'          => $this->user,
            'uri'           => $this->uri,
            'videoyt'       => $this->videoytmodel->findAll(),
            'pengunguman'   => $this->pengungumanmodel->findAll(),
            'kritiksaran'   => $this->kritiksaranmodel->findAll(),
            'visits_today'  => $this->visits_today,
            'visits_last_week' => $this->visits_last_week,
            'chart_data_today' => $this->visits_data_today,
            'curr_month'    => $this->visits_curr_month,
            'statics_total' => $this->visits_statics_total

        ];

        return view('/dashboard/widget/widget', $data);
    }

    public function pengunguman()
    {
        $data  = [
            'validation'    => Services::validation(),
            'title' => 'Pengunguman | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri
        ];
        return view('/dashboard/widget/tambahpengunguman', $data);
    }

    public function pengungumanprocess()
    {
        if (!$this->validate([
            'isi'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi pengunguman diperlukan'
                ]
            ],
            'waktu'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu pengunguman diperlukan'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $post = $this->request->getPost();
        $this->pengungumanmodel->insert($post);
        session()->setFlashdata('widget', 'Pengunguman berhasil dibuat');
        return redirect()->to('/home/widget');
    }

    public function pengungumanedit($id)
    {
        $ada = $this->pengungumanmodel->find($id);
        if (!$ada) {
            return redirect()->back();
        }
        $data = [
            'validation'    => Services::validation(),
            'isi'   => $ada,
            'user'  => $this->user,
            'uri'   => $this->uri,
            'title' => 'Pengunguman | Padukuhan Kedung Dayak'
        ];
        return view('dashboard/widget/editpengunguman', $data);
    }

    public function pengungumaneditprocess($id)
    {
        $ada = $this->pengungumanmodel->find($id);
        if (!$ada) {
            return redirect()->back();
        }
        $post = $this->request->getPost();
        $this->pengungumanmodel->update($id, $post);
        session()->setFlashdata('widget', 'Pengunguman berhasil diubah');
        return redirect()->to('/home/widget');
    }

    public function pengungumanhapus($id)
    {
        $this->pengungumanmodel->delete($id);
        session()->setFlashdata('widget', 'Pengunguman berhasil dihapus');
        return redirect()->to('/home/widget');
    }

    public function videoyt()
    {
        $data  = [
            'validation'    => Services::validation(),
            'title' => 'Link Video | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri
        ];
        return view('/dashboard/widget/tambahvideoyt', $data);
    }

    public function videoytprocess()
    {
        $post = $this->request->getPost();
        $this->videoytmodel->insert($post);
        session()->setFlashdata('widget', 'Link video berhasil di tambah');
        return redirect()->to('/home/widget');
    }

    public function videoytedit($id)
    {
        $ada = $this->videoytmodel->find($id);
        if (!$ada) {
            return redirect()->back();
        }

        $data = [
            'validation'    => Services::validation(),
            'isi'   => $ada,
            'user'  => $this->user,
            'uri'   => $this->uri,
            'title' => 'Link Video | Padukuhan Kedung Dayak'
        ];
        return view('dashboard/widget/editvideoyt', $data);
    }

    public function videoyteditprocess($id)
    {
        $ada = $this->videoytmodel->find($id);
        if (!$ada) {
            return redirect()->back();
        }
        $post = $this->request->getPost();
        $this->videoytmodel->update($id, $post);
        session()->setFlashdata('widget', 'Link video berhasil diubah');
        return redirect()->to('/home/widget');
    }

    public function videoythapus($id)
    {
        $this->videoytmodel->delete($id);
        session()->setFlashdata('widget', 'Link video berhasil dihapus');
        return redirect()->to('/home/widget');
    }

    // ----------Pictures---------

    public function pictures()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');
        session()->remove('inforumah');

        $data  = [
            'title'         => 'Gambar | Padukuhan Kedung Dayak',
            'user'          => $this->user,
            'uri'           => $this->uri,
            'bigimg'        => $this->bigimgmodel->findAll(),
            'smallimg'      => $this->smallimgmodel->findAll(),
        ];
        return view('/dashboard/pict/pict', $data);
    }

    public function bigimgadd()
    {
        $data  = [
            'title'         => 'Tambah Gambar Besar | Padukuhan Kedung Dayak',
            'user'          => $this->user,
            'uri'           => $this->uri,
            'validation'    => Services::validation()
        ];
        return view('/dashboard/pict/bigimgadd', $data);
    }

    public function bigimgaddprocess()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'permit_empty',
                'errors' => [
                    'permit_empty' => 'Judul untuk gambar boleh kosong'
                ]
            ],
            'subtitle' => [
                'rules' => 'permit_empty',
                'errors' => [
                    'permit_empty' => 'Keterangan untuk gambar boleh kosong'
                ]
            ],
            'gambar' => [
                'rules'  => 'uploaded[gambar]|max_size[gambar,5120]|ext_in[gambar,png,jpg,jpeg]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Gambar diperlukan',
                    'max_size'  => 'Ukuran gambar maksimal 5 MB',
                    'ext_in'    => 'File harus sebuah gambar',
                    'mime_in'   => 'File harus sebuah gambar',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $post = $this->request->getPost();

        $gambar = $this->request->getFile('gambar');
        $newName = $gambar->getRandomName();
        $gambar->move('gambar/bigimg', $newName);

        $post['gambar'] = $newName;

        $this->bigimgmodel->insert($post);
        session()->setFlashdata('pictures', 'Gambar besar berhasil ditambahkan');
        return redirect()->to('/home/pictures');
    }

    public function bigimgedit($id)
    {
        $data = [
            'title' => 'Edit Big Image | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'data'  => $this->bigimgmodel->where('id', $id)->first(),
            'validation'    => Services::validation(),
        ];
        return view('/dashboard/pict/bigimgedit', $data);
    }

    public function bigimgeditprocess($id)
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'permit_empty',
                'errors' => [
                    'permit_empty' => 'Judul untuk gambar boleh kosong'
                ]
            ],
            'subtitle' => [
                'rules' => 'permit_empty',
                'errors' => [
                    'permit_empty' => 'Sub judul untuk gambar boleh kosong'
                ]
            ],
            'gambar' => [
                'rules'  => 'permit_empty|uploaded[gambar]|max_size[gambar,5120]|ext_in[gambar,png,jpg,jpeg]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Gambar diperlukan',
                    'max_size'  => 'Ukuran gambar maksimal 5 MB',
                    'ext_in'    => 'File harus sebuah gambar',
                    'mime_in'   => 'File harus sebuah gambar',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $post = $this->request->getPost();
        $gambar = $this->request->getFile('newimg');

        if ($gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move('gambar/bigimg', $newName);
            $post['gambar'] = $newName;
        }

        $this->bigimgmodel->update($id, $post);
        session()->setFlashdata('pictures', 'Gambar besar diubah');
        return redirect()->to('/home/pictures');
    }

    public function bigimgdelete($id)
    {
        $this->bigimgmodel->delete($id);
        session()->setFlashdata('pictures', 'Gambar besar berhasil dihapus');
        return redirect()->to('/home/pictures');
    }

    public function smallimgadd()
    {
        $data  = [
            'title'         => 'Tambah Gambar Kecil | Padukuhan Kedung Dayak',
            'user'          => $this->user,
            'uri'           => $this->uri,
            'validation'    => Services::validation()
        ];
        return view('/dashboard/pict/smallimgadd', $data);
    }

    public function smallimgaddprocess()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama untuk gambar diperlukan'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan untuk gambar diperlukan'
                ]
            ],
            'gambar' => [
                'rules'  => 'uploaded[gambar]|max_size[gambar,5120]|ext_in[gambar,png,jpg,jpeg]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Gambar diperlukan',
                    'max_size'  => 'Ukuran gambar maksimal 5 MB',
                    'ext_in'    => 'File harus sebuah gambar',
                    'mime_in'   => 'File harus sebuah gambar',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $post = $this->request->getPost();

        $gambar = $this->request->getFile('gambar');
        $newName = $gambar->getRandomName();
        $gambar->move('gambar/smallimg', $newName);

        $post['gambar'] = $newName;

        $this->smallimgmodel->insert($post);
        session()->setFlashdata('pictures', 'Gambar kecil berhasil ditambahkan');
        return redirect()->to('/home/pictures');
    }

    public function smallimgedit($id)
    {
        $data = [
            'title' => 'Edit Small Image | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'data'  => $this->smallimgmodel->where('id', $id)->first(),
            'validation'    => Services::validation(),
        ];
        return view('/dashboard/pict/smallimgedit', $data);
    }

    public function smallimgeditprocess($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama untuk gambar diperlukan'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan untuk gambar diperlukan'
                ]
            ],
            'gambar' => [
                'rules'  => 'permit_empty|uploaded[gambar]|max_size[gambar,5120]|ext_in[gambar,png,jpg,jpeg]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Gambar diperlukan',
                    'max_size'  => 'Ukuran gambar maksimal 5 MB',
                    'ext_in'    => 'File harus sebuah gambar',
                    'mime_in'   => 'File harus sebuah gambar',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $post = $this->request->getPost();
        $gambar = $this->request->getFile('newimg');

        if ($gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move('gambar/smallimg', $newName);
            $post['gambar'] = $newName;
        }

        $this->smallimgmodel->update($id, $post);
        session()->setFlashdata('pictures', 'Gambar kecil diubah');
        return redirect()->to('/home/pictures');
    }

    public function smallimgdelete($id)
    {
        $this->smallimgmodel->delete($id);
        session()->setFlashdata('pictures', 'Gambar kecil berhasil dihapus');
        return redirect()->to('/home/pictures');
    }

    public function kritiksarandelete($id)
    {
        $this->kritiksaranmodel->delete($id);
        session()->setFlashdata('widget', 'Kritik dan saran berhasil dihapus');
        return redirect()->to('/home/widget');
    }
}

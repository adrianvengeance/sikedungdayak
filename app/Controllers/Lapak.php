<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LapakModel;
use Config\Services;

class Lapak extends BaseController
{
    public function __construct()
    {
        $this->uri = current_url(true);
        $this->lapakmodel = new LapakModel();

        $this->db = \Config\Database::connect();
        $this->user = $this->db->table('users')->where(['id_user' => session('id_user')])->get()->getRow();
    }
    public function index()
    {
        $isi = $this->lapakmodel->findAll();
        $pesan = '?text=Hi%2C%20apakah%20produk%20ini%20tersedia%3F';
        $data = [
            'title'     => 'Produk Lapak | Padukuhan Kedung Dayak',
            'uri'       => $this->uri,
            'products'  => $isi,
            'pesan'     => $pesan
        ];

        return view('lapak/lapakhome', $data);
    }

    public function dashboard()
    {
        session()->remove('referred_from');
        session()->remove('orangpindah');
        session()->remove('orangmeninggal');

        $produks = $this->db->table('lapak')->get()->getResult();

        $data = [
            'title' => 'Lapak | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'data'  => $produks,
            'validation'    => Services::validation(),
        ];
        return view('/dashboard/lapak/lapak', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Produk | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'validation'    => Services::validation(),
        ];
        return view('/dashboard/lapak/lapaktambah', $data);
    }

    public function tambahprocess()
    {
        if (!$this->validate([
            'nama'      => [
                'rules'  => 'required|string|max_length[30]',
                'errors' => [
                    'required'  => 'Nama diperlukan',
                    'string'   => 'Nama produk berupa karakter yang bisa dibaca',
                    'max_length' => 'Nama produk maksimal 30 karakter'
                ]
            ],
            'deskripsi'  => [
                'rules'  => 'required|max_length[280]',
                'errors' => [
                    'required'  => 'Deskripsi diperlukan',
                    'max_length' => 'Deskripsi maksimal 280 karakter'
                ]
            ],
            'no_wa'  => [
                'rules'  => 'required|is_natural|mobileValidation[no_wa]',
                'errors' => [
                    'required'  => 'Nomor Whatsapp diperlukan',
                    'is_natural'    => 'Format nomor tidak benar',
                    'mobileValidation'  => 'Format nomor diawali dengan angka 8'
                ]
            ],
            'harga' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => 'Harga diperlukan',
                    'is_natural'    => 'Masukan hanya angka tanpa karakter lain'
                ]
            ],
            'gambar' => [
                'rules'  => 'uploaded[gambar]|max_size[gambar,4096]|ext_in[gambar,png,jpg,jpeg]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Gambar diperlukan',
                    'max_size'  => 'Ukuran gambar maksimal 4MB',
                    'ext_in'    => 'File harus sebuah gambar',
                    'mime_in'   => 'File harus sebuah gambar',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $gambar = $this->request->getFile('gambar');        //ambil file upload gambar
        $no_wa  = $this->request->getVar('no_wa');
        $nama = $this->request->getVar('nama');

        $newName = $gambar->getRandomName();
        $gambar->move("produklapak/$nama-0$no_wa", $newName);         //pindahkan ke folder lapak/nomor

        $datalapak = [
            'nama'      => $nama,
            'gambar'    => $newName,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga'     => $this->request->getVar('harga'),
            'no_wa'     => $this->request->getVar('no_wa'),

        ];

        $this->db->table('lapak')->insert($datalapak);     //input data ke database table lapak
        session()->setFlashdata('lapak', 'Produk berhasil ditambahkan');
        return redirect()->to('/home/lapak');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Produk | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'data'  => $this->db->table('lapak')->where(['id_produk' => $id])->get()->getRow(),
            'validation'    => Services::validation(),
        ];
        return view('/dashboard/lapak/lapakedit', $data);
    }

    public function editprocess($id)
    {
        if (!$this->validate([
            'nama'      => [
                'rules'  => 'required|string|max_length[30]',
                'errors' => [
                    'required'  => 'Nama diperlukan',
                    'string'   => 'Karakter string',
                    'max_length' => 'Nama produk maksimal 30 karakter'
                ]
            ],
            'deskripsi'  => [
                'rules'  => 'required|max_length[280]',
                'errors' => [
                    'required'  => 'Deskripsi diperlukan',
                    'max_length' => 'Deskripsi maksimal 280 karakter'
                ]
            ],
            'no_wa'  => [
                'rules'  => 'required|is_natural|mobileValidation[no_wa]',
                'errors' => [
                    'required'  => 'Nomor Whatsapp diperlukan',
                    'is_natural'    => 'Format nomor tidak benar',
                    'mobileValidation'  => 'Format nomor diawali dengan angka 8'
                ]
            ],
            'harga' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'      => 'Harga diperlukan',
                    'is_natural'    => 'Masukan hanya angka tanpa karakter lain'
                ]
            ]
        ])) {

            return redirect()->back()->withInput();
        }
        $datalapak = [
            'nama'      => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga'     => $this->request->getVar('harga'),
            'no_wa'     => $this->request->getVar('no_wa'),
        ];

        $this->db->table('lapak')->where(['id_produk' => $id])->update($datalapak);     //input data ke database table lapak
        session()->setFlashdata('lapak', 'Produk berhasil diubah');
        return redirect()->to('/home/lapak');
    }

    public function editimg($id)
    {
        $data = [
            'title' => 'Edit Gambar Produk | Padukuhan Kedung Dayak',
            'user'  => $this->user,
            'uri'   => $this->uri,
            'data'  => $this->db->table('lapak')->where(['id_produk' => $id])->get()->getRow(),
            'validation'    => Services::validation(),
        ];
        return view('/dashboard/lapak/lapakeditimg', $data);
    }

    public function editimgprocess($id)
    {
        if (!$this->validate([
            'gambar' => [
                'rules'  => 'uploaded[gambar]|max_size[gambar,4096]|ext_in[gambar,png,jpg,jpeg]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded'  => 'Gambar diperlukan',
                    'max_size'  => 'Ukuran gambar maksimal 4MB',
                    'ext_in'    => 'File harus sebuah gambar',
                    'mime_in'   => 'File harus sebuah gambar',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $produk = $this->lapakmodel->where(['id_produk' => $id])->first();
        $nama   = $produk['nama'];
        $no_wa  = $produk['no_wa'];
        $oldgambar = $produk['gambar'];

        // helper('filesystem');
        // delete_files('./produklapak/' . $nama . '-0' . $no_wa . '/' . $oldgambar);  //delete gambar lama not work i dont know why

        $gambar = $this->request->getFile('gambar');        //ambil file upload gambar
        $gambar->move("produklapak/$nama-0$no_wa");         //pindahkan ke folder lapak/nomor
        $nama_gambar = $gambar->getName();                  //ambil nama file upload

        $datalapak = [
            'gambar'    => $nama_gambar,
        ];

        $this->db->table('lapak')->where(['id_produk' => $id])->update($datalapak);     //input data ke database table lapak
        session()->setFlashdata('gambar', 'Gambar produk berhasil diubah');
        return redirect()->to('/home/lapak/edit/' . $id);
    }

    public function hapus($id)
    {
        $this->lapakmodel->delete($id);
        session()->setFlashdata('lapak', 'Produk berhasil dihapus.');
        return redirect()->to('/home/lapak');
    }
}

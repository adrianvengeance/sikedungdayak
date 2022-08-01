<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use CodeIgniter\Files\File;
use App\Models\NewsModel;
use App\Models\VideoytModel;
use App\Models\VisitorModel;
use App\Models\SmallimgModel;
use App\Models\PengungumanModel;
use CodeIgniter\I18n\Time;

class News extends BaseController
{
   public $defaultLocale = 'id';
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->user = $this->db->table('users')->where(['id_user' => session('id_user')])->get()->getRow();
      $this->uri = current_url(true);
      $this->newsmodel = new NewsModel();
      $this->videoytmodel = new VideoytModel();
      $this->smallimgmodel = new SmallimgModel();
      $this->visitor_model = new VisitorModel();
      $this->pengungumanmodel = new PengungumanModel();

      helper(['visitor']);
      $site_statics_today = $this->visitor_model->get_site_data_for_today();
      $site_statics_last_week = $this->visitor_model->get_site_data_for_last_week();
      $this->visits_today = isset($site_statics_today['visits']) ? $site_statics_today['visits'] : 0;
      $this->visits_last_week = isset($site_statics_last_week['visits']) ? $site_statics_last_week['visits'] : 0;
      // $chart_data_today = $this->visitor_model->get_chart_data_for_today();
      $chart_data_curr_month = $this->visitor_model->get_chart_data_for_month_year();
      // $this->visits_data_today = isset($chart_data_today) ? $chart_data_today : array();

      $sum = 0;
      foreach ($chart_data_curr_month as $x) {
         $sum += $x->visits;
      }
      $this->visits_curr_month =  $sum;
      $this->visits_statics_total = count($this->visitor_model->findAll());
   }
   public function index()
   {
      $all = $this->newsmodel->getNewsGroup();

      $data = [
         'title'  => 'Artikel | Padukuhan Kedung Dayak',
         'uri'    => $this->uri,
         'all'   => $all,
      ];

      return view('/news/newshome', $data);
   }

   public function show($date, $slug)
   {
      $berita = $this->newsmodel->getNewsBySlug($slug);
      if ($berita) {
         $month = date('Y-m', strtotime($berita['created_at']));
         if ($month == $date) {
            $data = [
               'title'  => $berita['title'] . ' | Padukuhan Kedung Dayak',
               'uri'    => $this->uri,
               'berita' => $berita,
               'days'   => ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
               'months' => ["null", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
               'announce'  => $this->pengungumanmodel->findAll(),
               'videoyt'   => $this->videoytmodel->first(),
               'vstoday'   => $this->visits_today,
               'vslastwk'  => $this->visits_last_week,
               'vscurmon'  => $this->visits_curr_month,
               'vstotal'   => $this->visits_statics_total,
               'smallimg'  => $this->smallimgmodel->findAll()
            ];
            return view('/news/newspage', $data);
         }
         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
      }
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
   }

   public function dashboard()
   {
      session()->remove('referred_from');
      session()->remove('orangpindah');
      session()->remove('orangmeninggal');

      $data = [
         'title' => 'Artikel | Padukuhan Kedung Dayak',
         'user'  => $this->user,
         'uri'   => $this->uri,
         'data'  => $this->newsmodel->getNewsBySlug(),
         'validation'    => Services::validation(),
      ];
      return view('/dashboard/news/news', $data);
   }

   public function tambah()
   {
      $data = [
         'title' => 'Tambah Artikel | Padukuhan Kedung Dayak',
         'user'  => $this->user,
         'uri'   => $this->uri,
         'kategori'     => $this->newsmodel->categorylist(),
         'validation'   => Services::validation(),
      ];
      return view('/dashboard/news/tambah', $data);
   }

   public function tambahprocess()
   {
      if (!$this->validate([
         'title'      => [
            'rules'  => 'required|is_unique[news.title]',
            'errors' => [
               'required'  => 'Judul artikel diperlukan',
               'is_unique' => 'Judul artikel sudah ada, coba yang lain'
            ]
         ],
         'body'  => [
            'rules'  => 'required',
            'errors' => [
               'required'  => 'Isi artikel diperlukan',
            ]
         ],
         'author' => [
            'rules' => 'required',
            'errors' => [
               'required'  => 'Penulis artikel diperlukan'
            ]
         ],
         'category' => [
            'rules' => 'required',
            'errors' => [
               'required'  => 'Kategori artikel diperlukan'
            ]
         ],
         'image' => [
            'rules'  => 'uploaded[image]|max_size[image,4096]|ext_in[image,png,jpg,jpeg]|mime_in[image,image/png,image/jpg,image/jpeg]',
            'errors' => [
               'uploaded'  => 'Gambar diperlukan',
               'max_size'  => 'Ukuran gambar maksimal 4MB',
               'ext_in'    => 'File harus sebuah gambar',
               'mime_in'   => 'File harus sebuah gambar',
            ]
         ],
      ])) {
         return redirect()->back()->withInput();
      }
      $thnbln = date('F - Y');                           //buat date Bulan - Tahun

      $author = $this->request->getPost('author');       //ambil penulis
      $gambar = $this->request->getFile('image');        //ambil file upload gambar        
      $gambar->move("kontenberita/$thnbln/$author");     //pindahkan ke folder berita/bulan tahun/penulis
      $nama_gambar = $gambar->getName();                 //ambil nama file upload

      $berita = [
         'title' => $this->request->getPost('title'),
         'slug'  => url_title($this->request->getPost('title'), '-', true),
         'body'  => $this->request->getPost('body'),
         'image' => $nama_gambar,
         'category'   => $this->request->getVar('category'),
         'groupmonth' => $thnbln,
         'author' => $author,
      ];
      $this->newsmodel->save($berita);
      session()->setFlashdata('berita', 'Artikel berhasil ditambahkan.');
      return redirect()->to('/home/artikel');
   }

   public function edit($id)
   {
      $data = [
         'title' => 'Edit Artikel | Padukuhan Kedung Dayak',
         'user'  => $this->user,
         'uri'   => $this->uri,
         'isi'   => $this->newsmodel->getNewsById($id),
         'kategori'     => $this->newsmodel->categorylist(),
         'validation'   => Services::validation()
      ];
      return view('/dashboard/news/edit', $data);
   }

   public function update($id)
   {
      $news = $this->newsmodel->getNewsById($id);
      $value = $news['title'];
      if (!$this->validate([
         'title'      => [
            'rules'  => "required|is_unique[news.title,title,$value]",
            'errors' => [
               'required'  => 'Judul artikel diperlukan',
               'is_unique' => 'Judul artikel sudah ada, coba yang lain'
            ]
         ],
         'body'  => [
            'rules'  => 'required',
            'errors' => [
               'required'  => 'Isi artikel diperlukan',
            ]
         ],
         'author' => [
            'rules' => 'required',
            'errors' => [
               'required'  => 'Penulis artikel diperlukan'
            ]
         ],
         'category' => [
            'rules' => 'required',
            'errors' => [
               'required'  => 'Kategori artikel diperlukan'
            ]
         ]
      ])) {
         return redirect()->back()->withInput();
      }
      $news = [
         'title'  => $this->request->getVar('title'),
         'slug'   => url_title($this->request->getVar('title'), '-', true),
         'body'   => $this->request->getVar('body'),
         'author' => $this->request->getVar('author'),
         'category' => $this->request->getVar('category')
      ];

      $this->newsmodel->update($id, $news);                       //update dengan id yang sama ke table news
      session()->setFlashdata('berita', 'Artikel berhasil diubah');
      return redirect()->to('/home/artikel');
   }

   public function editimage($id)
   {
      $data = [
         'title' => 'Ubah Gambar Artikel | Padukuhan Kedung Dayak',
         'user'  => $this->user,
         'uri'   => $this->uri,
         'isi'   => $this->newsmodel->getNewsById($id),
         'validation'    => Services::validation(),
      ];
      return view('/dashboard/news/editimg', $data);
   }

   public function updateimage($id)
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
      $news = $this->newsmodel->getNewsById($id);
      $month   = $news['groupmonth'];
      $author  = $news['author'];
      $oldgambar = $news['image'];
      $file = new File("berita/$month/$author/$oldgambar");

      // helper('filesystem');
      // delete_files($file);  //delete gambar lama not work i dont know why

      $gambar = $this->request->getFile('gambar');        //ambil file upload gambar        
      $gambar->move("kontenberita/$month/$author");             //pindahkan ke folder berita/tahun bulan/author
      $nama_gambar = $gambar->getName();                  //ambil nama file upload

      $news = [
         'image'    => $nama_gambar,
      ];

      $this->newsmodel->update($id, $news);     //input data ke table news
      session()->setFlashdata('gambar', 'Gambar artikel berhasil diubah');
      return redirect()->to('/home/artikel/edit/' . $id);
   }

   public function hapus($id)
   {
      $this->newsmodel->delete($id);
      session()->setFlashdata('berita', 'Artikel berhasil dihapus.');
      return redirect()->to('/home/artikel');
   }
}

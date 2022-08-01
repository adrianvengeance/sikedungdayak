<?php

namespace App\Controllers;

use Codeigniter\HTTP\URI;
use App\Models\NewsModel;
use App\Models\BigimgModel;
use App\Models\SmallimgModel;
use App\Models\VisitorModel;
use App\Models\VideoytModel;
use App\Models\PengungumanModel;
use App\Models\KritiksaranModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->newsmodel = new NewsModel();
        $this->bigimgmodel = new BigimgModel();
        $this->smallimgmodel = new SmallimgModel();
        $this->visitormodel = new VisitorModel();
        $this->videoytmodel = new VideoytModel();
        $this->visitor_model = new VisitorModel();
        $this->pengungumanmodel = new PengungumanModel();
        $this->kritiksaranmodel = new KritiksaranModel();
        $this->uri = new URI();

        $this->hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        $this->bulan = ["null", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $this->announce = $this->pengungumanmodel->findAll();
        $this->video = $this->videoytmodel->first();

        helper(['visitor']);
        $site_statics_today = $this->visitor_model->get_site_data_for_today();
        $site_statics_last_week = $this->visitor_model->get_site_data_for_last_week();
        $this->visits_today = isset($site_statics_today['visits']) ? $site_statics_today['visits'] : 0;
        $this->visits_last_week = isset($site_statics_last_week['visits']) ? $site_statics_last_week['visits'] : 0;
        // $chart_data_today = $this->visitor_model->get_chart_data_for_today();
        $chart_data_curr_month = $this->visitor_model->get_chart_data_for_month_year();
        // $this->visits_data_today = isset($chart_data_today) ? $chart_data_today : array();

        $sum = 0;
        if (!is_null($chart_data_curr_month)) {
            foreach ($chart_data_curr_month as $x) {
                $sum += $x->visits;
            }
        }
        $this->visits_curr_month =  $sum;
        $this->visits_statics_total = count($this->visitor_model->findAll());
    }
    public function index()
    {
        $bigimg = $this->bigimgmodel->findAll();
        $berita = $this->newsmodel->getNewsGroup();
        foreach ($berita as $x => $row) {
            $news[$row->created_at] = $row;
        }

        $data = [
            'title' => 'Padukuhan Kedung Dayak',
            'bigimg'   => $bigimg,
            'bigimgmin1' => (count($bigimg) - 1),
            'berita'    => array_slice($news, 0, 4)
        ];

        return view('homepage', $data);
    }

    public function cari()
    {
        $cari = $this->request->getVar('cari');
        dd($cari);
    }

    public function wilayah()
    {
        $data = [
            'title' => 'Profil Wilayah Padukuhan | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/profile/profile_wilayah_padukuhan', $data);
    }

    public function peta()
    {
        $data = [
            'title'     => 'Peta Wilayah Padukuhan | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/profile/peta_wilayah_padukuhan', $data);
    }

    public function caripeta()
    {
        $cari = $this->request->getPost();
        dd($cari);
    }

    public function sejarah()
    {
        $data = [
            'title' => 'Sejarah Padukuhan | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/profile/sejarah_padukuhan', $data);
    }

    public function visimisi()
    {
        $data = [
            'title' => 'Visi dan Misi | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/pemerintahan/visi_misi', $data);
    }

    public function karangtaruna()
    {
        $data = [
            'title' => 'Karang Taruna | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/pemerintahan/lembaga_masyarakat/karang_taruna', $data);
    }

    public function kelompoktani()
    {
        $data = [
            'title' => 'Kelompok Tani | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/pemerintahan/lembaga_masyarakat/kelompok_tani', $data);
    }

    public function kwt()
    {
        $data = [
            'title' => 'Kelompok Wanita Tani | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/pemerintahan/lembaga_masyarakat/kelompok_wanita_tani', $data);
    }

    public function linmas()
    {
        $data = [
            'title' => 'LINMAS | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/pemerintahan/lembaga_masyarakat/linmas', $data);
    }

    public function pkk()
    {
        $data = [
            'title' => 'PKK | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/pemerintahan/lembaga_masyarakat/pkk', $data);
    }

    public function pokgiat()
    {
        $data = [
            'title' => 'POKGIAT | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/pemerintahan/lembaga_masyarakat/pokgiat', $data);
    }

    public function posyandu()
    {
        $data = [
            'title' => 'POSYANDU | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/pemerintahan/lembaga_masyarakat/posyandu', $data);
    }

    public function monografisem1()
    {
        $data = [
            'title' => 'Monografi Semester 1 | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/monografi/semester_i', $data);
    }

    public function monografisem2()
    {
        $data = [
            'title' => 'Monografi Semester 2 | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/monografi/semester_ii', $data);
    }

    public function potensikerajinan()
    {
        $data = [
            'title' => 'Potensi Kerajinan | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/potensi/kerajinan', $data);
    }

    public function potensikuliner()
    {
        $data = [
            'title' => 'Potensi Kuliner | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/potensi/kuliner', $data);
    }

    public function potensiunggulan()
    {
        $data = [
            'title' => 'Potensi Unggulan | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/potensi/unggulan', $data);
    }

    public function produkhukum()
    {
        $data = [
            'title' => 'Produk Hukum | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/produk_hukum/produk_hukum', $data);
    }

    public function kritiksaran()
    {
        $lastUrl = ($_SERVER['HTTP_REFERER']);
        if (!$this->validate([
            'niknama'   => 'required',
            'isi'       => 'required'
        ])) {
            return redirect()->to($lastUrl);
        }
        $post = $this->request->getPost();
        $this->kritiksaranmodel->insert($post);
        return redirect()->to($lastUrl);
    }

    // public function googlerecaptcha()
    // {
    //     $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));

    //     // form data

    //     $secret = env('RECAPTCHAV2_SITEKEY');

    //     $credential = array(
    //         'secret' => $secret,
    //         'response' => $recaptchaResponse
    //     );

    //     $verify = curl_init();
    //     curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    //     curl_setopt($verify, CURLOPT_POST, true);
    //     curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
    //     curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    //     $response = curl_exec($verify);

    //     $status = json_decode($response, true);

    //     $session = session();

    //     if ($status['success']) {

    //         $session->setFlashdata('msg', 'Form has been successfully submitted');
    //     } else {

    //         $session->setFlashdata('msg', 'Please check your inputs');
    //     }

    //     return redirect()->to('form');
    // }
}

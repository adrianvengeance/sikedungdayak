<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DataModel;
use App\Models\VideoytModel;
use App\Models\VisitorModel;
use App\Models\SmallimgModel;
use App\Models\PengungumanModel;

class Data extends BaseController
{
    public function __construct()
    {
        $this->datamodel = new DataModel();
        $this->videoytmodel = new VideoytModel();
        $this->smallimgmodel = new SmallimgModel();
        $this->visitor_model = new VisitorModel();
        $this->pengungumanmodel = new PengungumanModel();

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
        foreach ($chart_data_curr_month as $x) {
            $sum += $x->visits;
        }
        $this->visits_curr_month =  $sum;
        $this->visits_statics_total = count($this->visitor_model->findAll());
    }

    public function index()
    {
    }

    public function rumahdata()
    {
        $batasumur = ['57+', '19-56', '7-18', '4-6', '0-3'];
        $umurpria = [
            $this->datamodel->umurjeniskel_57('LAKI-LAKI'),
            $this->datamodel->umurjeniskel_1956('LAKI-LAKI'),
            $this->datamodel->umurjeniskel_718('LAKI-LAKI'),
            $this->datamodel->umurjeniskel_46('LAKI-LAKI'),
            $this->datamodel->umurjeniskel_03('LAKI-LAKI'),
        ];
        $umurwanita = [
            $this->datamodel->umurjeniskel_57('PEREMPUAN'),
            $this->datamodel->umurjeniskel_1956('PEREMPUAN'),
            $this->datamodel->umurjeniskel_718('PEREMPUAN'),
            $this->datamodel->umurjeniskel_46('PEREMPUAN'),
            $this->datamodel->umurjeniskel_03('PEREMPUAN'),
        ];

        $kategoripnddkn = ['Tidak Sekolah', 'Belum Sekolah', 'Tidak Tamat SD', 'SD/MI', 'SMP/Mts', 'SMA/SMK/MA', 'Perguruan Tinggi'];
        $pnddknbyusia = [
            count($this->datamodel->pendidikanbyusia('tidak')),
            count($this->datamodel->pendidikanbyusia('belum')),
            count($this->datamodel->pendidikanbyusia('tamat')),
            count($this->datamodel->pendidikanbyusia('sd')),
            count($this->datamodel->pendidikanbyusia('smp')),
            count($this->datamodel->pendidikanbyusia('sma')),
            count($this->datamodel->pendidikanbyusia('d1')) + count($this->datamodel->pendidikanbyusia('d2')) + count($this->datamodel->pendidikanbyusia('d3')) + count($this->datamodel->pendidikanbyusia('d4')) + count($this->datamodel->pendidikanbyusia('s1')) + count($this->datamodel->pendidikanbyusia('s2')) + count($this->datamodel->pendidikanbyusia('s3'))
        ];

        $jmlhrt = ['RT 1', 'RT 2', 'RT 3', 'RT 4'];
        $jmlhkk = [
            $this->datamodel->jumlahkk(1),
            $this->datamodel->jumlahkk(2),
            $this->datamodel->jumlahkk(3),
            $this->datamodel->jumlahkk(4),
        ];

        $jobslist = $this->datamodel->jobslist();
        $pekerjaan = [];
        foreach ($jobslist as $job) {
            $pekerjaan[] = count($this->datamodel->getjobs($job));
        }

        // Per KK
        $kkrt1 = [
            count($this->datamodel->kkrt('1', 'LAKI-LAKI')),
            count($this->datamodel->kkrt('1', 'PEREMPUAN')),
        ];
        $jjrt1 = [
            count($this->datamodel->jeniskelperrt('1', 'LAKI-LAKI')),
            count($this->datamodel->jeniskelperrt('1', 'PEREMPUAN')),
        ];
        $totalrt1 = [count($this->datamodel->totalperrt('1'))];

        $kkrt2 = [
            count($this->datamodel->kkrt('2', 'LAKI-LAKI')),
            count($this->datamodel->kkrt('2', 'PEREMPUAN')),
        ];
        $jjrt2 = [
            count($this->datamodel->jeniskelperrt('2', 'LAKI-LAKI')),
            count($this->datamodel->jeniskelperrt('2', 'PEREMPUAN')),
        ];
        $totalrt2 = [count($this->datamodel->totalperrt('2'))];

        $kkrt3 = [
            count($this->datamodel->kkrt('3', 'LAKI-LAKI')),
            count($this->datamodel->kkrt('3', 'PEREMPUAN')),
        ];
        $jjrt3 = [
            count($this->datamodel->jeniskelperrt('3', 'LAKI-LAKI')),
            count($this->datamodel->jeniskelperrt('3', 'PEREMPUAN')),
        ];
        $totalrt3 = [count($this->datamodel->totalperrt('3'))];

        $kkrt4 = [
            count($this->datamodel->kkrt('4', 'LAKI-LAKI')),
            count($this->datamodel->kkrt('4', 'PEREMPUAN')),
        ];
        $jjrt4 = [
            count($this->datamodel->jeniskelperrt('4', 'LAKI-LAKI')),
            count($this->datamodel->jeniskelperrt('4', 'PEREMPUAN')),
        ];
        $totalrt4 = [count($this->datamodel->totalperrt('4'))];

        $data = [
            'title'             => 'Rumah Data | Padukuhan Kedung Dayak',
            'days'              => $this->hari,
            'months'            => $this->bulan,
            'announce'          => $this->announce,
            'videoyt'           => $this->video,
            'batasumur'         => $batasumur,
            'semuaorang'        => count($this->datamodel->umursemua()),
            'semuapria'         => $this->datamodel->jumlahjeniskel('LAKI-LAKI'),
            'umurpria'          => $umurpria,
            'semuawanita'       => $this->datamodel->jumlahjeniskel('PEREMPUAN'),
            'umurwanita'        => $umurwanita,
            'kategoripnddkn'    => $kategoripnddkn,
            'pnddknbyusia'      => $pnddknbyusia,
            'jmlhrt'            => $jmlhrt,
            'jmlhkk'            => $jmlhkk,
            'jobs'              => $jobslist,
            'job'               => $pekerjaan,
            'kkrt1'             => $kkrt1,
            'jjrt1'             => $jjrt1,
            'totalrt1'          => $totalrt1,
            'kkrt2'             => $kkrt2,
            'jjrt2'             => $jjrt2,
            'totalrt2'          => $totalrt2,
            'kkrt3'             => $kkrt3,
            'jjrt3'             => $jjrt3,
            'totalrt3'          => $totalrt3,
            'kkrt4'             => $kkrt4,
            'jjrt4'             => $jjrt4,
            'totalrt4'          => $totalrt4,
            'vstoday'           => $this->visits_today,
            'vslastwk'          => $this->visits_last_week,
            'vscurmon'          => $this->visits_curr_month,
            'vstotal'           => $this->visits_statics_total,
            'smallimg'          => $this->smallimgmodel->findAll()
        ];
        return view('/rumahdata/rumahdata', $data);
    }


    public function inforumah($nokk)
    {
        $infoo = $this->datamodel->inforumah($nokk);
        if (!$infoo) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Nomor Kartu Keluarga tidak ditemukan');
        }
        $data = [
            'title'     => 'Info Rumah | Padukuhan Kedung Dayak',
            'days'      => $this->hari,
            'months'    => $this->bulan,
            'announce'  => $this->announce,
            'videoyt'   => $this->video,
            'data'      => $infoo,
            'nokk'      => $nokk,
            'vstoday'   => $this->visits_today,
            'vslastwk'  => $this->visits_last_week,
            'vscurmon'  => $this->visits_curr_month,
            'vstotal'   => $this->visits_statics_total,
            'smallimg'  => $this->smallimgmodel->findAll()
        ];
        return view('/info/inforumah', $data);
    }

    public function infoedit($nokk)
    {
        session()->set('referred_from', base_url("/home/info/edit/$nokk"));
        return redirect()->to("/home/info/edit/$nokk");
    }
}

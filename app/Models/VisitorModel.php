<?php

namespace App\Models;

use CodeIgniter\Model;

class VisitorModel extends Model
{
  // protected $DBGroup          = 'default';
  // protected $table            = 'visitors';
  // protected $primaryKey       = 'id';
  // protected $allowedFields    = ['ip', 'date', 'hits', 'online', 'time'];

  // public function cekPengunjung($ipAddress)
  // {
  //     $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
  //     $waktu = time(); //
  //     $timeinsert = date("Y-m-d H:i:s");

  //     // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini        
  //     $ada = $this->db->query("SELECT * FROM visitors WHERE ip='" . $ipAddress . "' AND date='" . $date . "'")->getNumRows();
  //     $ss = isset($ada) ? ($ada) : 0;

  //     // Kalau belum ada, simpan data user tersebut ke database
  //     if ($ss == 0) {
  //         // $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
  //         $visitor = ['ip' => $ipAddress, 'date' => $date, 'hits' => '1', 'online' => $waktu, 'time' => $timeinsert];
  //         $this->insert($visitor);
  //     }
  //     // Jika sudah ada, update
  //     else {
  //         // $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ipAddress . "' AND date='" . $date . "'");
  //         $visited = ['hits' => 'hits' . +1, 'online' => $waktu, 'ip' => $ipAddress, 'date' => $date];
  //         $this->update($visited);
  //     }
  //     $pengunjunghariini  = $this->db->query("SELECT * FROM visitors WHERE date='" . $date . "' GROUP BY ip")->getNumRows();  // Hitung jumlah pengunjung
  //     $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitors")->getRow();
  //     $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0;                                              // hitung total pengunjung
  //     $bataswaktu = time() - 300;
  //     $pengunjungonline  = $this->db->query("SELECT * FROM visitors WHERE online > '" . $bataswaktu . "'")->getNumRows();     // hitung pengunjung online

  //     $visitors = [
  //         'pengunjunghariini' => $pengunjunghariini,
  //         'totalpengunjung' => $totalpengunjung,
  //         'pengunjungonline' => $pengunjungonline
  //     ];
  //     return $visitors;
  // }

  protected $table = 'visitors';

  function get_site_data_for_today()
  {
    $results = array();

    $query = $this->db->query('SELECT SUM(no_of_visits) as visits 
            FROM ' . $this->table . ' 
            WHERE CURDATE()=DATE(access_date)
            LIMIT 1');

    if ($query->resultID->num_rows == 1) {
      $row = $query->getRow();
      $results['visits'] = $row->visits;
    }

    return $results;
  }

  function get_site_data_for_last_week()
  {
    $results = array();

    $query = $this->db->query('SELECT SUM(no_of_visits) as visits
            FROM ' . $this->table . '
            WHERE DATE(access_date) >= CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY
            AND DATE(access_date) < CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY 
            LIMIT 1');

    if ($query->resultID->num_rows == 1) {
      $row = $query->getRow();
      $results['visits'] = $row->visits;

      return $results;
    }
  }

  function get_chart_data_for_today()
  {
    $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%h %p") AS hour
                FROM ' . $this->table . '
                WHERE CURDATE()=DATE(access_date)
                GROUP BY HOUR(access_date)');

    if ($query->resultID->num_rows > 0) {
      return $query->getResult();
    }

    return NULL;
  }

  function get_chart_data_for_month_year($month = 0, $year = 0)
  {
    if ($month == 0 && $year == 0) {
      $month = date('m');
      $year = date('Y');

      $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day 
                FROM ' . $this->table . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');

      if ($query->resultID->num_rows > 0) {
        return $query->getResult();
      }
    }

    if ($month == 0 && $year > 0) {
      $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(timestamp,"%M") AS day
                FROM ' . $this->table . '
                WHERE YEAR(access_date)=' . $year . '
                GROUP BY MONTH(access_date)');

      if ($query->resultID->num_rows > 0) {
        return $query->getResult();
      }
    }

    if ($year == 0 && $month > 0) {
      $year = date('Y');

      $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->table . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');

      if ($query->resultID->num_rows > 0) {
        return $query->getResult();
      }
    }

    if ($year > 0 && $month > 0) {
      $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->table . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');

      if ($query->resultID->num_rows > 0) {
        return $query->getResult();
      }
    }
    return NULL;
  }
}

<?php

namespace App\Controllers;

use App\Models\VisitorModel;

class VisitorController extends BaseController
{

  private $visitor_model;

  public function __construct()
  {
    helper(['visitor']);
    $this->visitor_model = new VisitorModel();
    $this->security = \Config\Services::security();
  }

  public function index()
  {
    $site_statics_today = $this->visitor_model->get_site_data_for_today();
    $site_statics_last_week = $this->visitor_model->get_site_data_for_last_week();
    $data['visits_today'] = isset($site_statics_today['visits']) ? $site_statics_today['visits'] : 0;
    $data['visits_last_week'] = isset($site_statics_last_week['visits']) ? $site_statics_last_week['visits'] : 0;
    $chart_data_today = $this->visitor_model->get_chart_data_for_today();
    $chart_data_curr_month = $this->visitor_model->get_chart_data_for_month_year();
    $data['chart_data_today'] = isset($chart_data_today) ? $chart_data_today : array();
    $data['statics_total'] = count($this->visitor_model->findAll());

    $sum = 0;
    foreach ($chart_data_curr_month as $x) {
      $sum += $x->visits;
    }
    $data['curr_month'] =  $sum;

    return view('visitor', $data);
  }

  function get_chart_data()
  {
    if (isset($_POST)) {
      if (isset($_POST['month']) && strlen($_POST['month']) && isset($_POST['year']) && strlen($_POST['year'])) {
        $month = $_POST['month'];
        $year = $_POST['year'];
        $data = $this->visitor_model->get_chart_data_for_month_year($month, $year);

        if ($data !== NULL) {
          foreach ($data as $value) {
            echo $value->day . "t" . $value->visits . "n";
          }
        } else {
          $timestamp = mktime(0, 0, 0, $month);
          $label = date("F", $timestamp);
          echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $label . '-' . $year . '"</div>';
        }
      } else if (isset($_POST['month']) && strlen($_POST['month'])) {
        $month = $_POST['month'];
        $data = $this->visitor_model->get_chart_data_for_month_year($month);

        if ($data !== NULL) {
          foreach ($data as $value) {
            echo $value->day . "t" . $value->visits . "n";
          }
        } else {
          $timestamp = mktime(0, 0, 0, $month);
          $label = date("F", $timestamp);
          echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $label . '"</div>';
        }
      } else if (isset($_POST['year']) && strlen($_POST['year'])) {
        $year = $_POST['year'];
        $data = $this->visitor_model->get_chart_data_for_month_year(0, $year);
        if ($data !== NULL) {
          foreach ($data as $value) {
            echo $value->day . "t" . $value->visits . "n";
          }
        } else {
          echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $year . '"</div>';
        }
      } else {
        $data = $this->visitor_model->get_chart_data_for_month_year();
        if ($data !== NULL) {
          foreach ($data as $value) {
            echo $value->day . "t" . $value->visits . "n";
          }
        } else {
          echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found!</div>';
        }
      }
    }
  }
}

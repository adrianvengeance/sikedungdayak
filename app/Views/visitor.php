<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodeIgniter 4 MySQL 8 Online Visitor Tracking System</title>
  <meta name="description" content="The small framework with powerful features">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script type='text/javascript' src="<?= base_url() ?>/assets/js/visitor/highcharts.js"></script>
  <script type='text/javascript' src="<?= base_url() ?>/assets/js/visitor/exporting.js"></script>
  <script type='text/javascript' src="<?= base_url() ?>/assets/js/visitor/jquery.tsv-0.96.min.js"></script>
</head>

<body>

  <div class="clear"></div>
  <div>
    <div style="font-size: 30px;font-weight: bold; color: #129FEA;">Visits statistics</div>
    <script type="text/javascript">
      $(function() {
        var chart;
        $(document).ready(function() {
          Highcharts.setOptions({
            colors: ['#32353A']
          });
          chart = new Highcharts.Chart({
            chart: {
              renderTo: 'container',
              type: 'column',
              margin: [50, 30, 80, 60]
            },
            title: {
              text: "Visits Today: <?php echo date('d-m-Y'); ?>"
            },
            xAxis: {
              categories: [
                <?php
                $i = 1;
                $count = count($chart_data_today);
                foreach ($chart_data_today as $data) {
                  if ($i == $count) {
                    echo "'" . $data->hour . "'";
                  } else {
                    echo "'" . $data->hour . "',";
                  }
                  $i++;
                }
                ?>
              ],
              labels: {
                rotation: -45,
                align: 'right',
                style: {
                  fontSize: '9px',
                  fontFamily: 'Tahoma, Verdana, sans-serif'
                }
              }
            },
            yAxis: {
              min: 0,
              title: {
                text: 'Visits'
              }
            },
            legend: {
              enabled: false
            },
            tooltip: {
              formatter: function() {
                return '<b>' + this.x + '</b><br/>' +
                  'Visits: ' + Highcharts.numberFormat(this.y, 0);
              }
            },
            exporting: {
              enabled: false
            },
            series: [{
              name: 'Visits',
              data: [
                <?php
                $i = 1;
                $count = count($chart_data_today);
                foreach ($chart_data_today as $data) {
                  if ($i == $count) {
                    echo $data->visits;
                  } else {
                    echo $data->visits . ",";
                  }
                  $i++;
                }
                ?>
              ],
              dataLabels: {
                enabled: false,
                rotation: 0,
                color: '#F07E01',
                align: 'right',
                x: -3,
                y: 20,
                formatter: function() {
                  return this.y;
                },
                style: {
                  fontSize: '11px',
                  fontFamily: 'Verdana, sans-serif'
                }
              },
              pointWidth: 20
            }]
          });
        });
      });
    </script>
    <div id="container" style="min-width: 300px; height: 180px; margin: 0 auto"></div>
  </div>
  <div class="clear"> </div>
  <div>
    <div>
      <div style="margin-bottom: 10px;">
        <!-- <h4>Today</h4>  -->
        <span><strong>Today:</strong></span>
        <?php echo $visits_today; ?> Visits
      </div>
      <div style="margin-bottom: 10px;">
        <!-- <h4>Last week</h4> -->
        <span><strong>Last week:</strong></span>
        <?php echo $visits_last_week; ?> Visits
      </div>
      <div style="margin-bottom: 10px;">
        <!-- <h4>Last week</h4> -->
        <span><strong>This month:</strong></span>
        <?php echo $curr_month; ?> Visits
      </div>
      <div style="margin-bottom: 10px;">
        <!-- <h4>Last week</h4> -->
        <span><strong>Total:</strong></span>
        <?php echo $statics_total; ?> Visits
      </div>
    </div>
  </div>

</body>

</html>
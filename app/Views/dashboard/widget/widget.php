<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div class="card mb-4">
      <div class="card-header row mx-1">
        <div class="col-md-6">
          <button class="btn disabled ps-0">
            <h5><i class="fas fa-thumbtack"></i><span class="ms-2">Widget</span></h5>
          </button>
        </div>
      </div>
      <div class="card-body container">
        <div class="row d-flex">
          <?php if (session()->getFlashdata('widget')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong><?= 'Success!' ?></strong> <?= session()->getFlashdata('widget'); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6">
                <button class="btn disabled ps-0">
                  <h6><i class="fas fa-bullhorn"></i><span class="ms-2">Pengunguman</span></h6>
                </button>
              </div>
              <div class="col-md-6">
                <div class="d-md-none">
                  <div class="text-center row px-3">
                    <a class="btn btn-primary text-white btn-sm" href="/home/widget/pengunguman" style="width: 50px;"><i class="fas fa-plus"></i></a>
                  </div>
                </div>
                <div class="d-none d-md-block">
                  <div class="float-end mt-2">
                    <a class="btn btn-primary text-white btn-sm" href="/home/widget/pengunguman" style="width: 50px;"><i class="fas fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <table id="info" class="compact">
              <thead>
                <tr>
                  <th style="width: 1%;">No</th>
                  <th style="width: 9%;">Action</th>
                  <th style="width: 50%;">Isi</th>
                  <th style="width: 40%;">Waktu</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($pengunguman)) : ?>
                  <?php foreach ($pengunguman as $n => $value) : ?>
                    <tr>
                      <th class="align-middle text-center" scope="row"><?= $n + 1; ?></th>
                      <td class="align-middle">
                        <a class="btn btn-sm" href="/home/widget/pengunguman/<?= $value['id'] ?>" style="display: block; margin: auto;"><i class="fas fa-edit"></i></a>
                      </td>
                      <td class="align-middle"><?= $value['isi']; ?></td>
                      <td class="align-middle"><?= $value['waktu']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div class="col-md-4">
            <div class="row">
              <div class="col-md-6">
                <button class="btn disabled ps-0">
                  <h6><i class="fab fa-youtube"></i><span class="ms-2">Link Video</span></h6>
                </button>
              </div>
              <?php if (empty($videoyt)) : ?>
                <div class="col-md-6">
                  <div class="d-md-none">
                    <div class="text-center row px-3">
                      <a class="btn btn-primary text-white btn-sm" href="/home/widget/videoyt" style="width: 50px;"><i class="fas fa-plus"></i></a>
                    </div>
                  </div>
                  <div class="d-none d-md-block">
                    <div class="float-end mt-2">
                      <a class="btn btn-primary text-white btn-sm" href="/home/widget/videoyt" style="width: 50px;"><i class="fas fa-plus"></i></a>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <table id="widget" class="compact">
              <thead>
                <tr>
                  <th style="width: 10%;">Action</th>
                  <th style="width: 90%;">Link</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($videoyt)) : ?>
                  <?php foreach ($videoyt as $n => $value) : ?>
                    <tr>
                      <td class="align-middle">
                        <a class="btn btn-sm" href="/home/widget/videoyt/<?= $value['id'] ?>" style="display: block; margin: auto;"><i class="fas fa-edit"></i></a>
                      </td>
                      <td class="align-middle">
                        <div class="videoyt-box"><?= $value['link']; ?></div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <button class="btn disabled ps-0">
                  <h6><i class="fas fa-comment-dots"></i><span class="ms-2">Kritik dan Saran</span></h6>
                </button>
              </div>
            </div>
            <table id="kritiksaran" class="compact">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK/Nama</th>
                  <th>Isi</th>
                  <th>Waktu</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($kritiksaran)) : ?>
                  <?php foreach ($kritiksaran as $n => $ks) : ?>
                    <tr>
                      <th class="align-middle text-center" scope="row"><?= $n + 1; ?></th>
                      <td class="align-middle"><?= $ks['niknama']; ?></td>
                      <td class="align-middle"><?= $ks['isi']; ?></td>
                      <td class="align-middle"><?= date("Y:m:d", strtotime($ks['created_at'])); ?></td>
                      <td class="align-middle">
                        <a class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#ksModal" data-id="<?= $ks['id']; ?>" data-nama="<?= $ks['niknama'] ?>" id="ksDeleteBtn" style="display: block; margin: auto;"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <button class="btn disabled ps-0">
                  <h6><i class="fas fa-chart-bar"></i><span class="ms-2">Statistik Pengunjung</span></h6>
                </button>
              </div>
            </div>
            <div>
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
                        // margin: [50, 30, 10, 60],
                        spacingBottom: 5,
                        // marginBottom: 10,
                      },
                      title: {
                        text: "Visits Today: <?php echo date('d-m-Y'); ?>",
                        style: {
                          fontSize: '12px'
                        }
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
                      credits: {
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
              <dl class="row gy-0">
                <dt class="col-6">Today</dt>
                <dd class="col-6 text-end"><?= $visits_today; ?> Visits</dd>

                <dt class="col-6">Last week</dt>
                <dd class="col-6 text-end"><?php echo $visits_last_week; ?> Visits</dd>

                <dt class="col-6">This month</dt>
                <dd class="col-6 text-end"><?php echo $curr_month; ?> Visits</dd>

                <dt class="col-6">Total</dt>
                <dd class="col-6 text-end"><?php echo $statics_total; ?> Visits</dd>
              </dl>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</main>

<!-- The Modal -->
<div class="modal fade" id="ksModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure want to delete?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Select "Delete" below if you are sure to delete critic dan suggestion from
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
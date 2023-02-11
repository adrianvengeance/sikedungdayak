<?= $this->extend('layout/index'); ?>

<?= $this->section('leftcontent'); ?>
<div class="col-lg-8">
  <article>
    <div class="row mx-0 mb-3 gy-1">
      <div class="col-sm-3 px-1">
        <div class="card bg-success text-light">
          <div class="card-body p-2">
            <h5 class="card-title"><?= $semuaorang; ?><span class="float-end"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                </svg></span></h5>
            <p class="card-text mb-0 pb-0">Penduduk</p>
            <p class="card-text mt-0 pt-0"><small style="font-size: 10px;">Total Laki-laki dan Perempuan</small></p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 px-1">
        <div class="card text-light" style="background-color: #36A2EB;">
          <div class="card-body p-2">
            <h5 class="card-title"><?= $semuapria; ?><span class="float-end"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                </svg></span></h5>
            <p class="card-text mb-0 pb-0">Laki-laki</p>
            <p class="card-text mt-0 pt-0"><small style="font-size: 10px;">Jumlah Penduduk Laki-laki</small></p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 px-1">
        <div class="card text-light" style="background-color: #FF1A68;">
          <div class="card-body p-2">
            <h5 class="card-title"><?= $semuawanita; ?><span class="float-end"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                </svg></span></h5>
            <p class="card-text mb-0 pb-0">Perempuan</p>
            <p class="card-text mt-0 pt-0"><small style="font-size: 10px;">Jumlah Penduduk Perempuan</small></p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 px-1">
        <div class="card text-light" style="background-color: #6f4e37;">
          <div class="card-body p-2">
            <h5 class="card-title">4<span class="float-end"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg></span><a class="stretched-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
            </h5>
            <p class="card-text mb-0 pb-0">RT</p>
            <p class="card-text mt-0 pt-0"><small style="font-size: 10px;">Jumlah RT di Kedung Dayak</small></p>
          </div>
        </div>
      </div>

      <!-- collapse -->
      <div class="collapse" id="collapseExample">
        <div class="row mt-1 mb-2" style="height: 1px; background-color: #6F4E37;"></div>
        <div class="row gy-1">
          <div class="btn-group" id="rt1234" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="rt1" autocomplete="off" onclick="showChart('rt1')">
            <label class="btn btn-outline-secondary" for="rt1">RT 1</label>

            <input type="checkbox" class="btn-check" id="rt2" autocomplete="off" onclick="showChart('rt2')">
            <label class="btn btn-outline-secondary" for="rt2">RT 2</label>

            <input type="checkbox" class="btn-check" id="rt3" autocomplete="off" onclick="showChart('rt3')">
            <label class="btn btn-outline-secondary" for="rt3">RT 3</label>

            <input type="checkbox" class="btn-check" id="rt4" autocomplete="off" onclick="showChart('rt4')">
            <label class="btn btn-outline-secondary" for="rt4">RT 4</label>
          </div>
        </div>
      </div>
    </div>

    <div id="allchart">
      <div id="chartrumahdata">
        <div class="my-2">
          <canvas id="umurchart" class="px-2 py-1" height="370px"></canvas>
        </div>
        <div class="my-2 mt-3">
          <table class="table table-striped table-bordered" id="bayitable">
            <thead class="text-center">
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Laki-laki</th>
                <th>Perempuan</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr class="table-warning">
                <td>1</td>
                <td>Bayi Dua Tahun</td>
                <td><?= $badutam ?></td>
                <td><?= $badutaf ?></td>
                <td><?= $badutam+$badutaf ?></td>
              </tr>
              <tr class="table-success">
                <td>2</td>
                <td>Bayi Tiga Tahun</td>
                <td><?= $batitam ?></td>
                <td><?= $batitaf ?></td>
                <td><?= $batitam+$batitaf ?></td>
              </tr>
              <tr class="table-danger">
                <td>3</td>
                <td>Bayi Lima Tahun</td>
                <td><?= $balitam ?></td>
                <td><?= $balitaf ?></td>
                <td><?= $balitam+$balitaf ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="my-2 mt-3">
          <canvas id="pendidikanchart" class="px-2 py-1" height="370px"></canvas>
        </div>
        <div class="my-2 mt-3">
          <canvas id="pekerjaanchart" class="px-2 py-1" height="370px"></canvas>
        </div>
        <div class="my-2 mt-3 mb-3">
          <canvas id="kkchart" class="px-2 py-1" height="370px"></canvas>
        </div>
      </div>

      <div id="chartperrt">
        <div class="my-2" id="rt1divkk">
          <canvas id="kkrt1chart" class="px-2 py-1" height="370px"></canvas>
        </div>
        <div class="my-2 mt-3" id="rt1divjj">
          <canvas id="jjrt1chart" class="px-2 py-1" height="370px"></canvas>
        </div>

        <div class="my-2" id="rt2divkk">
          <canvas id="kkrt2chart" class="px-2 py-1" height="370px"></canvas>
        </div>
        <div class="my-2 mt-3" id="rt2divjj">
          <canvas id="jjrt2chart" class="px-2 py-1" height="370px"></canvas>
        </div>

        <div class="my-2" id="rt3divkk">
          <canvas id="kkrt3chart" class="px-2 py-1" height="370px"></canvas>
        </div>
        <div class="my-2 mt-3" id="rt3divjj">
          <canvas id="jjrt3chart" class="px-2 py-1" height="370px"></canvas>
        </div>

        <div class="my-2" id="rt4divkk">
          <canvas id="kkrt4chart" class="px-2 py-1" height="370px"></canvas>
        </div>
        <div class="my-2 mt-3" id="rt4divjj">
          <canvas id="jjrt4chart" class="px-2 py-1" height="370px"></canvas>
        </div>
      </div>
    </div>

  </article>
</div>

<script></script>

<?= $this->endSection(); ?>
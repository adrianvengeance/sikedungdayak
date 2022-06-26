<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-4">
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Tambah Penduduk</h3>
                  </div>
                  <div class="card-body">
                    <?php if ($validation->getErrors()) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= 'Error!' ?></strong> <?= 'Silakan masukan kembali input yang sesuai.'; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif ?>
                    <form method="post" action="/home/penduduk/tambahprocess">
                      <?= csrf_field(); ?>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?= $validation->hasError('namaagt') ? 'is-invalid' : ''; ?>" name="namaagt" id="exampleInputEmail1" value="<?= old('namaagt'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('namaagt'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nomor Induk Kependudukan</label>
                        <input type="text" class="form-control <?= $validation->hasError('nik') ? 'is-invalid' : ''; ?>" name="nik" id="exampleInputPassword1" value="<?= old('nik'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('nik'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="inputkk" class="form-label">Kartu Keluarga</label>
                        <input type="text" class="form-control <?= $validation->hasError('numkk') ? 'is-invalid' : ''; ?>" name="numkk" id="inputkk" value="<?= ($numkk) ? $numkk : old('numkk') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('numkk'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="inputjk" class="form-label">Jenis Kelamin</label>
                        <select class="form-control form-select <?= $validation->hasError('jeniskel') ? 'is-invalid' : ''; ?>" name="jeniskel" id="inputjk">
                          <option value="" <?= (old('jeniskel') == null) ? 'selected' : ''; ?>>Pilih Jenis Kelamin...</option>
                          <option value="LAKI-LAKI" <?= (old('jeniskel') == 'LAKI-LAKI') ? 'selected' : ''; ?>>LAKI-LAKI</option>
                          <option value="PEREMPUAN" <?= (old('jeniskel') == 'PEREMPUAN') ? 'selected' : ''; ?>>PEREMPUAN</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('jeniskel'); ?></div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label for="inputtmptlhit" class="form-label">Tempat Lahir</label>
                          <input list="datalistplace" class="form-control <?= $validation->hasError('tmplahir') ? 'is-invalid' : ''; ?>" name="tmplahir" id="inputtmptlhit" value="<?= old('tmplahir') ?>">
                          <datalist id="datalistplace">
                            <?php foreach ($birthplace as $b => $n) : ?>
                              <option value="<?= $n; ?>">
                              <?php endforeach; ?>
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('tmplahir'); ?></div>
                        </div>
                        <div class="col-sm-6">
                          <label for="inputtgllhair" class="form-label">Tanggal Lahir</label>
                          <input type="date" class="form-control <?= $validation->hasError('tgllahir') ? 'is-invalid' : ''; ?>" name="tgllahir" id="inputtgllhair" value="<?= old('tgllahir') ?>">
                          <div class="invalid-feedback"><?= $validation->getError('tgllahir'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label class="form-label" for="inptagmaa">Agama</label>
                          <select class="form-control form-select <?= $validation->hasError('agama') ? 'is-invalid' : ''; ?>" name="agama" id="inptagmaa">
                            <option value="" <?= (old('agama') == null) ? 'selected' : ''; ?>>Pilih Agama...</option>
                            <option value="ISLAM" <?= (old('agama') == 'ISLAM') ? 'selected' : ''; ?>>ISLAM</option>
                            <option value="PROTESTAN" <?= (old('agama') == 'PROTESTAN') ? 'selected' : ''; ?>>PROTESTAN</option>
                            <option value="KATOLIK" <?= (old('agama') == 'KATOLIK') ? 'selected' : ''; ?>>KATOLIK</option>
                            <option value="HINDU" <?= (old('agama') == 'HINDU') ? 'selected' : ''; ?>>HINDU</option>
                            <option value="BUDDHA" <?= (old('agama') == 'BUDDHA') ? 'selected' : ''; ?>>BUDDHA</option>
                          </select>
                          <div class="invalid-feedback"><?= $validation->getError('agama'); ?></div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="inptgoldar">Golongan Darah</label>
                          <select class="form-control form-select <?= $validation->hasError('goldar') ? 'is-invalid' : ''; ?>" name="goldar" id="inptgoldar">
                            <option value="" <?= (old('goldar') == null) ? 'selected' : ''; ?>>Pilih Golongan Darah...</option>
                            <option value="-" <?= (old('goldar') == '-') ? 'selected' : ''; ?>>-</option>
                            <option value="A" <?= (old('goldar') == 'A') ? 'selected' : ''; ?>>A</option>
                            <option value="B" <?= (old('goldar') == 'B') ? 'selected' : ''; ?>>B</option>
                            <option value="O" <?= (old('goldar') == 'O') ? 'selected' : ''; ?>>O</option>
                            <option value="AB" <?= (old('goldar') == 'AB') ? 'selected' : ''; ?>>AB</option>
                          </select>
                          <div class="invalid-feedback"><?= $validation->getError('goldar'); ?></div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="inputstatus" class="form-label">Status Diri</label>
                        <select class="form-control form-select <?= $validation->hasError('statusdiri') ? 'is-invalid' : ''; ?>" name="statusdiri" id="inputstatus">
                          <option value="" <?= (old('statusdiri') == null) ? 'selected' : ''; ?>>Pilih Status Diri...</option>
                          <option value="BELUM KAWIN" <?= (old('statusdiri') == 'BELUM KAWIN') ? 'selected' : ''; ?>>BELUM KAWIN</option>
                          <option value="SUDAH KAWIN" <?= (old('statusdiri') == 'SUDAH KAWIN') ? 'selected' : ''; ?>>SUDAH KAWIN</option>
                          <option value="CERAI HIDUP" <?= (old('statusdiri') == 'CERAI HIDUP') ? 'selected' : ''; ?>>CERAI HIDUP</option>
                          <option value="CERAI MATI" <?= (old('statusdiri') == 'CERAI MATI') ? 'selected' : ''; ?>>CERAI MATI</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('statusdiri'); ?></div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label class="form-label" for="inputkelrg">Keluarga</label>
                          <input class="form-control <?= $validation->hasError('keluarga') ? 'is-invalid' : ''; ?>" type="text" name="keluarga" id="inputkelrg" value="-">
                          <div class="invalid-feedback"><?= $validation->getError('keluarga'); ?></div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="inputstatus">Status Warga</label>
                          <input class="form-control <?= $validation->hasError('statuswarga') ? 'is-invalid' : ''; ?>" list="datalistopt" name="statuswarga" id="inputstatus" value="<?= old('statuswarga') ?>">
                          <datalist id="datalistopt">
                            <option value="TETAP">TETAP</option>
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('statuswarga'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label class="form-label" for="inputpnddkn">Pendidikan</label>
                          <input class="form-control <?= $validation->hasError('pendidikan') ? 'is-invalid' : ''; ?>" list="datalistpnddkn" name="pendidikan" id="inputpnddkn" value="<?= old('pendidikan') ?>">
                          <datalist id="datalistpnddkn">
                            <option value="Tidak Sekolah">
                            <option value="Belum Sekolah">
                            <option value="Belum Tamat SD">
                            <option value="SD / Sederajat">
                            <option value="SMP / Sederajat">
                            <option value="SMA / Sederajat">
                            <option value="D1">
                            <option value="D2">
                            <option value="D3">
                            <option value="D4">
                            <option value="S1">
                            <option value="S2">
                            <option value="S3">
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('pendidikan'); ?></div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="inputjob">Pekerjaan</label>
                          <input class="form-control <?= $validation->hasError('pekerjaan') ? 'is-invalid' : ''; ?>" list="datalistjob" name="pekerjaan" id="inputjob" value="<?= old('pekerjaan') ?>">
                          <datalist id="datalistjob">
                            <?php foreach ($jobs as $job => $x) : ?>
                              <option value="<?= $x->pekerjaan ?>"></option>
                            <?php endforeach; ?>
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('pekerjaan'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label class="form-label" for="inputayah">Ayah</label>
                          <input type="text" class="form-control <?= $validation->hasError('ayah') ? 'is-invalid' : ''; ?>" name="ayah" id="inputayah" value="<?= old('ayah'); ?>">
                          <div class="invalid-feedback"><?= $validation->getError('ayah'); ?></div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="inputibu">Ibu</label>
                          <input type="text" class="form-control <?= $validation->hasError('ibu') ? 'is-invalid' : ''; ?>" name="ibu" id="inputibu" value="<?= old('ibu'); ?>">
                          <div class="invalid-feedback"><?= $validation->getError('ibu'); ?></div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="INPUThubkel">Hubungan Keluarga</label>
                        <input list="datalisthubkel" class="form-control <?= $validation->hasError('hubungkel') ? 'is-invalid' : ''; ?>" name="hubungkel" id="INPUThubkel" value="<?= old('hubungkel') ?>">
                        <datalist id="datalisthubkel">
                          <option value="ANAK">
                          <option value="CUCU">
                          <option value="Famili Lain">
                          <option value="ISTRI">
                          <option value="KEPALA KELUARGA">
                          <option value="MERTUA">
                          <option value="ORANG TUA">
                          <option value="Orang Tua (Ayah)">
                          <option value="Orang Tua (Ibu)">
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('hubungkel'); ?></div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label class="form-label" for="inputalamatasal">Alamat Asal</label>
                          <input type="text" class="form-control <?= $validation->hasError('alamatasal') ? 'is-invalid' : ''; ?>" name="alamatasal" id="inputalamatasal" value="-">
                          <div class="invalid-feedback"><?= $validation->getError('alamatasal'); ?></div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="inputalamatdesa">Alamat Desa</label>
                          <input list="dldesa" class="form-control <?= $validation->hasError('alamatdesa') ? 'is-invalid' : ''; ?>" name="alamatdesa" id="inputalamatdesa" value="<?= old('alamatdesa') ?>">
                          <datalist id="dldesa">
                            <option value="KEDUNG DAYAK"></option>
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('alamatdesa'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label class="form-label" for="inputrt">RT</label>
                          <input list="dlrt" class="form-control <?= $validation->hasError('rt') ? 'is-invalid' : ''; ?>" name="rt" id="inputrt" value="<?= old('rt') ?>">
                          <datalist id="dlrt">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            <option value="4">
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('rt'); ?></div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="inptrw">RW</label>
                          <input list="dlrw" class="form-control <?= $validation->hasError('rw') ? 'is-invalid' : ''; ?>" name="rw" id="inptrw" value="<?= old('rw') ?>">
                          <datalist id="dlrw">
                            <option value="0">
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('rw'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label class="form-label" for="inputkel">Kelurahan</label>
                          <input list="dlkel" class="form-control <?= $validation->hasError('kelurahan') ? 'is-invalid' : ''; ?>" name="kelurahan" id="inputkel" value="<?= old('kelurahan'); ?>">
                          <datalist id="dlkel">
                            <option value="Jatimulyo">
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('kelurahan'); ?></div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="inputkec">Kecamatan</label>
                          <input list="dlkec" class="form-control <?= $validation->hasError('kecamatan') ? 'is-invalid' : ''; ?>" name="kecamatan" id="inputkec" value="<?= old('kecamatan'); ?>">
                          <datalist id="dlkec">
                            <option value="Dlingo">
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('kecamatan'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-4">
                          <label class="form-label" for="inputkota">Kota</label>
                          <input list="dlkota" class="form-control <?= $validation->hasError('kota') ? 'is-invalid' : ''; ?>" name="kota" id="inputkota" value="<?= old('kota'); ?>">
                          <datalist id="dlkota">
                            <option value="Bantul">
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('kota'); ?></div>
                        </div>
                        <div class="col-sm-4">
                          <label class="form-label" for="inputprov">Provinsi</label>
                          <input list="dlprov" class="form-control <?= $validation->hasError('provinsi') ? 'is-invalid' : ''; ?>" name="provinsi" id="inputprov" value="<?= old('provinsi'); ?>">
                          <datalist id="dlprov">
                            <option value="D.I.Yogyakarta">
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('provinsi'); ?></div>
                        </div>
                        <div class="col-sm-4">
                          <label class="form-label" for="inputkodepos">Kode Pos</label>
                          <input list="dlkodepos" class="form-control <?= $validation->hasError('kodepos') ? 'is-invalid' : ''; ?>" name="kodepos" id="inputkodepos" value="<?= old('kodepos'); ?>">
                          <datalist id="dlkodepos">
                            <option value="55783">
                          </datalist>
                          <div class="invalid-feedback"><?= $validation->getError('kodepos'); ?></div>
                        </div>
                      </div>
                      <div class="row mt-4">
                        <button type="submit" class="btn btn-primary text-center mx-auto col-4">Tambah</button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small">
                      <?php if ($numkk) : ?>
                        <a href="/home/info/edit/<?= $numkk ?>">Cancel</a>
                      <?php else : ?>
                        <a href="/home/penduduk">Cancel</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection(); ?>
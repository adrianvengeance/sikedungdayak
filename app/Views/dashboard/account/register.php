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
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                  </div>
                  <div class="card-body">
                    <?php if ($validation->getErrors()) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= 'Error!' ?></strong> <?= 'Silakan masukan kembali input yang sesuai.'; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif ?>
                    <form action="/home/registerprocess" method="post">
                      <?= csrf_field(); ?>
                      <div class="mb-3">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input list="datalistusername" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="inputUsername" name="username" value="<?= old('username') ?>" placeholder="Type username.." autofocus>
                        <datalist id="datalistusername">
                          <?php foreach ($nik as $x => $hasil) : ?>
                            <option value="<?= $hasil['nik']; ?>"></option>
                          <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                      </div>
                      <div class=" mb-3">
                        <label for="inputEmail" class="form-label ">Name</label>
                        <input class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="inputName" type="text" name="name" value="<?= old('name') ?>" placeholder="Will be filled after username filled with NIK correctly" />
                        <div class="invalid-feedback"><?= $validation->getError('name'); ?></div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <div class=" mb-3 mb-md-0">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="inputPassword" type="password" name="password1" placeholder="Create a password" />
                            <div class="invalid-feedback"><?= $validation->getError('password1'); ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class=" mb-3 mb-md-0">
                            <label for="inputPasswordConfirm" class="form-label">Confirm Password</label>
                            <input class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="inputPasswordConfirm" type="password" name="password2" placeholder="Confirm your password" />
                            <div class="invalid-feedback"><?= $validation->getError('password2'); ?></div>
                          </div>
                        </div>
                      </div>

                      <label for="levelInput" class="form-label">User Level</label>
                      <div class="form-control <?= $validation->hasError('level') ? 'is-invalid' : '' ?>">
                        <div class="row" id="levelInput">
                          <div class="col-md-6">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="level" id="flexRadioDefault1" value="Super Admin">
                              <label class="form-check-label" for="flexRadioDefault1">
                                Super Admin
                              </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="level" id="flexRadioDefault2" value="Admin">
                              <label class="form-check-label" for="flexRadioDefault2">
                                Admin
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="invalid-feedback"><?= $validation->getError('level'); ?></div>
                      <div class="mt-4 mb-0">
                        <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" name="submit">Create Account</button></div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small"><a href="/home">Cancel</a></div>
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
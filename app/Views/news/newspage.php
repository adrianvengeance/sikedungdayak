<?= $this->extend('layout/index'); ?>

<?= $this->section('leftcontent'); ?>

<div class="col-lg-8">
  <!-- Post content-->
  <article>
    <!-- Post header-->
    <header class="mb-2">
      <!-- Post title-->
      <h1 class="fw-bolder mb-1"><?= $berita['title']; ?></h1>
      <!-- Post meta content-->
      <?php $tanggal = (date("Y-m-j", strtotime($berita['updated_at']))); ?>
      <div class="text-muted fst-italic">
        <?= ($days[date("w", strtotime($tanggal))]) . date(', d ', strtotime($berita['updated_at'])) . ($months[date("n", strtotime($tanggal))]) . date(' Y', strtotime($berita['updated_at'])) . ' by ' . $berita['author']; ?>
      </div>
    </header>
    <!-- Preview image figure-->
    <figure class="mb-4"><img class="img-fluid rounded w-100" src="<?= base_url('/kontenberita/' . $berita['groupmonth'] . '/' . $berita['author'] . '/' . $berita['image']); ?>" alt="<?= $berita['image']; ?>" /></figure>
    <!-- Post content-->
    <section class="mb-1"><?= $berita['body']; ?></section>


    <div class="row mx-0 my-2">
      <!-- kembali -->
      <div class="col-md-6 ps-0">
        <a class="btn btn-outline-success mt-2" href="/berita" id="kembaliBerita"><i class="bi bi-arrow-left"></i> Berita lainnya</a>
      </div>

      <!-- share button -->
      <div class="col-md-6 px-0 mt-0" id="shareBlocks">
        <!-- mobile -->
        <div class="d-md-none">
          <div class="smbrng mt-1" id="shareButtons">
            <p class="h6 text-muted" style="display: inline-block;">Bagikan</p>

            <!-- Sharingbutton -->
            <a class="resp-sharing-button__link liveToastBtnMobile" role="button" id="liveToastBtn" onmousedown="showToast()">
              <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                  <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-link-45deg" viewBox="0 0 16 16">
                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                  </svg>
                </div>
              </div>
            </a>
            <!-- Sharingbutton Facebook -->
            <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?= base_url('/berita/' . date('Y-m', strtotime($berita['created_at']))) . '/' . $berita['slug']; ?>" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm3.6 11.5h-2.1v7h-3v-7h-2v-2h2V8.34c0-1.1.35-2.82 2.65-2.82h2.35v2.3h-1.4c-.25 0-.6.13-.6.66V9.5h2.34l-.24 2z" />
                  </svg>
                </div>
              </div>
            </a>
            <!-- Sharingbutton Twitter -->
            <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=<?= $berita['title'] ?>&amp;url=<?= base_url('/berita/' . date('Y-m', strtotime($berita['created_at']))) . '/' . $berita['slug']; ?>" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm5.26 9.38v.34c0 3.48-2.64 7.5-7.48 7.5-1.48 0-2.87-.44-4.03-1.2 1.37.17 2.77-.2 3.9-1.08-1.16-.02-2.13-.78-2.46-1.83.38.1.8.07 1.17-.03-1.2-.24-2.1-1.3-2.1-2.58v-.05c.35.2.75.32 1.18.33-.7-.47-1.17-1.28-1.17-2.2 0-.47.13-.92.36-1.3C7.94 8.85 9.88 9.9 12.06 10c-.04-.2-.06-.4-.06-.6 0-1.46 1.18-2.63 2.63-2.63.76 0 1.44.3 1.92.82.6-.12 1.95-.27 1.95-.27-.35.53-.72 1.66-1.24 2.04z" />
                  </svg>
                </div>
              </div>
            </a>
            <!-- Sharingbutton WhatsApp -->
            <a class="resp-sharing-button__link" href="whatsapp://send?text=<?= $berita['title'] ?>%20<?= base_url('/berita/' . date('Y-m', strtotime($berita['created_at']))) . '/' . $berita['slug']; ?>" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24">
                    <path d="m12 0c-6.6 0-12 5.4-12 12s5.4 12 12 12 12-5.4 12-12-5.4-12-12-12zm0 3.8c2.2 0 4.2 0.9 5.7 2.4 1.6 1.5 2.4 3.6 2.5 5.7 0 4.5-3.6 8.1-8.1 8.1-1.4 0-2.7-0.4-3.9-1l-4.4 1.1 1.2-4.2c-0.8-1.2-1.1-2.6-1.1-4 0-4.5 3.6-8.1 8.1-8.1zm0.1 1.5c-3.7 0-6.7 3-6.7 6.7 0 1.3 0.3 2.5 1 3.6l0.1 0.3-0.7 2.4 2.5-0.7 0.3 0.099c1 0.7 2.2 1 3.4 1 3.7 0 6.8-3 6.9-6.6 0-1.8-0.7-3.5-2-4.8s-3-2-4.8-2zm-3 2.9h0.4c0.2 0 0.4-0.099 0.5 0.3s0.5 1.5 0.6 1.7 0.1 0.2 0 0.3-0.1 0.2-0.2 0.3l-0.3 0.3c-0.1 0.1-0.2 0.2-0.1 0.4 0.2 0.2 0.6 0.9 1.2 1.4 0.7 0.7 1.4 0.9 1.6 1 0.2 0 0.3 0.001 0.4-0.099s0.5-0.6 0.6-0.8c0.2-0.2 0.3-0.2 0.5-0.1l1.4 0.7c0.2 0.1 0.3 0.2 0.5 0.3 0 0.1 0.1 0.5-0.099 1s-1 0.9-1.4 1c-0.3 0-0.8 0.001-1.3-0.099-0.3-0.1-0.7-0.2-1.2-0.4-2.1-0.9-3.4-3-3.5-3.1s-0.8-1.1-0.8-2.1c0-1 0.5-1.5 0.7-1.7s0.4-0.3 0.5-0.3z" />
                  </svg>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- desktop -->
        <div class="d-none d-md-block">
          <div class="smbrng float-end" id="shareButtons">
            <p class="h6 text-muted" style="display: inline-block;">Bagikan</p>

            <!-- Sharingbutton -->
            <a class="resp-sharing-button__link" role="button" id="liveToastBtn" onmousedown="showToast()">
              <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                  <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-link-45deg" viewBox="0 0 16 16">
                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                  </svg>
                </div>
              </div>
            </a>
            <!-- Sharingbutton Facebook -->
            <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?= base_url('/berita/' . date('Y-m', strtotime($berita['created_at']))) . '/' . $berita['slug']; ?>" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm3.6 11.5h-2.1v7h-3v-7h-2v-2h2V8.34c0-1.1.35-2.82 2.65-2.82h2.35v2.3h-1.4c-.25 0-.6.13-.6.66V9.5h2.34l-.24 2z" />
                  </svg>
                </div>
              </div>
            </a>
            <!-- Sharingbutton Twitter -->
            <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=<?= $berita['title'] ?>&amp;url=<?= base_url('/berita/' . date('Y-m', strtotime($berita['created_at']))) . '/' . $berita['slug']; ?>" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm5.26 9.38v.34c0 3.48-2.64 7.5-7.48 7.5-1.48 0-2.87-.44-4.03-1.2 1.37.17 2.77-.2 3.9-1.08-1.16-.02-2.13-.78-2.46-1.83.38.1.8.07 1.17-.03-1.2-.24-2.1-1.3-2.1-2.58v-.05c.35.2.75.32 1.18.33-.7-.47-1.17-1.28-1.17-2.2 0-.47.13-.92.36-1.3C7.94 8.85 9.88 9.9 12.06 10c-.04-.2-.06-.4-.06-.6 0-1.46 1.18-2.63 2.63-2.63.76 0 1.44.3 1.92.82.6-.12 1.95-.27 1.95-.27-.35.53-.72 1.66-1.24 2.04z" />
                  </svg>
                </div>
              </div>
            </a>
            <!-- Sharingbutton WhatsApp -->
            <a class="resp-sharing-button__link" href="whatsapp://send?text=<?= $berita['title'] ?>%20<?= base_url('/berita/' . date('Y-m', strtotime($berita['created_at']))) . '/' . $berita['slug']; ?>" target="_blank" rel="noopener" aria-label="">
              <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small">
                <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24">
                    <path d="m12 0c-6.6 0-12 5.4-12 12s5.4 12 12 12 12-5.4 12-12-5.4-12-12-12zm0 3.8c2.2 0 4.2 0.9 5.7 2.4 1.6 1.5 2.4 3.6 2.5 5.7 0 4.5-3.6 8.1-8.1 8.1-1.4 0-2.7-0.4-3.9-1l-4.4 1.1 1.2-4.2c-0.8-1.2-1.1-2.6-1.1-4 0-4.5 3.6-8.1 8.1-8.1zm0.1 1.5c-3.7 0-6.7 3-6.7 6.7 0 1.3 0.3 2.5 1 3.6l0.1 0.3-0.7 2.4 2.5-0.7 0.3 0.099c1 0.7 2.2 1 3.4 1 3.7 0 6.8-3 6.9-6.6 0-1.8-0.7-3.5-2-4.8s-3-2-4.8-2zm-3 2.9h0.4c0.2 0 0.4-0.099 0.5 0.3s0.5 1.5 0.6 1.7 0.1 0.2 0 0.3-0.1 0.2-0.2 0.3l-0.3 0.3c-0.1 0.1-0.2 0.2-0.1 0.4 0.2 0.2 0.6 0.9 1.2 1.4 0.7 0.7 1.4 0.9 1.6 1 0.2 0 0.3 0.001 0.4-0.099s0.5-0.6 0.6-0.8c0.2-0.2 0.3-0.2 0.5-0.1l1.4 0.7c0.2 0.1 0.3 0.2 0.5 0.3 0 0.1 0.1 0.5-0.099 1s-1 0.9-1.4 1c-0.3 0-0.8 0.001-1.3-0.099-0.3-0.1-0.7-0.2-1.2-0.4-2.1-0.9-3.4-3-3.5-3.1s-0.8-1.1-0.8-2.1c0-1 0.5-1.5 0.7-1.7s0.4-0.3 0.5-0.3z" />
                  </svg>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>

  </article>

  <!-- Toast -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <span class="me-auto">Link berhasil disalin ke clipboard</span>

        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection(); ?>
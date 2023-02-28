<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<!-- ### $App Screen Content ### -->
<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="row gap-20 masonry pos-r">
      <div class="masonry-sizer col-md-6"></div>
      <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
          <h6 class="c-grey-900">Basic Form</h6>
          <button onclick="history.back()" style="float: right;" class="btn btn-info col-2"><i
              class="ti-back-left align-middle me-2"></i>Kembali</button>
          <div class="mT-30">
            <?= form_open('U/Admin', '', [
              '_method' => 'PUT'
            ]); ?>
            <div class="mb-3">
              <label class="form-label">Fullname</label>
              <?= form_input('fullname', $admin['fullname'], [
                'class' => 'form-control',
                'placeholder' => 'Masukkan nama lengkap'
              ]); ?>
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <?= form_input('username', $admin['username'], [
                'class' => 'form-control',
                'placeholder' => 'Masukkan Username'
              ]); ?>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <?= form_input('password', '', [
                'class' => 'form-control',
                'placeholder' => 'Masukkan Password'
              ], 'password'); ?>
            </div>
            <div class="mb-3">
              <label class="form-label">Konfirmasi Password</label>
              <?= form_input('konfirmasiPassword', '', [
                'class' => 'form-control',
                'placeholder' => 'Konfirmasi Password'
              ], 'password'); ?>
            </div>
            <button type="submit" class="btn btn-primary btn-color">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection(); ?>
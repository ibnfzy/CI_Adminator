<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Data Tables</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">Bootstrap Data Table</h4>
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>~</th>
                  <th>Fullname</th>
                  <th>Username</th>
                  <th>Login Terakhir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>~</th>
                  <th>Fullname</th>
                  <th>Username</th>
                  <th>Login Terakhir</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($admin as $item) : ?>
                <tr>
                  <td><?= $item['id_admin']; ?></td>
                  <td><?= $item['fullname']; ?></td>
                  <td><?= $item['username']; ?></td>
                  <td><?= $item['last_login']; ?></td>
                  <td>
                    <div class="btn-group btn-group-lg" role="group">
                      <a href="<?= base_url('U/Admin/' . $item['id_admin'] . '/edit'); ?>" type="button"
                        class="btn btn-info"><i class="ti-pencil"></i></a>
                      <button onclick="deleteData('<?= $item['id_admin']; ?>')" type="button" class="btn btn-danger"><i
                          class="ti-trash"></i></button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
function deleteData(a) {
  swal({
      title: "Apa kamu yakin?",
      text: "Data akan terhapus",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "DELETE",
          url: "Admin/" + a,
          success: function(response) {
            swal("Data Telah Terhapus", {
              icon: "success",
            }).then(() => {
              window.location.reload()
            })
          },
          error: function(response) {
            swal("Terjadi kesalahan pada AJAX", {
              icon: "error",
            })
          }
        });
      }
    });
}
</script>
<?= $this->endSection(); ?>
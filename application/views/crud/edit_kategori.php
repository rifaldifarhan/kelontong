<div class="row">
  <div class="col-lg-6">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Edit Kategori</h1>
      </div>
      <!-- form input -->
      <form class="form" action="<?= base_url('index.php/menu/edit'); ?>" method="post">
        <!-- id -->
        <div class="form-group">
          <input type="text" class="form-control form-control-name" id="name" name="name" placeholder="Id" require>
        </div>
        <!-- Kategori -->
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Kategori" require>
        </div>
        <!-- tombol submit untuk menambah data -->
        <input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Tambah">
      </form>
      <hr>
      <div class="text-center">
        <!-- untuk membatalkan aksi dan kembali ke halaman sebelumnya -->
        <a class="small" href="<?= base_url('index.php/menu/kategori'); ?>">Kembali</a>
      </div>
    </div>
  </div>
</div>

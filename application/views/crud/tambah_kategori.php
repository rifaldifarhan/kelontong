<div class="row">
  <div class="col-lg-6">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Tambah Kategori</h1>
      </div>
      <!-- form input -->
      <form class="form" action="<?= base_url('index.php/menu/input_tambah'); ?>" method="post">
        <!-- id -->
        <div class="form-group">
          <input type="text" class="form-control form-control-name" id="id" name="id" placeholder="ID" required>
        </div>
        <!-- Kategori -->
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="kategori" name="kategori" placeholder="Kategori" required>
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

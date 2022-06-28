<div class="row">
  <div class="col-lg-6">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Edit Kategori</h1>
      </div>
      <?php foreach ($kategori as $value); ?>
      <!-- form input -->
      <form class="form" action="<?= base_url('index.php/Menu/update'); ?>" method="post">
        <!-- id -->
        <div class="form-group">
          <input type="text" class="form-control form-control-name" id="id" name="id" value="<?php echo $value->id; ?>" required>
        </div>
        <!-- Kategori -->
        <div class="form-group">
          <input type="text" class="form-control form-control-name" id="kategori" name="kategori" value="<?php echo $value->Kategori; ?>" required>
        </div>
        <!-- tombol submit untuk menambah data -->
        <input type="submit" class="btn btn-success btn-block" name="submit" value="Update">
      </form>
      <hr>
      <div class="text-center">
        <!-- untuk membatalkan aksi dan kembali ke halaman sebelumnya -->
        <a class="small" href="<?= base_url('index.php/Menu/kategori'); ?>">Kembali</a>
      </div>
    </div>
  </div>
</div>
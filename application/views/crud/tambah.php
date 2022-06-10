<div class="row">
  <div class="col-lg-7">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Tambah</h1></div>
        <form class="form" action="<?php echo base_url('Admin/input');?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username Maximal 10 Character" require>
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-name" id="nama" name="nama" placeholder="Name" require>
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-controluser" id="pass" name="pass" placeholder="Password Maximal 6 Character" require>
          </div>
          <div class="form-group">
          </div>
          <input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Tambah">
        </form><hr>
        <div class="text-center">
          <a class="small" href="index">Kembali</a>
        </div></div></div></div>
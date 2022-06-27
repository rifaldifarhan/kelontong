<!-- Begin Page Content -->
<!-- Page Heading -->

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori Pemesanan</h6>
            <div class="card-body" id="table-responsive">
                <!-- membuat table -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allkelontong  as $value) { ?>
                            <tr>
                                <th><?php echo $value->id ?></th>
                                <th><?php echo $value->Kategori ?></th>
                                <th><a href="<?php echo base_url('index.php/menu/edit/'.$value->id); ?>" class="btn btn-success">
                                    <span class="text">Edit</span>&nbsp;
                                    </a>
                                    <a href="<?php echo base_url('index.php/menu/hapus'); ?>/<?php echo $value->id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
                                      <span class="text">Hapus</span>
                                    </a>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <!-- tombol untuk insert data ke database -->
                <a href="<?php echo base_url('index.php/menu/tambah'); ?>" class="btn btn-success btn-icon-split">
                    <span class="text">Tambah Data</span>
                </a>
            </div>
            </a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Begin Page Content -->
<!-- Page Heading -->

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="text-center font-weight-bold text-primary">Form Pembayaran</h4>
            <div class="card-body" id="table-responsive">
                <!-- membuat table -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor Ponsel</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tgl Pemesanan</th>
                            <th scope="col">Jenis Pesanan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Bukti Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allkelontong  as $value) { ?>
                            <tr>
                                <th><?php echo $value->id ?></th>
                                <th><?php echo $value->Nama ?></th>
                                <th><?php echo $value->Email ?></th>
                                <th><?php echo $value->Nomor_ponsel ?></th>
                                <th><?php echo $value->Alamat ?></th>
                                <th><?php echo $value->Tanggal_pemesanan ?></th>
                                <th><?php echo $value->Jenis_pesanan ?></th>
                                <th><?php echo $value->Deskripsi_pesanan ?></th>
                                <th><?php echo $value->id_kategori ?></th>
                                <th><?php echo $value->Bukti_pembayaran ?></th>

                            </tr>

                        <?php } ?>
                    </tbody>

                </table>

            </div>
            </a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Begin Page Content -->
<!-- Page Heading -->

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="text-center font-weight-bold text-primary">Data User</h4>
            <div class="card-body" id="table-responsive">
                <!-- membuat table -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor Ponsel</th>
                            <!-- <th scope="col">Kata_Sandi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allkelontong  as $value) { ?>
                            <tr>
                                <th><?php echo $value->id ?></th>
                                <th><?php echo $value->Nama ?></th>
                                <th><?php echo $value->Email ?></th>
                                <th><?php echo $value->Nomor_ponsel ?></th>

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
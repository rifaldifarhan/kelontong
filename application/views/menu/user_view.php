<!-- Begin Page Content -->
<!-- Page Heading -->

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3>Data User</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped dataTable dtr-inline" role="grid" Id="kelontong">
                <thead>
                    <tr>
                        <th scope="col">id</th>
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

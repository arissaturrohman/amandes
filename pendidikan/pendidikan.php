<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pendidikan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Pendidikan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Table Pendidikan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" width="5%">No</th>
                        <th>Nama Pendidikan</th>
                        <th class="align-middle" width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $conn->query("SELECT * FROM tb_pendidikan");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td class="align-middle"><?= $no++; ?></td>
                            <td><?= $data['pendidikan']; ?></td>
                            <td>
                                <a href="?page=pendidikan&action=edit&id=<?= $data['id_pend']; ?>" class="badge badge-success">edit</a>
                                <a href="?page=pendidikan&action=delete&id=<?= $data['id_pend']; ?>" name="delete" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="?page=pendidikan&action=add" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
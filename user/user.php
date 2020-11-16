<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data User</li>
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
            <h3 class="card-title">Table User</h3>

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
                        <th class="align-middle text-center" width="5%">No</th>
                        <th class="align-middle text-center">Nama User</th>
                        <th class="align-middle text-center">Username</th>
                        <th class="align-middle text-center">Level</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center" width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $conn->query("SELECT * FROM tb_user");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td class="align-middle text-center"><?= $no++; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['username']; ?></td>
                            <td><?= $data['level']; ?></td>
                            <td>
                                <?php
                                if ($data['status'] == 'Y') {
                                    echo "Aktif";
                                } else {
                                    echo "Tidak Aktif";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $level = $_SESSION['id_user'];
                                if ($level == $data['id_user']) {
                                ?>
                                    <button type="button" class="btn btn-block btn-default disabled"><i class="fas fa-exclamation-triangle"></i> Disabled</button>
                                <?php } else { ?>

                                    <!-- <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" value="Y" <?php if (in_array("Y", $data)) echo "checked"; ?>>
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" value="N" <?php if (in_array("N", $data)); ?>>                              
                              <label class="custom-control-label" for="customSwitch1" ></label>
                            </div> -->
                                    <a href="?page=user&action=edit&id=<?= $data['id_user']; ?>" class="badge badge-success">edit</a>
                                    <!-- <a href="?page=user&action=delete&id=<?= $data['id_user']; ?>" name="delete" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a> -->
                                    <?php
                                    if ($data['status'] == 'Y') {
                                        $icon =  "fas fa-lock-open";
                                    } else {
                                        $icon =  "fas fa-lock";
                                    }
                                    echo "<a href='?page=user&action=pass&id=$data[id_user]' class='badge badge-info' title='ganti password'><i class='$icon'></i></a>";
                                    ?>

                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="?page=user&action=add" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
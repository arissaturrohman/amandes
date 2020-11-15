<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Desa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Desa</li>
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
            <h3 class="card-title">Table Desa</h3>

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
                        <th>Nama Kecamatan</th>
                        <th>Nama Desa</th>
                        <?php 
                        $level = $_SESSION['level'];
                        if($level == 'admin'){            
                        ?>
                        <th class="align-middle" width="10%">Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                $sql = $conn->query("SELECT * FROM tb_desa ORDER BY id_kec ASC");
                while ($data = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="align-middle"><?= $no++; ?></td>
                        <td>
                            <?php 
                            $id_kec = $data['id_kec'];
                            $sql_kec = $conn->query("SELECT * FROM tb_kec WHERE id_kec='$id_kec'");
                            $data_kec = $sql_kec->fetch_assoc();
                            echo $data_kec['kec'];
                            ?>
                        </td>
                        <td><?= $data['desa']; ?></td>
                        <?php 
                        $level = $_SESSION['level'];
                        if($level == 'admin'){            
                        ?>
                        <td>
                            <a href="?page=desa&action=edit&id=<?= $data['id_desa']; ?>" class="badge badge-success">edit</a>
                            <a href="?page=desa&action=delete&id=<?= $data['id_desa']; ?>" name="delete" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="badge badge-danger">delete</a>
                        </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <?php 
        $level = $_SESSION['level'];
        if($level == 'admin'){            
            ?>
        <div class="card-footer">
            <a href="?page=desa&action=add" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>
        </div>
            <?php } ?>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
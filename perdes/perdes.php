<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Perangkat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Perangkat</li>
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
            <h3 class="card-title">Tabel Perangkat</h3>

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
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Nama Perangkat</th>
                        <th>Jabatan</th>
                        <th>No SK</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                $sql = $conn->query("SELECT * FROM tb_perdes WHERE status='Y'");
                while($data = $sql->fetch_assoc()){
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?php
                             $id_kec = $data['id_kec'];
                             $sql_kec = $conn->query("SELECT * FROM tb_kec WHERE id_kec=$id_kec");
                             while($data_kec = $sql_kec->fetch_assoc()){
                             echo $data_kec['kec']; ?>
                             <?php } ?>
                        </td>
                        <td>
                            <?php
                             $id_desa = $data['id_desa'];
                             $sql_desa = $conn->query("SELECT * FROM tb_desa WHERE id_desa=$id_desa");
                             while($data_desa = $sql_desa->fetch_assoc()){
                             echo $data_desa['desa']; ?>
                             <?php }?>
                        </td>
                        <td><?= $data['nama']; ?></td>
                        <td>
                            <?php
                             $id_jab = $data['id_jab'];
                             $sql_jab = $conn->query("SELECT * FROM tb_jabatan WHERE id_jab=$id_jab");
                             while($data_jab = $sql_jab->fetch_assoc()){
                             echo $data_jab['jabatan']; ?>
                             <?php }?>
                        </td>
                        <td><?= $data['no_sk']; ?></td>
                        <td>
                            <a href="?page=perdes&action=detail&id=<?= $data['id_perdes']; ?>" class="badge badge-info">detail</a>
                            <a href="export.php" target="_blank" class="badge badge-warning">export</a>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <?php 
        if(isset($_SESSION["login"])){            
        ?>
        <div class="card-footer">
            <a href="?page=perdes&action=add" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Data</a>
        </div>
          <?php } ?>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
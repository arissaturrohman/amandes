<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Desa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Data Desa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Horizontal Form -->
    <div class="row">
        <div class="col-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Desa</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                      <?php 
                      $id_desa = $_GET['id'];
                      $sql = $conn->query("SELECT * FROM tb_desa WHERE id_desa='$id_desa'");
                      $data_desa = $sql->fetch_assoc();
                      ?>
                      <div class="form-group">
                        <label for="kec">Kecamatan</label>
                          <select name="kec" id="kec" class="form-control" >
                          <?php 
                          $sql_kec = $conn->query("SELECT * FROM tb_kec");
                          while($data_kec = $sql_kec->fetch_array()){
                          if ($data_desa['id_kec'] == $data_kec['id_kec']) {
                            $select = "selected";
                          } else {
                            $select = "";
                          }
                          echo "<option value='$data_kec[id_kec]' $select>".$data_kec['kec']."</option";
                          
                          ?>
                          <option value="<?= $data_kec['id_kec']; ?>"><?= $data_kec['kec']; ?></option>
                          <?php } ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="desa">Desa</label>
                              <input type="text" class="form-control" id="desa" name="desa" value="<?= $data_desa['desa']; ?>">                          
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-info">Submit</button>
                        <a href="?page=desa" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- /.content -->

<?php

$kec  = mysqli_real_escape_string($conn, $_POST['kec']);
$desa = mysqli_real_escape_string($conn, $_POST['desa']);
if (isset($_POST['edit'])) {
    $sql = $conn->query("UPDATE tb_desa SET desa='$desa', id_kec='$kec' WHERE id_desa='$id_desa'");
    if ($sql) {
?>
        <script>
            alert("Data berhasil diubah...!");
            window.location.href = "?page=desa";
        </script>
<?php
    }
}

?>
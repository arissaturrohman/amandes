<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Foto Perangkat Desa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Edit Foto Perangkat Desa</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Horizontal Form -->
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Form Edit Foto Perangkat Desa</h3>
    </div>
    <!-- /.card-header -->

    <?php
    $id_perdes = $_GET['id'];
    $sql = $conn->query("SELECT * FROM tb_perdes WHERE id_perdes=$id_perdes");
    $data_perdes = $sql->fetch_assoc();
    ?>

    <!-- form start -->
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      <!-- <input type="hidden" value="id_perdes" name="id_perdes"> -->
      <div class="card-body">
        <div class="form-group col-md-6">
          <label for="foto_perdes">Foto Perangkat Desa</label>
          <div class="custom-file">
            <input type="hidden" name="foto_lama" value="<?= $data_perdes['foto_perdes']; ?>">
            <input type="file" name="foto_perdes" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
        <p class="text-danger mb-0"><small>*Ukuran file max 2Mb</small></p>
        <p class="text-danger mb-0"><small>*Ekstensi yang diperbolehkan JPG|JPEG|PNG|PDF</small></p>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" name="edit" class="btn btn-info">Submit</button>
        <a href="?page=perdes&action=detail&id=<?= $data_perdes['id_perdes']; ?>" class="btn btn-default float-right">Cancel</a>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->

<?php

if (isset($_POST['edit'])) {

  $gambar1  = $_FILES['foto_perdes']['name'];
  // $gambar2  = explode(".",$_FILES['foto_sk']['name']);
  $source1  = $_FILES['foto_perdes']['tmp_name'];
  // $source2  = $_FILES['foto_sk']['tmp_name'];
  $size   = $_FILES['foto_perdes']['size'];
  $eks      = array('jpg', 'jpeg', 'png', 'pdf');
  $y        = explode('.', $gambar1);
  $ekstensi = strtolower(end($y));
  $folder   = 'assets/img/';
  $baru1    = date('dmYHis') . $gambar1;
  $foto_lama = $_POST['foto_lama'];
  // $baru2    = round(microtime(true)). '.' . end($gambar2);

  if (in_array($ekstensi, $eks) === true) {
    if ($size > 2048) {
      unlink("assets/img/" . $foto_lama);
      // unlink("assets/img/".$baru2);
      move_uploaded_file($source1, $folder . $baru1);
      // move_uploaded_file($source2, $folder.$baru2);

      $sql = $conn->query("UPDATE tb_perdes SET 
                            foto_perdes='$baru1'
                            WHERE id_perdes='$id_perdes'
                            ");
      if ($sql) {
?>
        <script>
          alert("Data berhasil diubah...!");
          window.location.href = "?page=perdes&action=detail&id=<?= $data_perdes['id_perdes']; ?>";
        </script>
      <?php

      }
    } else {
      ?>
      <script>
        alert("Ukuran terlalu besar...!");
      </script>
    <?php
    }
  } else {
    ?>
    <script>
      alert("Ekstensi tidak diperbolehkan...!");
    </script>
<?php
  }
}

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Perangkat Desa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Data Perangkat Desa</li>
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
          <h3 class="card-title">Form Edit Perangkat Desa</h3>
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
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="kec">Kecamatan</label>
                  <select name="kec" id="kec" class="form-control" >
                  <?php 
                  $sql_kec = $conn->query("SELECT * FROM tb_kec");
                  while($data_kec = $sql_kec->fetch_array()){
                  if ($data_perdes['id_kec'] == $data_kec['id_kec']) {
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
              <div class="form-group col-md-6">
                <label for="desa">Desa</label>
                  <select name="desa" id="desa" class="form-control" >
                  <?php 
                  $sql_desa = $conn->query("SELECT * FROM tb_desa");
                  while($data_desa = $sql_desa->fetch_array()){
                  if ($data_perdes['id_desa'] == $data_desa['id_desa']) {
                    $select = "selected";
                  } else {
                    $select = "";
                  }
                  echo "<option value='$data_desa[id_desa]' $select>".$data_desa['desa']."</option";
                  
                  ?>
                  <option value="<?= $data_desa['id_desa']; ?>"><?= $data_desa['desa']; ?></option>
                  <?php } ?>
                  </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat" id="tempat" value="<?= $data_perdes['tempat']; ?>">
              </div>
              <div class="form-group col-md-3">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $data_perdes['tgl_lahir']; ?>" placeholder="Nama Lengkap">
              </div>
              <div class="form-group col-md-3">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data_perdes['nama']; ?>" placeholder="Nama Lengkap">
              </div>
              <div class="form-group col-md-3">
              <label for="jk">Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk">
                <option>Pilih Jenis Kelamin</option>
                <option <?php if($data_perdes['jk']=='lk'){echo "selected";} ?> value="lk">Laki-laki</option>
                <option <?php if($data_perdes['jk']=='pr'){echo "selected";} ?> value="pr">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="pendidikan">Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="form-control" >
                  <?php 
                  $sql_pendidikan = $conn->query("SELECT * FROM tb_pendidikan");
                  while($data_pendidikan = $sql_pendidikan->fetch_array()){
                  if ($data_perdes['id_pend'] == $data_pendidikan['id_pend']) {
                    $select = "selected";
                  } else {
                    $select = "";
                  }
                  echo "<option value='$data_pendidikan[id_pend]' $select>".$data_pendidikan['pendidikan']."</option";
                  
                  ?>
                  <option value="<?= $data_pendidikan['id_pend']; ?>"><?= $data_pendidikan['pendidikan']; ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label for="jabatan">Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control" >
                  <?php 
                  $sql_jabatan = $conn->query("SELECT * FROM tb_jabatan");
                  while($data_jabatan = $sql_jabatan->fetch_array()){
                  if ($data_perdes['id_jab'] == $data_jabatan['id_jab']) {
                    $select = "selected";
                  } else {
                    $select = "";
                  }
                  echo "<option value='$data_jabatan[id_jab]' $select>".$data_jabatan['jabatan']."</option";
                  
                  ?>
                  <option value="<?= $data_jabatan['id_jab']; ?>"><?= $data_jabatan['jabatan']; ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label for="no_sk">No SK</label>
                <input type="text" class="form-control" name="no_sk" id="no_sk" value="<?= $data_perdes['no_sk']; ?>">
              </div>
              <div class="form-group col-md-3">
                <label for="tmt">TMT</label>
                <input type="date" class="form-control" name="tmt" id="tmt" value="<?= $data_perdes['tmt']; ?>">
              </div>
            </div>
            <div class="form-group">
            <label>Alamat</label>
              <textarea name="alamat" class="form-control" rows="5"><?= $data_perdes['alamat']; ?></textarea>
            </div>
            <!-- <div class="form-row">
            <div class="form-group col-md-6">
                <label for="foto_perdes">Foto Perangkat Desa</label>
                <div class="mb-2">
                  <input type="hidden" name="foto_perdes_lama" value="<?= $data_perdes['foto_perdes']; ?>">
                  <img src="assets/img/<?= $data_perdes['foto_perdes']; ?>" width="10%" height="15%" alt="">
                </div>
                <div class="custom-file">
                  <input type="file" name="foto_perdes" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="foto_sk">Foto SK</label>
                <div class="mb-2">
                  <img src="assets/img/<?= $data_perdes['foto_sk']; ?>" width="10%" height="15%" alt="">
                  <input type="hidden" name="foto_sk_lama" value="<?= $data_perdes['foto_sk']; ?>">
                </div>
                <div class="custom-file">
                  <input type="file" name="foto_sk" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>
            <p class="text-danger mb-0"><small>*Ukuran file max 2Mb</small></p>
            <p class="text-danger mb-0"><small>*Ekstensi yang diperbolehkan JPG|JPEG|PNG|PDF</small></p> -->
            <label for="">Status Perangkat Desa</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status" value="Y" <?php if($data_perdes['status']=='Y') echo 'checked'?>>
              <label class="form-check-label" for="status">
                Aktif
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="status" value="N" <?php if($data_perdes['status']=='N') echo 'checked'?>>
              <label class="form-check-label" for="status">
                Pensiun
              </label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <button type="submit" name="edit" class="btn btn-info">Submit</button>
              <a href="?page=perdes" class="btn btn-default float-right">Cancel</a>
          </div>
          <!-- /.card-footer -->
      </form>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->

<?php
if (!isset($_POST['edit'])) {
  ?>
      <script>
          window.location.href='404.html';
      </script>
<?php
}

if (isset($_POST['edit'])) {
  $kec        = mysqli_real_escape_string($conn, $_POST['kec']);
  $desa       = mysqli_real_escape_string($conn, $_POST['desa']);
  $nama       = mysqli_real_escape_string($conn, $_POST['nama']);
  $tempat     = mysqli_real_escape_string($conn, $_POST['tempat']);
  $tgl_lahir  = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
  $jk         = mysqli_real_escape_string($conn, $_POST['jk']);
  $pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);
  $jabatan    = mysqli_real_escape_string($conn, $_POST['jabatan']);
  $no_sk      = mysqli_real_escape_string($conn, $_POST['no_sk']);
  $tmt        = mysqli_real_escape_string($conn, $_POST['tmt']);
  $alamat     = mysqli_real_escape_string($conn, $_POST['alamat']);
  $status     = mysqli_real_escape_string($conn, $_POST['status']);

// $gambar1  = $_FILES['foto_perdes']['name'];
// $gambar2  = explode(".",$_FILES['foto_sk']['name']);
// $source1  = $_FILES['foto_perdes']['tmp_name'];
// $source2  = $_FILES['foto_sk']['tmp_name'];
// $size   = $_FILES['foto_perdes']['size'];
// $eks      = array('jpg', 'jpeg', 'png', 'pdf');
// $y        = explode('.', $gambar1);
// $ekstensi = strtolower(end($y));
// $folder   = 'assets/img/';
// $baru1    = date('dmYHis').$gambar1;
// $baru2    = round(microtime(true)). '.' . end($gambar2);

//  if (in_array($ekstensi, $eks) === true) {
//       if ($size > 2048) {
//         move_uploaded_file($source1, $folder.$baru1);
//         move_uploaded_file($source2, $folder.$baru2);

        $sql = $conn->query("UPDATE tb_perdes SET 
                            id_kec    ='$kec',
                            id_desa   ='$desa',
                            id_pend   ='$pendidikan',
                            id_jab    ='$jabatan',
                            nama      ='$nama',
                            jk        ='$jk',
                            tempat    ='$tempat',
                            tgl_lahir ='$tgl_lahir',
                            alamat    ='$alamat',
                            no_sk     ='$no_sk',
                            tmt       ='$tmt',
                            status    ='$status'
                            WHERE id_perdes='$id_perdes'
                            ");
            if ($sql) {
        ?>
                <script>
                    alert("Data berhasil diubah...!");
                    window.location.href = "?page=perdes";
                </script>
        <?php
        
            }
          } 
  
?>
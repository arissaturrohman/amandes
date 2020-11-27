<?php
if (!isset($_SESSION["login"])) {
?>
  <script>
    window.location.href = '404.html';
  </script>
<?php
} ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Perangkat Desa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Data Perangkat Desa</li>
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
      <h3 class="card-title">Form Add Perangkat Desa</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="kec">Kecamatan</label>
            <select class="form-control" id="kec" name="kec" required>
              <option value="">Pilih Kecamatan</option>
              <?php
              $kec = $conn->query("SELECT * FROM tb_kec");
              while ($data_kec = $kec->fetch_assoc()) {
              ?>
                <option value="<?= $data_kec['id_kec']; ?>"><?= $data_kec['kec']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="desa">Desa</label>
            <select class="form-control" id="desa" name="desa" required>
              <option value="">Pilih Desa</option>
              <option></option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $_POST['nama']; ?>" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group col-md-3">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" value="<?= $_POST['nik']; ?>" placeholder="NIK" required>
          </div>
          <div class="form-group col-md-2">
            <label for="tempat">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat" id="tempat" value="<?= $_POST['tempat']; ?>" placeholder="Tempat Lahir" required>
          </div>
          <div class="form-group col-md-2">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
          </div>
          <div class="form-group col-md-2">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-control" id="jk" name="jk" required>
              <option>Pilih Jenis Kelamin</option>
              <option value="lk">Laki-Laki</option>
              <option value="pr">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="pendidikan">Pendidikan</label>
            <select class="form-control" id="pendidikan" name="pendidikan" required>
              <option value="">Pilih Pendidikan</option>
              <?php
              $pend = $conn->query("SELECT * FROM tb_pendidikan");
              while ($data_pend = $pend->fetch_assoc()) {
              ?>
                <option value="<?= $data_pend['id_pend']; ?>"><?= $data_pend['pendidikan']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="jabatan">Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan" required>
              <option value="">Pilih Jabatan</option>
              <?php
              $jab = $conn->query("SELECT * FROM tb_jabatan");
              while ($data_jab = $jab->fetch_assoc()) {
              ?>
                <option value="<?= $data_jab['id_jab']; ?>"><?= $data_jab['jabatan']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="no_sk">No SK</label>
            <input type="text" class="form-control" name="no_sk" id="no_sk" placeholder="No SK" required>
          </div>
          <div class="form-group col-md-3">
            <label for="tmt">TMT</label>
            <input type="date" class="form-control" name="tmt" id="tmt" required>
          </div>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="siltap">Penghasilan</label>
            <input type="number" class="form-control" name="siltap" id="siltap" placeholder="Penghasilan" required>
          </div>
          <div class="form-group col-md-4">
            <label for="tunj">Tunjangan Lainnya</label>
            <input type="number" class="form-control" name="tunj" id="tunj" placeholder="Tunjangan Lainnya" required>
          </div>
          <div class="form-group col-md-4">
            <label for="bengkok">Bengkok</label>
            <input type="text" class="form-control" name="bengkok" id="bengkok" placeholder="Bengkok" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="foto_perdes">Foto Perangkat Desa</label>
            <div class="custom-file">
              <input type="file" name="foto_perdes" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="foto_sk">Foto SK</label>
            <div class="custom-file">
              <input type="file" name="foto_sk" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <p class="text-danger mb-0"><small>*Ukuran file max 2Mb</small></p>
        <p class="text-danger mb-3"><small>*Ekstensi yang diperbolehkan JPG|JPEG|PNG|PDF</small></p>
        <label for="">Status Perangkat Desa</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status" value="Y" checked>
          <label class="form-check-label" for="status">
            Aktif
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status" value="N">
          <label class="form-check-label" for="status">
            Pensiun
          </label>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" name="add" class="btn btn-info">Submit</button>
        <a href="?page=perdes" class="btn btn-default float-right">Cancel</a>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->

<?php

if (isset($_POST['add'])) {
  $kec        = mysqli_real_escape_string($conn, $_POST['kec']);
  $desa       = mysqli_real_escape_string($conn, $_POST['desa']);
  $nama       = mysqli_real_escape_string($conn, $_POST['nama']);
  $nik        = mysqli_real_escape_string($conn, $_POST['nik']);
  $tempat     = mysqli_real_escape_string($conn, $_POST['tempat']);
  $tgl_lahir  = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
  $jk         = mysqli_real_escape_string($conn, $_POST['jk']);
  $pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);
  $jabatan    = mysqli_real_escape_string($conn, $_POST['jabatan']);
  $no_sk      = mysqli_real_escape_string($conn, $_POST['no_sk']);
  $tmt        = mysqli_real_escape_string($conn, $_POST['tmt']);
  $alamat     = mysqli_real_escape_string($conn, $_POST['alamat']);
  $siltap     = mysqli_real_escape_string($conn, $_POST['siltap']);
  $tunj       = mysqli_real_escape_string($conn, $_POST['tunj']);
  $bengkok    = mysqli_real_escape_string($conn, $_POST['bengkok']);
  $status     = "Y";

  $gambar1  = $_FILES['foto_perdes']['name'];
  $gambar2  = explode(".", $_FILES['foto_sk']['name']);
  $source1  = $_FILES['foto_perdes']['tmp_name'];
  $source2  = $_FILES['foto_sk']['tmp_name'];
  $foto1    = $_FILES['foto_perdes']['error'];
  $foto2    = $_FILES['foto_sk']['error'];
  $size     = $_FILES['foto_perdes']['size'];
  $eks      = array('jpg', 'jpeg', 'png', 'pdf');
  $y        = explode('.', $gambar1);
  $ekstensi = strtolower(end($y, $gambar2));
  $folder   = 'assets/img/';
  $baru1    = date('dmYHis') . $gambar1;
  $baru2    = round(microtime(true)) . '.' . end($gambar2);
  $gagal1   = date('dmYHis') . 'user.png';
  $gagal2   = round(microtime(true)) . 'file.jpg';

  if ($foto1 === 4) {
    if ($foto2 === 4) {

      $sql = $conn->query("INSERT INTO tb_perdes (id_kec, id_desa, id_pend, id_jab, nama, nik, jk, tempat, tgl_lahir, alamat, no_sk, tmt, foto_perdes, foto_sk, siltap, tunj, bengkok, status)
          VALUES (
                '$kec',                
                '$desa',                
                '$pendidikan',                
                '$jabatan',                
                '$nama',
                '$nik',                
                '$jk',                
                '$tempat',                
                '$tgl_lahir',                
                '$alamat',                
                '$no_sk',                
                '$tmt',                
                '',
                '',
                '$siltap',
                '$tunj',
                '$bengkok',
                '$status'
                  )");

      if ($sql) {
?>
        <script>
          alert("Data berhasil ditambah...!");
          window.location.href = "?page=perdes";
        </script>
      <?php

      }
    } else {
      ?>
      <script>
        alert("gagal 1");
      </script>
    <?php
    }
  } else {
    ?>
    <script>
      alert("gagal 2");
    </script>
    <?php
  }


  if (!in_array($ekstensi, $eks) === true) {
    if (!$size > 2048) {
      move_uploaded_file($source1, $folder . $baru1);
      move_uploaded_file($source2, $folder . $baru2);

      $sql = $conn->query("INSERT INTO tb_perdes (id_kec, id_desa, id_pend, id_jab, nama, nik, jk, tempat, tgl_lahir, alamat, no_sk, tmt, foto_perdes, foto_sk, siltap, tunj, bengkok, status)
          VALUES (
                '$kec',                
                '$desa',                
                '$pendidikan',                
                '$jabatan',                
                '$nama',
                '$nik',                
                '$jk',                
                '$tempat',                
                '$tgl_lahir',                
                '$alamat',                
                '$no_sk',                
                '$tmt',                
                '$baru1',
                '$baru2',
                '$siltap',
                '$tunj',
                '$bengkok',
                '$status'
                  )");
      if ($sql) {
    ?>
        <script>
          alert("Data berhasil ditambah...!");
          window.location.href = "?page=perdes";
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
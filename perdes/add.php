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
      <form class="form-horizontal" method="POST">
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="kec">Kecamatan</label>
                <select class="form-control" id="kec" name="kec">
                <option value="">Pilih Kecamatan</option>
                  <?php 
                  $kec = $conn->query("SELECT * FROM tb_kec");
                  while($data_kec = $kec->fetch_assoc()){
                  ?>
                  <option value="<?= $data_kec['id_kec']; ?>"><?= $data_kec['kec']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="desa">Desa</label>
                  <select class="form-control" id="desa" name="desa">
                    <option value="">Pilih Desa</option>
                    <option></option>
                  </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
              </div>
              <div class="form-group col-md-4">
              <label for="jk">Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk">
                <option>Pilih Jenis Kelamin</option>
                <option value="lk">Laki-Laki</option>
                <option value="pr">Perempuan</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="pendidikan">Pendidikan</label>
                  <select class="form-control" id="pendidikan" name="pendidikan">
                    <option value="">Pilih Pendidikan</option>
                    <?php 
                    $pend = $conn->query("SELECT * FROM tb_pendidikan");
                    while($data_pend = $pend->fetch_assoc()){
                    ?>
                    <option value="<?= $data_pend['id_pend']; ?>"><?= $data_pend['pendidikan']; ?></option>
                    <?php } ?>
                  </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="jabatan">Jabatan</label>
                  <select class="form-control" id="jabatan" name="jabatan">
                    <option value="">Pilih Jabatan</option>
                    <?php 
                    $jab = $conn->query("SELECT * FROM tb_jabatan");
                    while($data_jab = $jab->fetch_assoc()){
                    ?>
                    <option value="<?= $data_jab['id_jab']; ?>"><?= $data_jab['jabatan']; ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-4">
                <label for="no_sk">No SK</label>
                <input type="text" class="form-control" name="no_sk" id="no_sk" placeholder="No SK">
              </div>
              <div class="form-group col-md-4">
                <label for="tmt">TMT</label>
                <input type="date" class="form-control" name="tmt" id="tmt">
              </div>
            </div>
            <div class="form-group">
            <label>Alamat</label>
              <textarea name="alamat" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="foto_perdes">No SK</label>
                <div class="custom-file">
                  <input type="file" name="foto_perdes" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="foto_sk">TMT</label>
                <div class="custom-file">
                  <input type="file" name="foto_sk" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
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

$kec = $_POST['kec'];
if (isset($_POST['add'])) {
    $sql = $conn->query("INSERT INTO tb_kec (kec) VALUES('$kec')");
    if ($sql) {
?>
        <script>
            alert("Data berhasil ditambah...!");
            window.location.href = "?page=kec";
        </script>
<?php
    }
}

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Data Perangkat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Detail Data Perangkat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?php 
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM tb_perdes WHERE id_perdes=$id");
$data = $sql->fetch_assoc();
  // hitung pensiun
  $lahir = $data['tgl_lahir'];  
  $timeToAdd = "+ 60 years";
  $objDateTime = DateTime::createFromFormat("Y-m-d",$lahir);
  $objDateTime->modify($timeToAdd);
  $retire_date = date('d-m-Y', strtotime($lahir));
  $tahun = date('Y');
  $bulan = date('m');
  $sisaTahun = $objDateTime->format("Y") - $tahun;
  $sisaBulan = $objDateTime->format("m");

  // hitung lama kerja
  $awal   = $data['tmt'];
  $awal1  = date_create($awal);
  $akhir  = date_create();
  $hasil = date_diff($awal1, $akhir);
?>
<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-body">
      <div class="mt-1 text-center">
      <?php 
        if(isset($_SESSION["login"])){
        ?>
        <a href="assets/img/<?= $data['foto_perdes']; ?>" data-toggle="lightbox" data-title="Foto Perangkat Desa" data-footer="<a href='?page=perdes&action=edit_foto&id=<?= $data['id_perdes']; ?>' class='btn btn-default'>Edit Foto</a>">
        <?php } ?>
        <img src="assets/img/<?= $data['foto_perdes']; ?>" width="10%" height="10%" class="img-fluid" alt="" ></a>
        <p class="font-weight-bold mt-2"><?= $data['nama']; ?></p>
      </div> <hr>
      <div class="mt-3">
      <div class="row">
      <div class="col-md-6 mb-2">
        <table>
            <tr>
              <td width="150px">Kecamatan</td>
              <td>
                <?php
                $id_kec = $data['id_kec'];
                $sql_kec = $conn->query("SELECT * FROM tb_kec WHERE id_kec=$id_kec");
                $data_kec = $sql_kec->fetch_assoc();
                echo ": ".$data_kec['kec']; ?>
              </td>
            </tr>
            <tr>
              <td>Desa</td>
              <td>
              <?php
              $id_desa = $data['id_desa'];
              $sql_desa = $conn->query("SELECT * FROM tb_desa WHERE id_desa=$id_desa");
              $data_desa = $sql_desa->fetch_assoc();
              echo ": ".$data_desa['desa']; ?>
              </td>
            </tr>
            <tr>
              <td>Pendidikan</td>
              <td>
              <?php
              $id_pend = $data['id_pend'];
              $sql_pend = $conn->query("SELECT * FROM tb_pendidikan WHERE id_pend=$id_pend");
              $data_pend = $sql_pend->fetch_assoc();
              echo ": ".$data_pend['pendidikan']; ?>
              </td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>
              <?php
              $id_jab = $data['id_jab'];
              $sql_jab = $conn->query("SELECT * FROM tb_jabatan WHERE id_jab=$id_jab");
              $data_jab = $sql_jab->fetch_assoc();
              echo ": ".$data_jab['jabatan']; ?>
              </td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>
              <?php
              if ($data["jk"] == "lk") {
                echo ": Laki-laki";
              }
              if ($data['jk'] == "pr") {
                echo ": Perempuan";
              } ?>
              </td>
            </tr>
            <tr>
              <td>Tempat Lahir</td>
              <td>
              <?php echo ": ". $data['tempat'];?>
              </td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td>
              <td>
              <?php echo ": ". tgl_indo($data['tgl_lahir']);?>
              </td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>
              <?php echo ": ". $data['alamat'];?>
              </td>
            </tr>
            <tr>
              <td>No SK</td>
              <td>
              <?php echo ": ". $data['no_sk'];?>
              </td>
            </tr>
            <tr>
              <td>TMT</td>
              <td>
              <?php echo ": ". tgl_indo($data['tmt']);?>
              </td>
            </tr>
            <tr>
              <td>Lama Bekerja</td>
              <td>
              <?php echo ": ". $hasil->y." tahun " . $hasil->m." bulan " . $hasil->d." hari"; ?>
              </td>
            </tr>
            <tr>
              <td>Masa Pensiun</td>
              <td>
              <?php echo ": ". $sisaTahun." tahun " . $sisaBulan." bulan "; ?>
              </td>
            </tr>
            <tr>
              <td>Status</td>
              <td>
              <?php
              if ($data["status"] == "Y") {
                echo ": Aktif";
              }
              if ($data['status'] == "N") {
                echo ": Pensiun";
              }?>
              </td>
            </tr>
        </table>
      </div>
      <div class="col-md-6">
      <?php 
        if(isset($_SESSION["login"])){
        ?>
      <a href="assets/img/<?= $data['foto_sk']; ?>" data-toggle="lightbox" data-title="Foto SK" title="Foto SK"
        data-footer="<a href='?page=perdes&action=edit_sk&id=<?= $data['id_perdes']; ?>' class='btn btn-default'>Edit SK</a>">
        <?php } ?>
        <img src="assets/img/<?= $data['foto_sk']; ?>" width="100%" class="img-fluid" alt="" ></a>
      </div>
      </div>      
      </div>
    </div>
    <div class="card-footer">
    <?php 
        if(isset($_SESSION["login"])){
        ?>
      <a href="?page=perdes&action=edit&id=<?= $data['id_perdes']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Data</a>
      <a href="?page=perdes&action=delete&id=<?= $data['id_perdes']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini...?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete Data</a>
        <?php } ?>
      <a href="?page=perdes" class="btn btn-default float-right">Cancel</a>
  </div>
  <!-- /.card-footer-->
  </div>
</section>
<?php
include("inc/config.php");
include("inc/tgl_indo.php");

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Perangkat Desa.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Manajemen Perangkat Desa | Amandes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px; 
	}
	</style>

    
</head>
<body>
 
<center>
		<h2>Rekap Data Perangkat Desa</h2>
</center>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Kecamatan</th>
            <th>Desa</th>
            <th>Nama Perangkat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan</th>
            <th>No SK</th>
            <th>Tanggal</th>
            <th>Jabatan</th>
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
                <?= tgl_indo($data['tgl_lahir']);?>
            </td>
            <td>
                <?php
                 if($data['jk'] == 'lk'){
                     echo "Laki-laki";
                    } else {
                        echo "Perempuan";
                    } ?>
            </td>            
            <td>
              <?php
              $id_pend = $data['id_pend'];
              $sql_pend = $conn->query("SELECT * FROM tb_pendidikan WHERE id_pend=$id_pend");
              $data_pend = $sql_pend->fetch_assoc();
              echo $data_pend['pendidikan']; ?>
              </td>            
            <td><?= $data['no_sk']; ?></td>            
            <td><?= tgl_indo($data['tmt']); ?></td>            
            <td>
                <?php
                  $id_jab = $data['id_jab'];
                  $sql_jab = $conn->query("SELECT * FROM tb_jabatan WHERE id_jab=$id_jab");
                  while($data_jab = $sql_jab->fetch_assoc()){
                  echo $data_jab['jabatan']; ?>
                  <?php }?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>
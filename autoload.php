<?php 

include("inc/config.php");

$id_desa = $_POST['id_kec'];
$sql = $conn->query("SELECT * FROM tb_desa WHERE id_kec=$id_desa");
echo "<option>Pilih Desa</option>";
while($data = $sql->fetch_array()){

  echo '<option value="'.$data['id_desa'].'">'.$data['desa'].'</option>';
 } ?>
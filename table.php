<?php 

include("inc/config.php");
$sql = $conn->query("ALTER TABLE `tb_perdes` CHANGE `nik` `nik` VARCHAR(16) NOT NULL");

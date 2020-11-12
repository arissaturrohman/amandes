<?php
$id_jab = $_GET['id'];
$sql = $conn->query("DELETE FROM tb_jabatan WHERE id_jab='$id_jab'");
?>

<script>
    alert("Data berhasil dihapus...!");
    window.location.href = "?page=jabatan";
</script>
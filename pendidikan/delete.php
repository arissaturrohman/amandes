<?php
$id_pend = $_GET['id'];
$sql = $conn->query("DELETE FROM tb_pendidikan WHERE id_pend='$id_pend'");
?>

<script>
    alert("Data berhasil dihapus...!");
    window.location.href = "?page=pendidikan";
</script>
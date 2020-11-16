<?php
if (!isset($_POST['delete'])) {
?>
    <script>
        window.location.href = '404.html';
    </script>
<?php
} else {
    $id_desa = $_GET['id'];
    $sql = $conn->query("DELETE FROM tb_desa WHERE id_desa='$id_desa'");
?>

    <script>
        alert("Data berhasil dihapus...!");
        window.location.href = "?page=desa";
    </script>
<?php } ?>
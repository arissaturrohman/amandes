<?php
if (!isset($_POST['delete'])) {
?>
    <script>
        window.location.href = '404.html';
    </script>
<?php
} else {
    $id_perdes = $_GET['id'];
    $sql = $conn->query("SELECT * FROM tb_perdes WHERE id_perdes=$id_perdes");
    $data = $sql->fetch_assoc();
    $foto1 = $data['foto_perdes'];
    $foto2 = $data['foto_sk'];


    unlink("assets/img/" . $foto1);
    unlink("assets/img/" . $foto2);
    $sql_delete = $conn->query("DELETE FROM tb_perdes WHERE id_perdes='$id_perdes'");

?>

    <script>
        alert("Data berhasil dihapus...!");
        window.location.href = "?page=perdes";
    </script>
<?php } ?>
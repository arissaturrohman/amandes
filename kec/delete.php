<?php
if (!isset($_SESSION["login"])) {
?>
    <script>
        window.location.href = '404.html';
    </script>
<?php
} 
$id_kec = $_GET['id'];
$sql = $conn->query("DELETE FROM tb_kec WHERE id_kec='$id_kec'");
?>

<script>
    alert("Data berhasil dihapus...!");
    window.location.href = "?page=kec";
</script>
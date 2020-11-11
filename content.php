<?php

$page = $_GET["page"];
$action = $_GET["action"];

if ($page == "desa") {
    if ($action == "") {
        include "desa/desa.php";
    } elseif ($action == "add") {
        include "desa/add.php";
    } elseif ($action = "edit") {
        include "desa/edit.php";
    } elseif ($action == "delete") {
        include "desa/delete.php";
    } elseif ($action == "detail") {
        include "desa/detail.php";
    }
} elseif ($page == "") {
    include "dashboard.php";
} else {
    echo "Halaman tidak ditemukan";
}

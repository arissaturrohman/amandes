<?php

$page = $_GET["page"];
$action = $_GET["action"];

if ($page == "perdes") {
    if ($action == "") {
        include "perdes/perdes.php";
    } elseif ($action == "add") {
        include "perdes/add.php";
    } elseif ($action == "detail") {
        include "perdes/detail.php";
    } elseif ($action == "delete") {
        include "perdes/delete.php";
    } elseif ($action == "edit") {
        include "perdes/edit.php";
    } elseif ($action == "edit_foto") {
        include "perdes/edit_perdes.php";
    } elseif ($action == "edit_sk") {
        include "perdes/edit_sk.php";
    }
} elseif ($page == "kec") {
    if ($action == "") {
        include "kec/kec.php";
    } elseif ($action == "add") {
        include "kec/add.php";
    } elseif ($action == "edit") {
        include "kec/edit.php";
    } elseif ($action == "delete") {
        include "kec/delete.php";
    }
} elseif ($page == "desa") {
    if ($action == "") {
        include "desa/desa.php";
    } elseif ($action == "add") {
        include "desa/add.php";
    } elseif ($action == "edit") {
        include "desa/edit.php";
    } elseif ($action == "delete") {
        include "desa/delete.php";
    }
} elseif ($page == "pendidikan") {
    if ($action == "") {
        include "pendidikan/pendidikan.php";
    } elseif ($action == "add") {
        include "pendidikan/add.php";
    } elseif ($action == "edit") {
        include "pendidikan/edit.php";
    } elseif ($action == "delete") {
        include "pendidikan/delete.php";
    }
} elseif ($page == "jabatan") {
    if ($action == "") {
        include "jabatan/jabatan.php";
    } elseif ($action == "add") {
        include "jabatan/add.php";
    } elseif ($action == "edit") {
        include "jabatan/edit.php";
    } elseif ($action == "delete") {
        include "jabatan/delete.php";
    }
} elseif ($page == "user") {
    if ($action == "") {
        include "user/user.php";
    } elseif ($action == "add") {
        include "user/add.php";
    } elseif ($action == "edit") {
        include "user/edit.php";
    } elseif ($action == "delete") {
        include "user/delete.php";
    } elseif ($action == "pass") {
        include "user/ganti_password.php";
    }
} elseif ($page == "") {
    include "dashboard.php";
} else {
    echo "Halaman tidak ditemukan";
}

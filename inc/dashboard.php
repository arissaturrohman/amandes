<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <?php 
                $kec = $conn->query("SELECT COUNT(kec) AS jumlah FROM tb_kec");
                $data = $kec->fetch_assoc();
                $jumlah_kec = $data['jumlah'];                
                ?>
                    <h3><?= $jumlah_kec; ?></h3>

                    <p>Kecamatan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-city"></i>
                </div>
                <a href="?page=kec" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                <?php 
                $desa = $conn->query("SELECT COUNT(desa) AS jumlah FROM tb_desa");
                $data = $desa->fetch_assoc();
                $jumlah_desa = $data['jumlah'];
                ?>
                    <h3><?= $jumlah_desa; ?></h3>

                    <p>Desa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-landmark"></i>
                </div>
                <a href="?page=desa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                <?php 
                $perdes = $conn->query("SELECT COUNT(nama) AS jumlah FROM tb_perdes");
                $data = $perdes->fetch_assoc();
                $jumlah_perdes = $data['jumlah'];
                ?>
                    <h3><?= $jumlah_perdes; ?></h3>

                    <p>Perangkat Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="?page=perdes" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                <?php 
                $user = $conn->query("SELECT COUNT(username) AS jumlah FROM tb_user");
                $data = $user->fetch_assoc();
                $jumlah_user = $data['jumlah'];
                ?>
                    <h3><?= $jumlah_user; ?></h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <?php 
                $level = $_SESSION['level'];
                if($level == 'admin'){            
                ?>
                <a href="?page=user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                <?php }
                else{?>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                <?php } ?>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>
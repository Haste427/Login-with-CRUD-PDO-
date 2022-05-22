<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
    if(!empty($_SESSION['ADMIN'])){ }else{
    header('location:login.php'); }
    // panggil file
    require 'proses/panggil.php';
    // tampilkan form edit
    $user = strip_tags($_GET['username']);
    $hasil = $proses->tampil_data_id('tbl_user','username',$user);
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/fontawesome.min.css">
    </head>
    <body style="background:#586df5;">
        <div class="container">
            <br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama'];?></span>
            <div class="float-right">
            <a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
            <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
        </div>
        <br/><br/><br/>
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-lg-6">
        <br/>
        <div class="card">
        <div class="card-header">
        <h4 class="card-title">Edit Pengguna - <?php echo $hasil['nama'];?></h4>
        </div>
        <div class="card-body">
        <!-- form berfungsi
        mengirimkan data input
        dengan method post ke proses
        crud dengan paramater get aksi edit -->
        <form action="proses/crud.php?aksi=edit" method="POST">
            <div class="form-group">
                <label>Nama </label>
                <input type="text" value="<?php echo $hasil['nama'];?>" class="formcontrol" name="nama" required>
            </div>
            <div class="form-group">
                <label>Hak</label>
                <input type="harga" value="<?php echo $hasil['hak'];?>" class="formcontrol" name="hak" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" value="<?php echo $hasil['username'];?>" class="formcontrol" name="user" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" value="" placeholder="ubah password" class="formcontrol" name="pass" required>
                <input type="hidden" value="<?php echo $hasil['username'];?>" class="formcontrol" name="username" required>
            </div>
            <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit">
            </i> Edit Data</button>
        </form>
        </div>
        </div>
        </div>
        <div class="col-sm-3"></div>
        </div>
        </div>
    </body>
</html>
<?php
    require 'panggil.php';
    // proses edit
    if(!empty($_GET['aksi'] == 'edit')){
        $nama = strip_tags($_POST['nama']);
        $hak = strip_tags($_POST['hak']);
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        // jika password tidak diisi
        if($pass == ''){
            $data = array('username' =>$username,'nama' =>$nama,'hak' =>$hak,);
        }else{
            $data = array('username' =>$username,'password' =>md5($password),'nama' =>$nama,'hak' =>$hak,);
        }
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data
        Berhasil");window.location="../home.php"</script>';
    }
    // login
    if(!empty($_GET['aksi'] == 'login')){
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $result = $proses->proses_login($username,$password);
        if($result == 'gagal'){
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan
            echo "<script>window.location='../home.php';</script>";
        }
    }
?>
<?php
    include 'koneksi.php';
    include 'prosescrud.php';
    $db = new Koneksi();
    $koneksi = $db->DBConnect();
    $proses = new prosesCrud($koneksi);
    error_reporting(0);
    $id = $_SESSION['ADMIN']['id_login'];
    $sesi = $proses->tampil_data_id('tbl_user','id_login',$id);
?>
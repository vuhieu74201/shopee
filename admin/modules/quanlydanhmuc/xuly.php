<?php
include '../../config/config.php';
$tendanhmuc = $_POST['tendanhmuc'];
$stt = $_POST['stt'];
if(isset($_POST['themdanhmuc'])) {
    //them
    $sql_them = "INSERT INTO danhmuc(stt,tendanhmuc) VALUE(' " . $stt . "', '" . $tendanhmuc . "')";
    mysqli_query($conn,$sql_them);
    header('Location:../../dashboard.php?action=quanlydanhmuc&query=lietke');
}elseif (isset($_POST['suadanhmuc'])) {
    //sua
    $sql_update = "UPDATE danhmuc SET stt = '" . $stt . "',tendanhmuc = '" . $tendanhmuc . "' WHERE iddanhmuc='$_GET[iddanhmuc]'";
    mysqli_query($conn,$sql_update);
    header('Location:../../dashboard.php?action=quanlydanhmuc&query=lietke');
}else{
    //xoa
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM danhmuc WHERE iddanhmuc = '" . $id . "'";
    mysqli_query($conn,$sql_xoa);
    header('Location:../../dashboard.php?action=quanlydanhmuc&query=lietke');
}

?>
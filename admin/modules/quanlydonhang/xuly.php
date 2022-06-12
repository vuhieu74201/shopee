<?php
include '../../config/config.php';

    //xoa
    $madonhang= $_GET['madonhang'];
    $sql_xoa = "DELETE FROM tbl_donhang WHERE madonhang = '" . $madonhang . "'";
    mysqli_query($conn,$sql_xoa);
    header('Location:../../dashboard.php?action=quanlydonhang&query=lietke');
    
    //cập nhập tình trạng đơn hàng
    if(isset($_POST['capnhapdonhang'])){
        $trangthaidonhang = $_POST['trangthaidonhang'];
        $madon = $_POST['xulymadonhang'];
        $sql_update_donhang = mysqli_query($conn, "UPDATE tbl_donhang SET trangthai = '$trangthaidonhang' WHERE madonhang = '$madon'");
    }
?>
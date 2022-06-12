<?php
include '../../config/config.php';
$masp = rand(0,9999);
$tensanpham = $_POST['tensanpham'];
//xu ly anh 
$anhsanpham = $_FILES['anhsanpham']['name'];
$anhsanpham_tmp = $_FILES['anhsanpham']['tmp_name'];
$mota = $_POST['mota'];;
$mausac = $_POST['mausac'];
$soluong = $_POST['soluong'];
$gia = $_POST['gia'];
$danhmuc = $_POST['danhmuc'];

if(isset($_POST['themsanpham'])) {
    //them
    $sql_them = "INSERT INTO tbsanpham(masp,tensanpham,anhsanpham,mota,mausac,soluong,gia,iddanhmuc)
                 VALUE('".$masp."','".$tensanpham."','".$anhsanpham."',
                       '".$mota."','".$mausac."','".$soluong."',
                       '".$gia."','".$danhmuc."')";
    mysqli_query($conn,$sql_them);
    move_uploaded_file($anhsanpham_tmp,'uploads/'.$anhsanpham);
    header('Location:../../dashboard.php?action=quanlysanpham&query=lietke');
}elseif (isset($_POST['suasanpham'])) {
    //sua
    if($anhsanpham!=''){
            move_uploaded_file($anhsanpham_tmp,'uploads/'.$anhsanpham);
            $id = $_GET['idsanpham'];
            $sql_update = "UPDATE tbsanpham SET masp = '" .$masp. "' , tensanpham = '" .$tensanpham. "' ,
                                                anhsanpham = '" .$anhsanpham. "' , mota = '".$mota. "' ,
                                                mausac = '".$mausac."' , soluong = '" .$soluong. "' ,
                                                gia = '" .$gia. "',
                                                iddanhmuc='".$danhmuc."'
                                                WHERE idsanpham='$_GET[idsanpham]'";
    //xoa anh cu 
            $sql="SELECT * FROM tbsanpham WHERE idsanpham = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            if($row['anhsanpham']!=$anhsanpham){
                unlink('uploads/'.$row['anhsanpham']);
            }
    }else{
        move_uploaded_file($anhsanpham_tmp,'uploads/'.$anhsanpham);
        $sql_update = "UPDATE tbsanpham SET masp = '" .$masp. "' , tensanpham = '" .$tensanpham. "' , 
                                            mota = '" .$mota. "' ,mausac = '" .$mausac. "' , 
                                            soluong = '" .$soluong. "' ,gia = '" .$gia. "',
                                            iddanhmuc='".$danhmuc."'
                                            WHERE idsanpham='$_GET[idsanpham]'";
        
    }
    mysqli_query($conn,$sql_update);
    header('Location:../../dashboard.php?action=quanlysanpham&query=lietke');
}else{
    //xoa
    $id = $_GET['idsanpham'];
    $sql="SELECT * FROM tbsanpham WHERE idsanpham='$id' LIMIT 1";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['anhsanpham']);
    }
    $sql_xoa = "DELETE FROM tbsanpham WHERE idsanpham = '" . $id . "'";
    mysqli_query($conn,$sql_xoa);
    header('Location:../../dashboard.php?action=quanlysanpham&query=lietke');
}

?>
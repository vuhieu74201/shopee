<?php
    include './../../admin/config/config.php';
    //them san pham vao gio hang
    if (isset($_POST['themgiohang'])){
        $idsanpham = $_POST['idsanpham'];
        $tensanpham = $_POST['tensanpham'];
        $anhsanpham = $_POST['anhsanpham'];
        $mausac= $_POST['mausac'];
        $soluong = $_POST['soluong'];
        $gia= $_POST['gia'];
        $query_select_cart =  mysqli_query($conn,"SELECT * FROM giohang WHERE idsanpham = '$idsanpham'");
        $count_select_cart = mysqli_num_rows($query_select_cart);
        if($count_select_cart>0){
            $row_sanpham = mysqli_fetch_array($query_select_cart);
            $soluong = $row_sanpham['soluong']+1;
            $sql_cart = "UPDATE giohang SET soluong='$soluong' WHERE idsanpham = '$idsanpham'";
        }else{
            $soluong= $soluong;
            $sql_cart = "INSERT INTO giohang(idsanpham,tensanpham,anhsanpham,mausac,soluong,gia) 
                         VALUES('$idsanpham','$tensanpham','$anhsanpham','$mausac','$soluong','$gia')";
        }
        $row_add = mysqli_query($conn,$sql_cart);
        if($row_add>0){
            header("location:./../../chitietsanpham.php?id=$idsanpham");
        }
    }
?>  
<?php 
    // mua sản phẩm từ chi tiết sản phẩm
    
    if (isset($_POST['buy_now'])){
        $idsanpham = $_POST['idsanpham'];
        $tensanpham = $_POST['tensanpham'];
        $anhsanpham = $_POST['anhsanpham'];
        $mausac= $_POST['mausac'];
        $soluong = $_POST['soluong'];
        $gia= $_POST['gia'];
        $query_select_cart =  mysqli_query($conn,"SELECT * FROM giohang WHERE idsanpham = '$idsanpham'");
        $count_select_cart = mysqli_num_rows($query_select_cart);
        if($count_select_cart>0){
            $row_sanpham = mysqli_fetch_array($query_select_cart);
            $soluong = $row_sanpham['soluong']+1;
            $sql_cart = "UPDATE giohang SET soluong='$soluong' WHERE idsanpham = '$idsanpham'";
        }else{
            $soluong= $soluong;
            $sql_cart = "INSERT INTO giohang(idsanpham,tensanpham,anhsanpham,mausac,soluong,gia) 
                         VALUES('$idsanpham','$tensanpham','$anhsanpham','$mausac','$soluong','$gia')";
        }
        $row_add = mysqli_query($conn,$sql_cart);
        if($row_add>0){
            header("location:./../../giohang.php");
        }
    }
?>
<?php 
    if(isset($_POST['capnhapgiohang'])){
        //cap nhap so luong gio hang
        if($_POST['product_id']!=''){
            for($i=0;$i<count($_POST['product_id']);$i++){
                $idsanpham = $_POST['product_id'][$i];
                $soluong = $_POST['soluong'][$i];
                if($soluong<=0){
                    $sql_update = mysqli_query($conn,"DELETE FROM  giohang  WHERE idsanpham = '$idsanpham'");
                }else{
                    $sql_update = mysqli_query($conn,"UPDATE giohang SET soluong = '$soluong' WHERE idsanpham = '$idsanpham'");
                }
            }      
            header("location:./../../giohang.php");  
        }else{
            header("location:./../../giohang.php");  
        }
    }

?>
<?php
    //xoa san pham gio hang
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = "DELETE FROM giohang WHERE idgiohang = '" . $id . "'";
        mysqli_query($conn,$sql_xoa);
        header("location:./../../giohang.php"); 
    }
?>
<?php
    // Đăng ký mua hàng nhanh
    if(isset($_POST['thanhtoan1']) && $_POST['taikhoan'] != '' 
                                   && $_POST['matkhau'] != '' && $_POST['fullname'] != '' 
                                   && $_POST['sdt'] != '' && $_POST['diachi'] != ''){ 
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        $fullname = $_POST['fullname']; 
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];
        $ghichu = $_POST['note'];
        $madonhang = rand(0,9999);

        $sql_kiemtra = "SELECT * FROM tbnguoidung WHERE taikhoan = '$taikhoan'";
        $old = mysqli_query($conn,$sql_kiemtra);
        if(mysqli_num_rows($old)>0){
            echo '<script>alert("Tài khoản đã tồn tại !")</script>';
        }else{
            $sql_dangkynhanh = mysqli_query($conn,"INSERT INTO tbnguoidung(taikhoan,fullname,matkhau,sdt,diachi) 
                                              VALUES ('".$taikhoan."','".$fullname."','".$matkhau."','".$sdt."','".$diachi."')");
            if($sql_dangkynhanh){

                $sql_select_buy = mysqli_query($conn,"SELECT * FROM tbnguoidung ORDER BY idnguoidung DESC LIMIT 1");
                $row_id_buy = mysqli_fetch_array($sql_select_buy);
                $id_khachhang = $row_id_buy['idnguoidung'];
                for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){                
                    $idsanpham = $_POST['thanhtoan_product_id'][$i];
                    $soluong = $_POST['thanhtoan_soluong'][$i];
                    $trangthai = $_POST['trangthai'];
                    $sql_donhang = mysqli_query($conn," INSERT INTO tbl_donhang(idsanpham,madonhang,idnguoidung,trangthai,hinhthucthanhtoan) 
                                                        VALUES('$idsanpham','$madonhang','$id_khachhang','$trangthai','$hinhthucthanhtoan')");
                    $sql_delete_giohang = mysqli_query($conn,"DELETE FROM giohang WHERE idsanpham = '$idsanpham'");
                    if($sql_donhang){
                        $sql_select_donhang = mysqli_query($conn,"SELECT * FROM tbl_donhang ORDER BY idnguoidung DESC LIMIT 1 ");
                        $row_ma_donhang = mysqli_fetch_array($sql_select_donhang);
                        $ma_donhang = $row_ma_donhang['madonhang'];
                        $id_donhang = $row_ma_donhang['id_donhang'];
                        $sql_thanhtoan = mysqli_query($conn," INSERT INTO tbl_chitiethoadon(idnguoidung,idsanpham,madonhang,soluongmua,ghichu) 
                                                              VALUES('$id_khachhang','$idsanpham','$ma_donhang','$soluong','$ghichu')");
                    }
                }   
            }      
        }
    }else{   
        header("location:./../../giohang.php");     
    }
?>
<?php
    // thanh toán khi đã đăng nhập
    if(isset($_POST['thanhtoan2'])){ 
        $id_khachhang= $_POST['id_nguoidung'];
        $hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];
        $ghichu = $_POST['ghichu'];
        $madonhang = rand(0,9999);

        for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){              
            $idsanpham = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];
            $trangthai = $_POST['trangthai'];
            $sql_donhang = mysqli_query($conn," INSERT INTO tbl_donhang(idsanpham,madonhang,idnguoidung,trangthai,hinhthucthanhtoan) 
                                                VALUES('$idsanpham','$madonhang','$id_khachhang','$trangthai','$hinhthucthanhtoan')");
            $sql_delete_giohang = mysqli_query($conn,"DELETE FROM giohang WHERE idsanpham = '$idsanpham'");
            if($sql_donhang){
                $sql_select_donhang = mysqli_query($conn,"SELECT * FROM tbl_donhang ORDER BY madonhang DESC LIMIT 1 ");
                $row_ma_donhang = mysqli_fetch_array($sql_select_donhang);
                $ma_donhang = $row_ma_donhang['madonhang'];
                $sql_thanhtoan = mysqli_query($conn," INSERT INTO tbl_chitiethoadon(idnguoidung,idsanpham,madonhang,soluongmua,ghichu) 
                                                      VALUES('$id_khachhang','$idsanpham','$ma_donhang','$soluong','$ghichu')");
    
            }
        }   
    }else{
        
        header("location:./../../giohang.php"); 
        
    }
?>

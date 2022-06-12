<?php
    //xử lý lưu thông tin 
    if(isset($_POST['luu_taikhoan'])){
        $id = $_SESSION['idnguoidung'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        $thangsinh = $_POST['thangsinh'];
        $namsinh = $_POST['namsinh'];
        $avatar = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name'];
        if($avatar != ''){
            move_uploaded_file($avatar_tmp,'img/avatar/'.$avatar);
            $sql_xuly_profile = "UPDATE tbnguoidung SET fullname = '".$fullname."' , email = '".$email."' ,
                                        sdt = '".$sdt."' ,diachi = '".$diachi."' , gioitinh = '".$gioitinh."' ,
                                        ngaysinh = '".$ngaysinh."' , thangsinh = '".$thangsinh."' ,namsinh = '".$namsinh."' ,
                                        avatar = '".$avatar."'
                                        WHERE idnguoidung = '$id' ";          
            //xóa ảnh cũ
            $sql_xoa_avatar = "SELECT * FROM tbnguoidung where idnguoidung = '$id' LIMIT 1";
            $query_xoa_avatar= mysqli_query($conn,$sql_xoa_avatar);
            $row_xoa_avatar = mysqli_fetch_array($query_xoa_avatar);
            if($row_xoa_avatar['avatar'] != $avatar){
                unlink('img/avatar/'.$row_xoa_avatar['avatar']);
            }
           
            
           
        }else{
            move_uploaded_file($avatar_tmp,'img/avatar/'.$avatar);
            $sql_xuly_profile = "UPDATE tbnguoidung SET fullname = '".$fullname."' , email = '".$email."' ,
                                sdt = '".$sdt."' ,diachi = '".$diachi."' , gioitinh = '".$gioitinh."' ,
                                ngaysinh = '".$ngaysinh."' ,thangsinh = '".$thangsinh."' , namsinh = '".$namsinh."'                            
                                WHERE idnguoidung = '$id' ";
           
        }
        mysqli_query($conn, $sql_xuly_profile);    
    }
?>
<?php
    if(isset($_POST['capnhapdonhang'])){
        $trangthaidonhang = $_POST['trangthaidonhang'];
        $madon = $_POST['xulymadonhang'];
        $sql_update_donhang = mysqli_query($conn, "UPDATE tbl_donhang SET trangthai = '$trangthaidonhang' WHERE madonhang = '$madon'");
    }
?>
<?php
    
    include 'admin/config/config.php';
    if(isset($_POST['themgiohang'])){
        $id=$_GET['idsanpham'];
        $soluong = 1;
        $sql = "SELECT * FROM tbsanpham WHERE idsanpham = $id ";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);       
        $new_product = ['tensanpham' => $row['tensanpham'] , 
                        'id' => $id,                                      
                        'soluong' => $soluong,
                        'gia'=>$row['gia'],
                        'anhsanpham'=>$row['anhsanpham']];
    }
?>
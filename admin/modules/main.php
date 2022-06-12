<div class= " main col-lg-10">
    <?php 
        if(isset($_GET['action'])){
            $tam =  $_GET['action'];
		}else{
			$tam = '';
		}
        if(isset( $_GET['query'])){
            $query = $_GET['query'];
		}else{
            $query = '';
		}
        //danh muc
		if($tam =='quanlydanhmuc'&& $query=='lietke') {
			include("modules/quanlydanhmuc/lietke.php");
		}elseif ($tam=='quanlydanhmuc' && $query=='them') {
            include("modules/quanlydanhmuc/them.php");
        }elseif ($tam=='quanlydanhmuc' && $query=='sua') {
            include("modules/quanlydanhmuc/sua.php");
            
        }
        //san pham
        elseif ($tam=='quanlysanpham' && $query=='lietke') {
            include("modules/quanlysanpham/lietke.php");
        }
        elseif ($tam=='quanlysanpham' && $query=='them') {
            include("modules/quanlysanpham/them.php");
        }
        elseif ($tam=='quanlysanpham' && $query=='sua') {
            include("modules/quanlysanpham/sua.php");
        }
        //don hang
        elseif ($tam=='quanlydonhang' && $query=='lietke') {
            include("modules/quanlydonhang/lietke.php");
        }
        elseif ($tam=='quanlydonhang' && $query=='chitiet') {
            include("modules/quanlydonhang/chitiet.php");
        }
        //quản lý người dùng 
        elseif ($tam=='quanlykhachhang' && $query=='lietke') {
            include("modules/quanlykhachhang/lietke.php");
        }elseif ($tam=='quanlykhachhang' && $query=='lichsumuahang') {
            include("modules/quanlykhachhang/lichsumuahang.php");
        }
        else{
			include("modules/dashboard.php");
        }
    ?>
</div>
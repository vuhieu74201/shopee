<?php    
		if(isset($_GET['quanly'])){
			$tam = $_GET['quanly'];
		}else{
			$tam = '';
		}
		if($tam =='quanlydanhmuc'){
            include("inc/slider.php");
			include("main/danhmuc.php");		
		}elseif($tam =='quanlythongtincanhan'){
			include("thongtincanhan/index.php");
		}elseif($tam =='timkiem'){
			include("timkiem/index.php");
		}else{
            include("inc/slider.php");		
			include("main/index.php");
		}
?>

                   
         
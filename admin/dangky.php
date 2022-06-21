
<?php
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./font/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <div class="">
            <a href="index.php" class="shopee-logo">
                <i class="fab fa-shopify"></i>
                <span class="logo-text"> Shopee</span> 
            </a>
            <span class="header-text"> Đăng Ký </span> 
        </div>
    </div>
    <div class=" form__login ">   
        <div class="form__login-container">
            <div class="row ">
                <div class="flex logo__img col-lg-8">
                    <img src="img/login/1.png" alt="">
                </div>
                <div class="col-lg-4">   
                    <div class="loginform">
                        <form action="" class="login" method="post"> 
                            <div>
                                <span class="form-text">
                                    Đăng Ký
                                </span>
                            </div> 
                            <div class="form-group first">
                              <label for="username">Tên tài khoản :</label>
                              <input type="text" class="form-control" placeholder="" name="taikhoan">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="">Họ và tên  :</label>
                                <input type="text" class="form-control" placeholder="" name="fullname">
                            </div> 
                            <div class="form-group last mb-3">
                              <label for="matkhau">Mật khẩu :</label>
                              <input type="text" class="form-control" placeholder="" name="matkhau">
                            </div>  
                            
                            <div class="form-group last mb-3">
                                <label for="email">Email :</label>
                                <input type="text" class="form-control" placeholder="" name="email">
                            </div> 
                            <div class="form-group last mb-3">
                                <label for="sdt">Số điện thoại :</label>
                                <input type="sdt" class="form-control" placeholder="" name="sdt">
                            </div>                      
                            
                            <button class="btn py-4 btn__primary btn-text" name="dangky" style="margin-top:20px">Đăng Ký</button>                                                                                       
                            
                        </form>              
                    </div>          
                </div>                                 
            </div>                
        </div>           
    </div>
</body>
</html>
<?php
   

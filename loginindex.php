<?php
    include_once "login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Đăng nhập</title>
  <link rel="icon" href="img/medical.png" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body">
              <div class="row justify-content-center">
              <div class="" >
                <?php
                  if(isset($_POST['login']))
                  {
                    $sql = "SELECT * FROM `tbl_user` WHERE `username`='".$_POST['username']."' AND `password`='".$_POST['password']."'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)==0) { ?>
                       <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong> Sai tài khoản hoặc mật khẩu !! </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php
                    } 
                  }
                ?>
              </div>
                <div class="col-md-7 col-lg-5 col-xl-5">
                  <form action="loginindex.php" method="post">
                    <p class="text-center h1 fw-bold mb-4 mt-3">Đăng nhập</p>
                    
                    <div class="form-outline mb-4">
                      <label class="form-label"> <i class="bi bi-person-circle"></i> Email</label>
                      <input type="email" class="form-control form-control-lg py-3" name="username" autocomplete="off" placeholder="Nhập email" style="border-radius:25px ;" >

                    </div>

                    
                    <div class="form-outline mb-4">
                      <label class="form-label"><i class="bi bi-chat-left-dots-fill"></i> Mật khẩu</label>
                      <input type="password" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="Nhập mật khẩu" style="border-radius:25px ;" >

                    </div>


                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Sign in" name="login" class="btn btn-primary btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;" >
                    </div>

                  </form><br>
                  <p align="center"><a href="forgot.php" class="text-primary" style="font-weight:600; text-decoration:none;">Quên mật khẩu</a></p>
                  <p align="center">Bạn chưa có tài khoản? <a href="register.php" class="text-primary" style="font-weight:600;text-decoration:none;">Đăng ký ngay</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
</body>

</html>
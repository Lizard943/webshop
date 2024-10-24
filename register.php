<!doctype html>
<html lang="en">

<head>
  <title>Register</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-2">
              <div class="row justify-content-center">
                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Đăng ký</p>
                <div class="col-md-10 col-lg-6 col-xl-5">
                  <form class="mx-1 mx-md-4" action="add.php" method="post">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label"><i class="bi bi-person-circle"></i> Tên của bạn</label>
                        <input type="text" class="form-control form-control-lg py-3" name="name" autocomplete="off" placeholder="Tên" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label"><i class="bi bi-envelope-at-fill"></i> Email</label>
                        <input type="email" class="form-control form-control-lg py-3" name="username" autocomplete="off" placeholder="Email" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label"><i class="bi bi-lock-fill"></i> Mật khẩu</label>
                        <input type="password" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="Nhập mật khẩu" style="border-radius:25px ;" />
                      </div>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Đăng ký" name="register" class="btn btn-primary btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;" />

                    </div>

                  </form>
                  <p align="center">Tôi đã có tài khoản <a href="loginindex.php" class="text-primary" style="font-weight:600; text-decoration:none;">Đăng nhập ngay</a></p>
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
<?php
    require_once '..\component\database.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="../img/user-gear.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="">
        <div class="row g-0">
            <div class="d-flex flex-column justify-content-start col-auto bg-dark min-vh-100 px-4 ">
                <a class="text-white text-decoration-none d-flex flex-column align-items-center ms-2 mt-2" role="button">
                    <span class="fs-4">Admin</span>
                </a>
                <hr class="d-flex flex-column text-white">
                <ul class="nav flex-column fs-5" >
                    <li class="nav-item">
                        <a href="..\Admin" class="nav-link text-white" aria-current="page">
                            <i class="bi bi-house-door-fill"></i>
                            <span class="ms-2">Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-orders.php" class="nav-link text-white" aria-current="page">
                            <i class="bi bi-receipt"></i>
                            <span class="ms-2">Đơn hàng</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="admin-products.php" class="nav-link text-white" aria-current="page">
                            <i class="bi bi-list-check"></i>
                            <span class="ms-2">Sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="admin-accounts.php" class="nav-link text-white" aria-current="page">
                            <i class="bi bi-person-fill"></i>
                            <span class="ms-2">Tài khoản</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="admin-feedback.php" class="nav-link text-white" aria-current="page">
                            <i class="bi bi-inbox"></i>
                            <span class="ms-2">Góp ý</span>
                        </a>
                    </li>
                </ul>

            </div>
            <div class="col">
                <div class="">
                    <div class="bg-dark" style="height:70px;margin-top: -10px;box-shadow: 0 0 5px;z-index:-1">
                        <div class="container pt-4 text-white">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <?=$_SESSION['admin']?>
                                </div>
                                <div class="col-auto"><a href="../logout.php">Đăng xuất</a></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="container mt-3" >
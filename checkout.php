<?php
    include "component/database.php";
    session_start();
    function taoMaDonHang() {
        $prefix = "DH"; 
        $randomNumber = mt_rand(1000, 9999); 
        $timestamp = time(); 
    
        $maDonHang = $prefix . $timestamp . $randomNumber;
    
        return $maDonHang;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" type='text/css'>
</head>
<body>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">Trang Chủ/</a>
            <a href="checkout.php" class="text-white">Thanh Toán</a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card">
        <div class="card-body shadow">
            <form action="functions/placeorder.php" method="POST">
            <div class="row">
                <div class="col-md-7">
                    <h5>Chi Tiết</h5><hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Tên</label>
                            <input type="text" Name="name" required placeholder="Họ và Tên"class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Email</label>
                            <input type="email" Name="email"required placeholder="Email"class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">SĐT</label>
                            <input type="text" Name="phone"required placeholder="Số Điện Thoại"class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Địa chỉ</label>
                            <input type="text" Name="pincode"required placeholder="Địa chỉ"class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="fw-bold">Lời nhắn</label>
                            <textarea  Name="comment"required class="form-control "rows="5"></textarea>
                        </div>
                    </div>
                </div>
                    <div class="col-md-5">
                        <h5>Chi Tiết Đơn Hàng</h5><hr>
                        <?php 
                            foreach ($_SESSION['cart'] as $item){ ?>
                                <div class="ps-4 pt-2 border">
                                    <div class="row mb-3 align-items-center"> 
                                        <div class="col-md-2 "> 
                                            <img src="<?=$item['img']?>" alt="" width="60px" > 
                                        </div>
                                        <div class="col-md-5">
                                            <label><?=$item['name']?></label></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label><?=number_format($item['gia'])?>đ</label>
                                        </div>
                                        <div class="col-md-2">
                                            <label ><?=$item['sl']?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>
                        <hr>
                        <h5>Tổng : <span class="float-right fw-bold"><?=number_format($_SESSION['sum'])?> đ</span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="Thanh Toán Khi Nhận Hàng" >
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Đặt hàng</button>
                            </div>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        
    </div>
</div>
</body>
</html>
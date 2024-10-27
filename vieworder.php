<?php
    require_once 'component\database.php';
    session_start();
    if(isset($_GET['ma'])){
        $ma = $_GET['ma'];
        $sql = "SELECT * FROM orders WHERE ma_don_hang = '$ma'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $data = mysqli_fetch_array($result);
        } else {
            echo "0 kết quả";
        }
    }
    else{
        die();
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg border-bottom bg-body-tertiary">
        <div class="container">
            <a href="index.php"><img src="img/images.png" height="40" class="me-5"></a>
            <form class="d-flex" action="list.php">
                <input id="search" name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> 
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" >
                    <li class="nav-item" >
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <?php 
                            if (isset($_SESSION['name'])){ ?>
                                <a class="nav-link" href="myorder.php"><?=$_SESSION['name']?></a>
                            <?php }
                        ?>
                    </li>
                    
                    <li class="nav-item">
                        <?php 
                            if (!isset($_SESSION['name'])){ ?>
                                <a class="nav-link" href="loginindex.php">Login</a>
                            <?php } 
                                else { ?>
                                    <a class="nav-link" href="logout.php">Log out</a>
                                <?php }
                            ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="py-2">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="card">
                            <div class="card-header bg-primary">
                            <span class="text-white fs-3">Xem Đơn Hàng</span>
                                <a href="myorder.php"class="btn btn-warning float-right mb-2 ms-4"> Trở Về</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Thông Tin</h4><hr>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Tên</label>
                                                <div class="border p-1">
                                                    <?= $data['name']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                            <label  class="fw-bold">Email</label>
                                                <div class="border p-1">
                                                    <?= $data['email']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                            <label  class="fw-bold">SĐT</label>
                                                <div class="border p-1">
                                                    <?= $data['sdt']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Địa Chỉ</label>
                                                <div class="border p-1">
                                                    <?= $data['address']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Lời nhắn</label>
                                                <div class="border p-1">
                                                    <?=  $data['comment']; ?>
                                                </div>
                                            </div>
                                        
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h4>Chi Tiết Đặt Hàng</h4><hr>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Sản Phẩm</th>
                                                    <th>Giá</th>
                                                    <th>SL</th>
                                                       
                                                </tr>
                                            </thead>
                                            <tbody>

                                            
                                        <?php 

                                        $order_query = dsitem($ma);
                                        $order_query_run = mysqli_query($conn,$order_query);
                                        if(mysqli_num_rows($order_query_run)>0){
                                            foreach($order_query_run as $item){
                                                ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="<?= $item['img']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                        <?= $item['name']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p><?= number_format( $item['gia'], 0, ',', '.') ?>đ</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p><?= $item['sl']; ?></p>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        </table>
                                        <hr>
                                        <h5>Tổng Tiền : <span class="float-right fw-bold"><?= number_format( $data['total'], 0, ',', '.') ?> đ</span></h5><hr>
                                        <div class="border p-1 mb-3">
                                            <label class="fw-bold">Phương Thức Thanh Toán</label>
                                            <div class="border p-1 mb-3">
                                            Thanh toán tại nhà
                                        </div>
                                        
                                            <label class="fw-bold">Trạng Thái</label>
                                            <div class="border p-1 mb-3">
                                            <?php  
                                                if($data['status'] ==0){
                                                    echo "Đang Xử Lý";
                                                }else if($data['status'] ==1){
                                                    echo "Thành Công";
                                                }else if($data['status'] == 2){
                                                    echo "Hủy Đơn Hàng";
                                                }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
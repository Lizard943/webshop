<?php
    require_once 'component\database.php';
    session_start();
    if (isset($_SESSION['detail'])){
        
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
<body style="background-color:white">
<nav class="navbar navbar-expand-lg border-bottom  fixed-top" >
    <div class="container">
        <img src="img/images.png" height="40" class="me-5">
        <form class="d-flex" role="search">
            <input id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <!--a class="navbar-brand" href="#">Navbar</a-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <?php 
                        if (isset($_SESSION['name'])){ ?>
                            <a class="nav-link" href="#"><?=$_SESSION['name']?></a>
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

    <section class="detail">
        <div class="container-xl" style="margin-top:90px">
            <div class="border rounded">
                <div class="row">
                    <?php
                        if (isset($_SESSION['detail'])){
                            $choose = $_SESSION['detail'];
                            $sql = "SELECT * FROM san_pham WHERE id = $choose";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){?>
                                <div class="col-5">
                                    <img src="<?=$row['img']?>" style="width: 30rem;display:flex;margin: 10px auto;">
                                </div>
                                <div class="col-7 mt-2">
                                    <h3><?=$row['ten_san_pham']?></h3>
                                    <h1 style="color:blue"><?= number_format($row["gia"]) ?>đ</h1>
                                    <div class="row">
                                        <div class="col-3">
                                            <p>Quy cách</p>
                                        </div>
                                        <div class="col-9">
                                            <p><?=$row['quy_cach']?></p>
                                        </div>
                                        <div class="col-3">
                                            <p>Nhà sản xuất</p>
                                        </div>
                                        <div class="col-9">
                                            <p><?=$row['nha_san_xuat']?></p>
                                        </div>
                                        <div class="col-3">
                                            <p>Nước sản xuất</p>
                                        </div>
                                        <div class="col-9">
                                            <p><?=$row['nuoc_san_xuat']?></p>
                                        </div>
                                        <div class="col-3">
                                            <p>Công dụng</p>
                                        </div>
                                        <div class="col-9">
                                            <p><?=$row['cong_dung']?></p>
                                        </div>
                                        <div class="col-3">
                                            <p>Số lượng</p>
                                        </div>
                                        <div class="col-9">
                                            <div class="btn-group">
                                                <input type="number" class="form-control" min=1 value="1" style="width: 50px;">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-primary btn-lg">Chọn mua</button>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            }
                        }
                    ?>   
                </div>
            </div>
        </div>
    </section>
</body>
</html>
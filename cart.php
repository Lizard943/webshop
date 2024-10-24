<?php
    require_once 'component\database.php';
    session_start();
    if(isset($_POST['xoa'])) {
        if ($_POST['xoa'] == 'xoa'){
            foreach ($_SESSION['cart'] as $key => $item){
                if ($item['id']==$_GET['id']){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <section class="cartt">
        <div class="container-fluid" style="margin-top:20px">
            <div class="row mx-5">
                <div class="col-9">
                    <div class="shopping-cart">
                        <h6>My cart</h6>
                        <hr>
                        <?php
                            $sum = 0;
                            if (isset($_SESSION['cart']) && isset($_SESSION['name'])) {
                                foreach ($_SESSION['cart'] as $item){
                                    ?>
                                        <form method="post" action="cart.php?id=<?=$item['id']?>">
                                            <div class="border rounded my-3">
                                                <div class="row align-items-center ">
                                                    <div class="col col-md-2">
                                                        <img src="<?=$item['img']?>" alt="anh" class="img-fluid p-4"/>
                                                    </div>
                                                    <div class="col col-md-4 pt-2">
                                                        <h5><?=$item['name']?></h5>
                                                    </div>
                                                    <div class="col col-md-2 pt-2">
                                                        <h6 class><?=number_format($item['gia'])?></h6>
                                                    </div>
                                                    <div class="col col-md-1">
                                                        <input type="number" style="width: 50px;" value="<?=$item['sl']?>">
                                                    </div> 
                                                    <div class="col col-md-2 pt-2">
                                                        <h6></h6>
                                                    </div>
                                                    <div class="col col-md-1">
                                                        <input type="submit" name="xoa" value="xoa" class=""> 
                                                    </div> 
                                                </div>
                                            </div>
                                        </form>
                                 <?php 
                                 $sum += $item['sl']*$item['gia'];}
                                }
                            ?>
                    </div>
                </div class="col-3">
                    <div class="mt-4" style="width:320px">
                        <form>
                            <div class="border rounded p-3">
                                <h6>Thanh toán</h6>
                                <div class="row">
                                    <div class="col-8">
                                        <p>Tổng giá sản phẩm:</p>
                                    </div>
                                    <div class="col-4">
                                        <p><?=number_format($sum)?>đ</p>
                                    </div>
                                    <div class="col-8">
                                        <p>COD:</p>
                                    </div>
                                    <div class="col-4">
                                        <p><?php if($sum!=0){ echo "22,000đ";}?></p>
                                    </div>
                                    <hr style="margin-left:12px;width:250px">
                                    <div class="col-8">
                                        <p>Tổng thanh toán:</p>
                                    </div>
                                    <div class="col-4">
                                        <p><strong><?=number_format($sum)?>đ</strong></p>
                                    </div>
                                    <button class="btn btn-primary">Thanh toán</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php
        
    ?>

</body>
</html>
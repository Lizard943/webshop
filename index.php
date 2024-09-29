<?php
    require_once 'component\database.php';
    session_start();
    if (isset($_POST['mua']) && isset($_SESSION['name'])) {
        if (isset($_SESSION['cart'])) {
            $session_arr_id = array_column($_SESSION['cart'], 'id');
            if (!in_array($_GET['id'], $session_arr_id)) {
                $_sestion_array = array(
                    'id' => $_GET['id'],
                    'name' => $_POST['name'],
                    'gia' => $_POST['gia'],
                    'img' => $_POST['img'],
                    'sl' => 1
                    
                );
                $_SESSION['cart'][] = $_sestion_array;
            }
            else {
                foreach ($_SESSION['cart'] as $key => $item){
                    if ($item['id'] == $_GET['id']){
                        $_SESSION['cart'][$key]['sl'] +=1;
                    }
                }
            }
        }
        else {
            $_sestion_array = array(
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'gia' => $_POST['gia'],
                'img' => $_POST['img'],
                'sl' => 1
                
            );
            $_SESSION['cart'][] = $_sestion_array;
        } 
    }
    if (isset($_GET['action'])){
        if ($_GET['action'] == 'ct'){
            header('location:cart.php');
        }
    }
    
    


    // Hiển thị giỏ hàng
    
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
    <nav class="navbar navbar-expand-lg border-bottom bg-body-tertiary fixed-top" >
    <div class="container-fluid">
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

    <section class="header" style="margin-top:60px" >
        <div class="side-menu">
            <ul>
                <li>onslae</li>
                <li>tesst</li>
                <li>tess</li>
            </ul>
        </div>
    </section>

    <div class="slider">
        <div id="slider" class="carousel slide" data-bs-ride="carousel"  data-bs-interval="2000">
            <div class="carousel-indicators" >
                <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" ></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" >
                <div class="carousel-item active">
                <img src="img/img-1.jpg" class="d-block w-100" height="500px">
                </div>
                <div class="carousel-item">
                <img src="img/img-2.jpg" class="d-block w-100" height="500px">
                </div>
                <div class="carousel-item">
                <img src="img/img-3.jpg" class="d-block w-100" height="500px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!--section class="feature-categories">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="">
                </div>
                <div class="col-md-4">
                    <img src="">
                </div>
                <div class="col-md-4">
                    <img src="">
                </div>
            </div>
        </div>
    </section-->

    <section class="on-sale">
        <div class="container" style="background-color: lightblue;padding-bottom:10px">
            <div class="title-box">
                <h2>On Sale</h2>
            </div>
            <div class="row">
            <?php
                $sql = "SELECT * FROM sale";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // Hiển thị dữ liệu
                    while($row = $result->fetch_assoc()) { ?>
                        
                            <div class="col my-2">
                                <form class="card" style="width: 12rem;" method="post" action="index.php?id=<?= $row['id'] ?>">
                                    <a href="index.php?action=ct&id=<?= $row['id'] ?>">
                                        <img src="<?= $row["img"] ?>" class="card-img-top" style="width: 10rem;display:flex;margin: 10px auto;">
                                    </a>
                                    <input type="hidden" name="img" value="<?= $row['img'] ?>">
                                    <div class="card-body" style="height:14rem">
                                        <p class="card-text " ><?= $row['name'] ?></p>
                                        <input type="hidden" name="name" value="<?= $row['name'] ?>">
                                        <div class="row" style="position:absolute;bottom:10px;">
                                            <p class="col" style="color:red;font-weight:bold;display:flex;margin: auto 0;" name="gia"><?= number_format($row["gia"]) ?>đ</p>
                                            <input type="hidden" name="gia" value="<?= $row['gia'] ?>">
                                            <input type="submit" name="mua" class="btn btn-primary col" style="width:80px"  value="Mua"></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        
                <?php   }
                 } 
                else {
                    echo "0 results";
                } ?>
            
            </div>
        </div>
    </section>
    
    
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>Thực phẩm chức năng</h3>
                    <p>Vũ Thành Luân</p>
                    <p>Nguyễn Hữu Hoàng</p>
                    <p>Bùi Đức Mạnh</p>
                </div>
            </div>
        </div>
    </section>


</body>
</html>
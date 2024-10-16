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
            $_SESSION["detail"] = $_GET['id'];
            header("Location:details.php");                     
        }
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
    <?php include 'navbar.php'; ?>
    
    <div class="container">
        <?php include 'menu.php'; ?>
        <div class="slider">
            <div id="slider" class="carousel slide" data-bs-ride="carousel"  data-bs-interval="2000">
                <div class="carousel-indicators" >
                    <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" ></button>
                    <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="border-radius:50px">
                    <div class="carousel-item active">
                    <img src="img/banner1.jpg" class="d-block w-100" height="500px">
                    </div>
                    <div class="carousel-item">
                    <img src="img/banner2.png" class="d-block w-100" height="500px">
                    </div>
                    <div class="carousel-item">
                    <img src="img/banner3.png" class="d-block w-100" height="500px">
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
    </div>
    <section class="feature-categories mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/banner4.png">
                </div>
                <div class="col-md-4">
                    <img src="img/banner4.png">
                </div>
                <div class="col-md-4">
                    <img src="img/banner4.png">
                </div>
            </div>
        </div>
    </section>

    <section class="on-sale" id="on-sale">
        <div class="container" style="background-color: lightblue;padding-bottom:10px">
            <div class="title-box">
                <h2>On Sale</h2>
            </div>
            <div class="row justify-content-start">
            <?php
                $sql = "SELECT * FROM san_pham ORDER BY RAND() LIMIT 6";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // Hiển thị dữ liệu
                    while($row = $result->fetch_assoc()) { ?>
                        
                            <div class="col-2 my-2">
                                <form class="card" style="width: 12rem;" method="post" action="index.php?id=<?= $row['id'] ?>">
                                    <a href="index.php?action=ct&id=<?= $row['id'] ?>" name="detail">
                                        <img src="<?= $row["img"] ?>" class="card-img-top" style="width:10rem;display:flex;margin: 10px auto;">
                                    </a>
                                    <input type="hidden" name="img" value="<?= $row['img'] ?>">
                                    <div class="card-body" style="height:14rem">
                                        <p class="card-text " ><?= $row['ten_san_pham'] ?></p>
                                        <input type="hidden" name="name" value="<?= $row['ten_san_pham'] ?>">
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
    <div class="gopy" id="gop-y">
        <div class="container">
            <div class="mb-3">
                <label for="" class="form-label">Tên</label>
                <input type="text" class="form-control" id="" >
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" id="" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Góp ý</label>
                <textarea class="form-control" id="" rows="3"></textarea>
            </div>
        </div>
    </div>
    
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
<?php
    require_once 'component\database.php';
    session_start();
    if (isset($_POST['mua']) && isset($_SESSION['name'])) {
        if (isset($_SESSION['cart'])) {
            $session_arr_id = array_column($_SESSION['cart'],'id');
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:white">
    <?php include 'navbar.php'; ?>
    <div class="container" style="margin-top:20px">
        <?php
            if (isset($_POST['mua']) && isset($_SESSION['name'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>   Đã thêm vào giỏ hàng</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }
            if (!isset($_SESSION['name'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng  </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }
        ?>
    </div>
    <section class="detail">
        <div class="container-xl" >
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
                                
                                <form class="col-7 mt-2" method="post">
                                    <input type="hidden" name="img" value="<?= $row['img'] ?>">
                                    <h3><?=$row['ten_san_pham']?></h3>
                                    <input type="hidden" name="name" value="<?= $row['ten_san_pham'] ?>">
                                    <h1 style="color:blue"><?= number_format($row["gia"]) ?>đ</h1>
                                    <input type="hidden" name="gia" value="<?= $row['gia'] ?>">
                                    <div class="row" >
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
                                            <input type="submit" name="mua" class="btn btn-primary col" style="width:80px"  value="Mua"></input>
                                        </div>
                                    </div>
                                </form>
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

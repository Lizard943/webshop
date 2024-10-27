<?php
    require_once 'component\database.php';
    require_once 'filter.php';
    require_once 'buy.php';
    $_SESSION['sql'] = 'SELECT * FROM san_pham';
    if (isset($_GET['action'])){
        if ($_GET['action'] == 'ct'){
            $_SESSION["detail"] = $_GET['id'];
            header("Location:details.php");                     
        }
    }
    if (isset($_GET['search'])){
        $_SESSION['sql'] = 'SELECT * FROM san_pham WHERE ten_san_pham LIKE \'%'.$_GET['search'].'%\' ';
    }
    if (isset($_GET['muc'])){
        $_SESSION['sql'] = chondanhmuc($_GET['muclon'],$_GET['muc']);
    }
    if (isset($_POST['gia'])){
        if ($_POST['gia'] == 'cao'){
            $_SESSION['sql'] .= " ORDER BY gia DESC";
        }
        if ($_POST['gia'] == 'thap'){
            $_SESSION['sql'] .= " ORDER BY gia ASC";
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'?>
    
    <div class="thongke">
        <div class="container mt-3">
            <div class="tk">
                <h5>Tìm thấy x sản phẩm</h5>
            </div>
        </div>
    </div>

    <section id="ds">
        <div class="container mt-3">
            <div class="row justify-content-between">
                <form class="boloc col-auto" method="post" action="" style="width:300px">
                    <i class="fas fa-filter ms-1"></i>
                    <label class="ms-1"><strong>Bộ lọc nâng cao</strong></label>
                    <input type="submit" name="">
                    <hr>
                    <div class="gia">
                        <i class="fas fa-filter ms-1"></i>
                        <label class="ms-1"><strong>Sắp xếp theo</strong></label>
                        <ul>
                            <li>
                                <input type="radio" name="gia" value="cao" <?php if (isset($_POST['gia']) && $_POST['gia'] == 'cao'){echo "checked";}?> >
                                <label>Giá cao</label>
                            </li>
                            <li>
                                <input type="radio" name="gia" value="thap" <?php if (isset($_POST['gia']) && $_POST['gia'] == 'thap'){echo "checked";}?> >
                                <label>Giá thấp</label>
                            </li>
                        </ul>
                    </div>
                </form>  
                <div class="danhsach col-9">
                    <h4>Danh sách sản phẩm</h4>
                    <div class="row justify-content-start">
                        <?php
                            $sql = $_SESSION['sql'];
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // Hiển thị dữ liệu
                                while($row = $result->fetch_assoc()) { ?>
                                    
                                        <div class="col-3 my-2">
                                            <div class="card" style="width: 14rem;">
                                                
                                                <a href="index.php?action=ct&id=<?= $row['id'] ?>" name="detail">
                                                    <?=checksale($row['id'],$conn)?>
                                                    <img src="<?= $row["img"] ?>" class="card-img-top" style="width:10rem;display:flex;margin: 10px auto;">
                                                </a>
                                                <input type="hidden" name="img" value="<?= $row['img'] ?>">
                                                <div class="card-body" style="height:12rem">
                                                    <p class="card-text " ><?= $row['ten_san_pham'] ?></p>
                                                    <input type="hidden" name="name" value="<?= $row['ten_san_pham'] ?>">
                                                    <div class="row justify-content-between" style="position:absolute;bottom:10px;">
                                                        <p class="col" style="color:red;font-weight:bold;display:flex;margin: auto 0;" name="gia"><?= tinhgia($row['id'],$row["gia"],$conn) ?>đ</p>
                                                        <p class="col" style="color:gray;display:flex;margin: auto 0px;" name="gia"><s><?= number_format($row["gia"]) ?>đ</s></p>
                                                        <input type="hidden" name="gia" value="<?= $row['gia'] ?>">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                            <?php   }
                            } 
                         ?>
                    
                    </div>
                </div>
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
    <?php unset($_SESSION['sql']) ?>
</body>
</html>
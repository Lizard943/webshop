<?php
    require_once 'component\database.php';
    session_start();
    if (isset($_GET['muc'])){
        if ($_GET['muc'] == 1){
            $_SESSION['sql'] = "WHERE danh_muc = 'Thận, tiền liệt tuyến' ";
        }
    }
    if (isset($_GET['gia'])){
        if ($_GET['gia'] == 'cao'){
            $_SESSION['sql'] = " ORDER BY gia DESC";
        }
        if ($_GET['gia'] == 'thap'){
            $_SESSION['sql'] = " ORDER BY gia ASC";
        }
    }

    function dem($conn,$t){
        $sql = "SELECT COUNT(*) FROM san_pham " . $t;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row["COUNT(*)"];
        } else {
            echo "0";
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
    
</head>
<body>
    <?php include 'navbar.php'?>
    
    <div class="thongke">
        <div class="container mt-3">
            <div class="tk">
                <h5>Tìm thấy <?=dem($conn,$_SESSION['sql'])?> sản phẩm</h5>
            </div>
        </div>
    </div>

    <section id="ds">
        <div class="container mt-3">
            <div class="row justify-content-between">
                <form class="boloc col-auto" method="get" action="list.php" style="width:300px">
                    <i class="fas fa-filter ms-1"></i>
                    <label class="ms-1"><strong>Bộ lọc nâng cao</strong></label>
                    <input type="submit" name="">
                    <hr>
                    <div class="gia">
                        <i class="fas fa-filter ms-1"></i>
                        <label class="ms-1"><strong>Sắp xếp theo</strong></label>
                        <ul>
                            <li>
                                <input type="radio" name="gia" value="cao" <?php if (isset($_GET['gia']) && $_GET['gia'] == 'cao'){echo "checked";}?> >
                                <label>Giá cao</label>
                            </li>
                            <li>
                                <input type="radio" name="gia" value="thap" <?php if (isset($_GET['gia']) && $_GET['gia'] == 'thap'){echo "checked";}?> >
                                <label>Giá thấp</label>
                            </li>
                        </ul>
                    </div>
                    <div class="gia">
                        <i class="fas fa-filter ms-1"></i>
                        <label class="ms-1"><strong>Bộ lọc nâng cao</strong></label>
                        <ul>
                            <li>
                                <input type="radio" name="fruit" value="apple">
                                <label for="apple">Táo</label>
                            </li>
                            <li>
                                <input type="radio" name="fruit" value="banana">
                                <label for="banana">Chuối</label>
                            </li>
                            <li>
                                <input type="radio" name="fruit" value="orange">
                                <label for="orange">Cam</label>
                            </li>
                        </ul>
                    </div>
                    <div class="gia">
                        <i class="fas fa-filter ms-1"></i>
                        <label class="ms-1"><strong>Bộ lọc nâng cao</strong></label>
                        <ul>
                            <li>
                                <input type="radio" name="fruit" value="apple">
                                <label for="apple">Táo</label>
                            </li>
                            <li>
                                <input type="radio" name="fruit" value="banana">
                                <label for="banana">Chuối</label>
                            </li>
                            <li>
                                <input type="radio" name="fruit" value="orange">
                                <label for="orange">Cam</label>
                            </li>
                        </ul>
                    </div>
                    <div class="gia">
                        <i class="fas fa-filter ms-1"></i>
                        <label class="ms-1"><strong>Bộ lọc nâng cao</strong></label>
                        <ul>
                            <li>
                                <input type="radio" name="fruit" value="apple">
                                <label for="apple">Táo</label>
                            </li>
                            <li>
                                <input type="radio" name="fruit" value="banana">
                                <label for="banana">Chuối</label>
                            </li>
                            <li>
                                <input type="radio" name="fruit" value="orange">
                                <label for="orange">Cam</label>
                            </li>
                        </ul>
                    </div>  

                </form>  
                <div class="danhsach col-9">
                    <h4>Danh sách sản phẩm</h4>
                    <div class="row justify-content-start">
                        <?php
                            $sql = "SELECT * FROM san_pham " .$_SESSION['sql'];
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // Hiển thị dữ liệu
                                while($row = $result->fetch_assoc()) { ?>
                                    
                                        <div class="col-3 my-2">
                                            <form class="card" style="width: 14rem;" method="post" action="list.php?id=<?= $row['id'] ?>">
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
                                                        <input type="submit" name="mua" class="btn btn-primary col" style="width:100px;margin-left:10px"  value="Mua"></input>
                                                    </div>
                                                </div>
                                            </form>
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
</body>
</html>
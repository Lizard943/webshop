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
                    'sl' => $_POST['sl']
                    
                );
                $_SESSION['cart'][] = $_sestion_array;
            }
            else {
                foreach ($_SESSION['cart'] as $key => $item){
                    if ($item['id'] == $_GET['id']){
                        $_SESSION['cart'][$key]['sl'] += $_POST['sl'];
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
                'sl' => $_POST['sl']
                
            );
            $_SESSION['cart'][] = $_sestion_array;
        } 
    }
    function title($conn){
        if (isset($_SESSION['detail'])){
            $choose = $_SESSION['detail'];
            $sql = "SELECT * FROM san_pham WHERE id = $choose";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            return $row['ten_san_pham'];
        }
        return "Sản phẩm";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=title($conn)?></title>
    <link rel="icon" href="img/medical.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="margin-top:20px;">
        <?php
            if (isset($_POST['mua']) && isset($_SESSION['name'])) { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
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
            <div class="border rounded " style="background-color:white">
                <div class="row ms-1">
                    <?php
                        if (isset($_SESSION['detail'])){
                            $choose = $_SESSION['detail'];
                            $sql = "SELECT * FROM san_pham WHERE id = $choose";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){?>
                                <div class="col-lg-5">
                                    <?=checksale($row['id'],$conn)?>
                                    <img src="<?=$row['img']?>" style="width: 30rem;display:flex;margin: 10px auto;">
                                </div>
                                
                                <form class="col-lg-7 mt-2" method="post">
                                    
                                    <input type="hidden" name="img" value="<?= $row['img'] ?>">
                                    <h3><?=$row['ten_san_pham']?></h3>
                                    <input type="hidden" name="name" value="<?= $row['ten_san_pham'] ?>">
                                    <div class="row justify-content-start">
                                        <h1 class="col-3 " style="color:blue"><?= number_format(tinhgia($row['id'],$row["gia"],$conn)) ?>đ</h1>
                                        <h3 class="col-3 ms-2 mt-2" style="color:gray"><s><?= number_format($row["gia"]) ?>đ</s></h3>
                                    </div>
                                    
                                    <input type="hidden" name="gia" value="<?= tinhgia($row['id'],$row["gia"],$conn) ?>">
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
                                                <input type="number" name="sl" class="form-control" min=1 value="1" style="width: 50px;">
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

    <section class="chitiet mt-4">
        <div class="container-xl">
            <div class="border rounded p-4" style="background-color:white">
                <h4>Thông tin chi tiết</h4>
                <?php
                    $sql = "SELECT * FROM san_pham WHERE id = $choose";
                    $result = $conn->query($sql);
                    if ($result->num_rows>0){ 
                        $item = $result->fetch_assoc();
                    ?>
                        <table class="table table-light table-striped-columns border">
                            <tbody>
                                <tr>
                                    <td style="width: 20%;">Tên sản phẩm</td>
                                    <td> <?= $item['ten_san_pham']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Danh mục</td>
                                    <td> <?= $item['danh_muc']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Quy cách</td>
                                    <td> <?= $item['quy_cach']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Nhà sản xuất</td>
                                    <td> <?= $item['nha_san_xuat']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Nước sản xuất</td>
                                    <td> <?= $item['nuoc_san_xuat']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Thành phần</td>
                                    <td> <?= $item['thanh_phan']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Công dụng</td>
                                    <td> <?= $item['cong_dung']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Đối tượng sử dụng</td>
                                    <td> <?= $item['doi_tuong_su_dung']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Cách sử dụng</td>
                                    <td> <?= $item['cach_su_dung']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Thời hạn sử dụng</td>
                                    <td> <?= $item['thoi_han_su_dung']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Bảo quản</td>
                                    <td> <?= $item['bao_quan']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Lưu ý khi sử dụng</td>
                                    <td> <?= $item['luu_y_khi_su_dung']?> </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Số đăng ký</td>
                                    <td> <?= $item['so_dang_ky']?> </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php }
                ?>
                
            </div>
            
        </div>
    </section>


</body>
</html>

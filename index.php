<?php
require_once 'component\database.php';
session_start();
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'ct') {
        $_SESSION["detail"] = $_GET['id'];
        header("Location:details.php?id=" . $_SESSION["detail"]);
    }
}
if (isset($_POST['gui'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sql = "INSERT INTO feedback (userid ,ngay_gui ,tieude, gopy) VALUES ('" . $_SESSION['userid'] . "','" . date('H:i d/m/Y') . "', '" . $_POST['tieude'] . "', '" . $_POST['fback'] . "');";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Lỗi: "  . mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Store</title>
    <link rel="icon" href="img/medical.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <?php include 'menu.php'; ?>
        <div class="slider">
            <div id="slider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
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
    <div class="recommended mt-5" id="recommended" style="background-color: lightgreen;padding-bottom:10px">
        <div class="container">
            <div class="title-box">
                <h2>Đề xuất hôm nay</h2>
            </div>
            <div class="row justify-content-start">
                <?php
                $sql = "SELECT * FROM san_pham ORDER BY RAND() LIMIT 6";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>

                        <div class="col-2 my-2">
                            <form class="card" style="width: 12rem;" method="post" action="index.php?id=<?= $row['id'] ?>">
                                <a href="index.php?action=ct&id=<?= $row['id'] ?>">
                                    <img src="<?= $row["img"] ?>" class="card-img-top" style="width:10rem;display:flex;margin: 10px auto;">
                                </a>
                                <input type="hidden" name="img" value="<?= $row['img'] ?>">
                                <div class="card-body" style="height:14rem">
                                    <p class="card-text "><?= $row['ten_san_pham'] ?></p>
                                    <input type="hidden" name="name" value="<?= $row['ten_san_pham'] ?>">
                                    <div class="row justify-content-between" style="position:absolute;bottom:10px;">
                                        <p class="col" style="color:red;font-weight:bold;display:flex;" name="gia"><?= number_format(tinhgia($row['id'], $row["gia"], $conn)) ?>đ</p>
                                        <p class="col" style="color:gray;display:flex;" name="gia"><s><?= number_format($row["gia"]) ?>đ</s></p>
                                        <input type="hidden" name="gia" value="<?= $row['gia'] ?>">
                                    </div>
                                </div>
                            </form>
                        </div>

                <?php   }
                } else {
                    echo "0 results";
                } ?>

            </div>
            <img src="img/sub_banner_d327142f93.png" style="margin-top:20px;width:inherit">
        </div>
    </div>

    <div class="on-sale" id="on-sale" style="background-color: pink;padding-bottom:10px">
        <div class="container">
            <div class="title-box">
                <h2>On Sale</h2>
            </div>
            <div class="row justify-content-start">
                <?php
                $sql = "SELECT * FROM san_pham WHERE id IN (SELECT id FROM sale) ORDER BY RAND() LIMIT 6";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Hiển thị dữ liệu
                    while ($row = $result->fetch_assoc()) { ?>

                        <div class="col-2 my-2">
                            <form class="card" style="width: 12rem;" method="post" action="index.php?id=<?= $row['id'] ?>">
                                <?= checksale($row['id'], $conn) ?>
                                <a href="index.php?action=ct&id=<?= $row['id'] ?>" name="detail">
                                    <img src="<?= $row["img"] ?>" class="card-img-top" style="width:10rem;display:flex;margin: 10px auto;">
                                </a>
                                <input type="hidden" name="img" value="<?= $row['img'] ?>">
                                <div class="card-body" style="height:14rem">
                                    <p class="card-text "><?= $row['ten_san_pham'] ?></p>
                                    <input type="hidden" name="name" value="<?= $row['ten_san_pham'] ?>">
                                    <div class="row" style="position:absolute;bottom:10px;">
                                        <p class="col" style="color:red;font-weight:bold;" name="gia"><?= number_format(tinhgia($row['id'], $row["gia"], $conn)) ?>đ</p>
                                        <p class="col" style="color:gray;" name="gia"><s><?= number_format($row["gia"]) ?>đ</s></p>
                                        <input type="hidden" name="gia" value="<?= $row['gia'] ?>">
                                    </div>
                                </div>
                            </form>
                        </div>

                <?php   }
                } else {
                    echo "0 results";
                } ?>

            </div>

            <img src="img/sub_banner_d327142f93.png" style="margin-top:20px;width:inherit">
        </div>
    </div>

    <div class="best-seller" id="best-seller" style="background-color: lightyellow;padding-bottom:10px">
        <div class="container">
            <div class="title-box">
                <h2>Bán chạy</h2>
            </div>
            <div class="row justify-content-start">
                <?php
                $sql = "SELECT * FROM san_pham WHERE id IN (SELECT o.id_san_pham as id
                        FROM order_items o inner join orders os on os.id = o.order_id
                        WHERE os.status != 2 GROUP BY o.id_san_pham ) ORDER BY RAND() LIMIT 6";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Hiển thị dữ liệu
                    while ($row = $result->fetch_assoc()) { ?>

                        <div class="col-2 my-2">
                            <form class="card" style="width: 12rem;" method="post" action="index.php?id=<?= $row['id'] ?>">
                                <a href="index.php?action=ct&id=<?= $row['id'] ?>" name="detail">
                                    <img src="<?= $row["img"] ?>" class="card-img-top" style="width:10rem;display:flex;margin: 10px auto;">
                                </a>
                                <input type="hidden" name="img" value="<?= $row['img'] ?>">
                                <div class="card-body" style="height:14rem">
                                    <p class="card-text "><?= $row['ten_san_pham'] ?></p>
                                    <input type="hidden" name="name" value="<?= $row['ten_san_pham'] ?>">
                                    <div class="row" style="position:absolute;bottom:10px;">
                                        <p class="col" style="color:red;font-weight:bold;" name="gia"><?= number_format(tinhgia($row['id'], $row["gia"], $conn)) ?>đ</p>
                                        <p class="col" style="color:gray;" name="gia"><s><?= number_format($row["gia"]) ?>đ</s></p>
                                        <input type="hidden" name="gia" value="<?= $row['gia'] ?>">

                                    </div>
                                </div>
                            </form>
                        </div>

                <?php   }
                } else {
                    echo "0 results";
                } ?>

            </div>
            <img src="img/sub_banner_d327142f93.png" style="margin-top:20px;width:inherit">
        </div>
    </div>


    <div class="feedback" id="feedback">
        <div class="container">
            <form method="post" action="index.php">
                <div class="title-box">
                    <h2>Góp ý</h2>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" name="tieude" placeholder="Tiêu đề">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Góp ý</label>
                            <textarea class="form-control" rows="7" name="fback"></textarea>
                        </div>
                        <div class="mb-3">
                            <?php if (!isset($_SESSION['name'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong> Bạn cần đăng nhập để góp ý </strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } else {?>
                                <button type="submit" class="btn btn-primary" name="gui">Gửi</button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mapswrapper">
                            <iframe width="635" height="350" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q=Tr%C6%B0%E1%BB%9Dng%20%C4%90%E1%BA%A1i%20h%E1%BB%8Dc%20kinh%20t%E1%BA%BF%20k%E1%BB%B9%20thu%E1%BA%ADt%20c%C3%B4ng%20ngh%E1%BB%87p%20l%C4%A9nh%20nam&zoom=15&maptype=roadmap"></iframe>
                            <a href="https://www.taxuni.com/new-york-tax-brackets/">New York Tax Brackets</a>
                            <style>
                                .mapswrapper {
                                    background: #fff;
                                    position: relative
                                }

                                .mapswrapper iframe {
                                    border: 0;
                                    position: relative;
                                    z-index: 2
                                }

                                .mapswrapper a {
                                    color: rgba(0, 0, 0, 0);
                                    position: absolute;
                                    left: 0;
                                    top: 0;
                                    z-index: 0
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include "footer.php" ?>
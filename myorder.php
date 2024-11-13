<?php
require_once 'component/database.php';
session_start();
require_once 'auth.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của bạn</title>
    <link rel="icon" href="img/medical.png" type="image/png">
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
                        if (isset($_SESSION['name'])) { ?>
                            <a class="nav-link" href="#"><?= $_SESSION['name'] ?></a>
                        <?php }
                        ?>
                    </li>

                    <li class="nav-item">
                        <?php
                        if (!isset($_SESSION['name'])) { ?>
                            <a class="nav-link" href="loginindex.php">Login</a>
                        <?php } else { ?>
                            <a class="nav-link" href="logout.php">Đăng xuất</a>
                        <?php }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <span class="fs-3">Đơn hàng chờ tiếp nhận</span>
                            <table class="table table-bordered table-striped border-primary">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>SĐT</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Thành Tiền</th>
                                        <th>Ngày</th>
                                        <th>Trạng thái</th>
                                        <th>Chi Tiết</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM orders WHERE status = 0 and user_id = ".$_SESSION['userid']." ORDER BY id DESC";
                                    $result = $conn->query($sql);
                                    $count = 1;
                                    if ($result->num_rows > 0) {
                                        while ($item = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td> <?= $count ?> </td>
                                                <td> <?= $item['name']; ?> </td>
                                                <td> <?= $item['sdt']; ?> </td>
                                                <td> <?= $item['ma_don_hang']; ?> </td>
                                                <td> <?= number_format($item['total'], 0, ',', '.') ?> đ </td>
                                                <td> <?= $item['time']; ?> </td>
                                                <td>
                                                    <?php
                                                    if ($item['status'] == 0) {
                                                        echo "Đang xử lý";
                                                    } else if ($item['status'] == 1) {
                                                        echo "Thành công";
                                                    } else if ($item['status'] == 2) {
                                                        echo "Huỷ đơn hàng";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="vieworder.php?ma=<?= $item['ma_don_hang']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="8"> Không có đơn hàng nào </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="">
                            <span class="fs-3">Đơn hàng đã giao</span>
                            <table class="table table-bordered table-striped border-warning">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>SĐT</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Thành Tiền</th>
                                        <th>Ngày</th>
                                        <th>Trạng thái</th>
                                        <th>Chi Tiết</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM orders WHERE status = 1 and user_id = ".$_SESSION['userid']." ORDER BY id DESC";
                                    $result = $conn->query($sql);
                                    $count = 1;
                                    if ($result->num_rows > 0) {
                                        while ($item = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td> <?= $count ?> </td>
                                                <td> <?= $item['name']; ?> </td>
                                                <td> <?= $item['sdt']; ?> </td>
                                                <td> <?= $item['ma_don_hang']; ?> </td>
                                                <td> <?= number_format($item['total'], 0, ',', '.') ?> đ </td>
                                                <td> <?= $item['time']; ?> </td>
                                                <td>
                                                    <?php
                                                    if ($item['status'] == 0) {
                                                        echo "Đang xử lý";
                                                    } else if ($item['status'] == 1) {
                                                        echo "Thành công";
                                                    } else if ($item['status'] == 2) {
                                                        echo "Huỷ đơn hàng";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="vieworder.php?ma=<?= $item['ma_don_hang']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="8"> Không có đơn hàng nào </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="">
                            <span class="fs-3">Đơn hàng đã huỷ</span>
                            <table class="table table-bordered table-striped border-danger">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>SĐT</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Thành Tiền</th>
                                        <th>Ngày</th>
                                        <th>Trạng thái</th>
                                        <th>Chi Tiết</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM orders WHERE status = 2 and user_id = ".$_SESSION['userid']." ORDER BY id DESC";
                                    $result = $conn->query($sql);
                                    $count = 1;
                                    if ($result->num_rows > 0) {
                                        while ($item = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td> <?= $count ?> </td>
                                                <td> <?= $item['name']; ?> </td>
                                                <td> <?= $item['sdt']; ?> </td>
                                                <td> <?= $item['ma_don_hang']; ?> </td>
                                                <td> <?= number_format($item['total'], 0, ',', '.') ?> đ </td>
                                                <td> <?= $item['time']; ?> </td>
                                                <td>
                                                    <?php
                                                    if ($item['status'] == 0) {
                                                        echo "Đang xử lý";
                                                    } else if ($item['status'] == 1) {
                                                        echo "Thành công";
                                                    } else if ($item['status'] == 2) {
                                                        echo "Huỷ đơn hàng";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="vieworder.php?ma=<?= $item['ma_don_hang']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="8"> Không có đơn hàng nào </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
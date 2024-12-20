<?php include "header.php" ?>
<?php
if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
    $sql = "SELECT * FROM orders WHERE ma_don_hang = '$ma'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        echo "0 kết quả";
    }
} else {
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sta = $_POST['status'];
    $sql = "UPDATE orders SET status = '$sta' WHERE ma_don_hang = '$ma'";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được cập nhật thành công";
    } else {
        echo "Lỗi khi cập nhật: " . $conn->error;
    }
}
?>
<div class="row py-2">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-3">Xem Đơn Hàng</span>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Thông Tin</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Mã đơn hàng</label>
                                            <div class="border p-1">
                                                <?= $data['ma_don_hang']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Tên</label>
                                            <div class="border p-1">
                                                <?= $data['name']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">SĐT</label>
                                            <div class="border p-1">
                                                <?= $data['sdt']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Địa Chỉ</label>
                                            <div class="border p-1">
                                                <?= $data['address']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Lời nhắn</label>
                                            <div class="border p-1">
                                                <?= $data['comment']; ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h4>Chi Tiết Đặt Hàng</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sản Phẩm</th>
                                                <th>Giá</th>
                                                <th>SL</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php

                                            $order_query = dsitem($ma);
                                            $order_query_run = mysqli_query($conn, $order_query);
                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                            ?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="../img/<?= $item['img']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                            <?= $item['name']; ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <p><?= number_format($item['gia'], 0, ',', '.') ?>đ</p>
                                                        </td>
                                                        <td class="align-middle">
                                                            <p><?= $item['sl']; ?></p>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5>Tổng Tiền : <span class="float-right fw-bold"><?= number_format($data['total'], 0, ',', '.') ?> đ</span></h5>
                                    <hr>
                                    <form method="post" action="" class="border p-1 mb-3">
                                        <label class="fw-bold">Phương Thức Thanh Toán</label>
                                        <div class="border p-1 mb-3">
                                            Thanh toán tại nhà
                                        </div>

                                        <label class="fw-bold">Trạng Thái</label>
                                        <div class="border p-1 mb-3">

                                            <select name="status">
                                                <option value="0" <?php if ($data['status'] == 0) echo "selected"; ?>>Đang xử lý</option>
                                                <option value="1" <?php if ($data['status'] == 1) echo "selected"; ?>>Thành công</option>
                                                <option value="2" <?php if ($data['status'] == 2) echo "selected"; ?>>Huỷ đơn hàng</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
<?php include "header.php" ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_user WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        echo "0 kết quả";
    }
} else {
    die();
}
?>
<div class="row py-2">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-3">Thông tin tài khoản</span>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Thông Tin</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Tên</label>
                                            <div class="border p-1">
                                                <?= $data['name'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['username'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="fw-bold">SĐT</label>
                                            <div class="border p-1">
                                                <?= $data['sdt'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="fw-bold">Địa Chỉ</label>
                                            <div class="border p-1">
                                                <?= $data['address'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="fw-bold">Role</label>
                                            <div class="border p-1">
                                                <?= $data['role']==1? "Admin":"Khách hàng"?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <h4>Các đơn hàng đã đặt</h4>
                                    <hr>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã Đơn Hàng</th>
                                                <th>Thành Tiền</th>
                                                <th>Ngày</th>
                                                <th>Trạng thái</th>
                                                <th>Chi Tiết</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM orders WHERE user_id = ".$_GET['id']." ORDER BY id DESC";
                                            $result = $conn->query($sql);
                                            $count = 1;
                                            if ($result->num_rows > 0) {
                                                while ($item = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td> <?= $count ?> </td>
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
                                                            <a href="admin-ordersdetail.php?ma=<?= $item['ma_don_hang']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $count++;
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5"> Bạn chưa đặt đơn hàng nào </td>
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
        </div>
    </div>
</div>
<?php include "footer.php" ?>
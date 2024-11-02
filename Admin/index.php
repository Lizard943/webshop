<?php include "header.php" ?>

<div class="row gy-3">
    <div class="col-sm-6 col-xl-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <i class="fs-5 bi bi-currency-dollar"></i>
                <span class="h5 card-title">Doanh thu</span>

                <h4 class="mt-1"><?= number_format(doanhthu($conn)) ?>đ</h4>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <i class="fs-5 bi bi-receipt"></i>
                <span class="h5 card-title">Đơn hàng</span>

                <h4 class="mt-1"><?= number_format(donhang($conn)) ?></h4>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <i class="fs-5 bi bi-person-fill"></i>
                <span class="h5 card-title">Tài khoản</span>

                <h4 class="mt-1"><?= number_format(taikhoan($conn)) ?></h4>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <i class="fs-5 bi bi-inbox"></i>
                <span class="h5 card-title">Góp ý</span>

                <h4 class="mt-1"><?= number_format(gopy($conn)) ?></h4>
            </div>
        </div>
    </div>

</div>
<div class="mt-3">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Đơn Hàng</th>
                <th>Thành Tiền</th>
                <th>Ngày</th>
                <th>Chi Tiết</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM orders ";
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
                            <a href="vieworder.php?ma=<?= $item['ma_don_hang']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
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
        
<?php include "footer.php" ?>
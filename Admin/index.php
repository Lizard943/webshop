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
                <span class="h5 card-title">Đơn hàng chờ xử lý</span>

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
    <h3>Sản phẩm bán chạy</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Doanh thu</th>
                <th>Chi tiết sản phẩm</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT s.id,s.img,s.ten_san_pham,sum(o.sl) as soluong,sum(o.gia*o.sl) as tong 
                    FROM order_items o left join san_pham s on s.id = o.id_san_pham inner join orders os on os.id = o.order_id
                    WHERE os.status != 2 GROUP BY s.id ORDER BY soluong DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($item = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td> <?= $item['id'] ?> </td>
                        <td> <img src="../img/<?= $item['img'] ?>" width="50px" height="50px"> </td>
                        <td> <?= $item['ten_san_pham'] ?></td>
                        <td> <?= $item['soluong']; ?> </td>
                        <td> <?= number_format($item['tong']) ?>đ</td>
                        <td>
                            <a href="admin-productdetail.php?id=<?= $item['id']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
                        </td>
                    </tr>
                <?php
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
<?php include "header.php" ?>
<div class="">
    <span class="fs-3">Đơn hàng chờ tiếp nhận</span>
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
            $sql = "SELECT * FROM orders WHERE status = 0 ORDER BY id DESC";
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
                                if ($item['status']==0){
                                    echo "Đang xử lý";
                                }
                                else if ($item['status']==1){
                                    echo "Thành công";
                                }
                                else if ($item['status']==2){
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
                    <td colspan="6"> Không có đơn hàng nào </td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>
<div class="">
    <span class="fs-3">Đơn hàng đã giao</span>
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
            $sql = "SELECT * FROM orders WHERE status = 1 ORDER BY id DESC";
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
                                if ($item['status']==0){
                                    echo "Đang xử lý";
                                }
                                else if ($item['status']==1){
                                    echo "Thành công";
                                }
                                else if ($item['status']==2){
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
                    <td colspan="6"> Không có đơn hàng nào </td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>
<div class="">
    <span class="fs-3">Đơn hàng đã huỷ</span>
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
            $sql = "SELECT * FROM orders WHERE status = 2 ORDER BY id DESC";
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
                                if ($item['status']==0){
                                    echo "Đang xử lý";
                                }
                                else if ($item['status']==1){
                                    echo "Thành công";
                                }
                                else if ($item['status']==2){
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
                    <td colspan="6"> Không có đơn hàng nào </td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>
<?php include "footer.php" ?>
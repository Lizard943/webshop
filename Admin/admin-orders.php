<?php include "header.php" ?>
<?php 
    $sqlfilter = "";
    $sqlstatus = "";
    if (isset($_POST['order-search'])){
        if ($_POST['order-filter']==1){
            $sqlfilter = 'and name LIKE \'%'.$_POST['order-textbox'].'%\'';
        }
        else if ($_POST['order-filter']==2){
            $sqlfilter = 'and ma_don_hang LIKE \'%'.$_POST['order-textbox'].'%\'';
        }
        
    }
?>
<div class="">
    <div class="row justify-contents-between align-items-center">
        <div class="col">
            <span class="fs-3">Danh sách sản phẩm</span>
        </div>
        <div class="col-auto">
            <form method="post" action="admin-orders.php">
                <select name="order-filter" style="padding: 2px 0;">
                    <option value="1" <?php if(isset($_POST['order-filter']) && $_POST['order-filter']==1) echo "selected";?> >Tìm theo tên</option>
                    <option value="2" <?php if(isset($_POST['order-filter']) && $_POST['order-filter']==2) echo "selected";?> >Tìm theo mã đơn hàng</option>
                </select>
                <input type="text" name="order-textbox" value="<?php if(isset($_POST['order-textbox'])) echo $_POST['order-textbox'];?>"></input>
                <label>Trạng thái</label>
                <select name="order-status" style="padding: 2px 0;">
                    <option value="0" <?php if(isset($_POST['order-status']) && $_POST['order-status']==0) echo "selected";?>>Tất cả</option>
                    <option value="1" <?php if(isset($_POST['order-status']) && $_POST['order-status']==1) echo "selected";?>>Chờ xử lý</option>
                    <option value="2" <?php if(isset($_POST['order-status']) && $_POST['order-status']==2) echo "selected";?>>Thành công</option>
                    <option value="3" <?php if(isset($_POST['order-status']) && $_POST['order-status']==3) echo "selected";?>>Huỷ đơn hàng</option>
                </select>
                <input type="submit" name="order-search" value="Tìm"></input>
            </form>
        </div>
    </div>
</div>
<hr>
<?php if (!isset($_POST['order-status']) || $_POST['order-status']==1  || $_POST['order-status']==0){ ?>
<div class=""> 
    <table class="table table-bordered table-striped border-primary">
        <thead >
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
            $sql = "SELECT * FROM orders WHERE status = 0 ".$sqlfilter." ORDER BY id DESC";
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
                    <td colspan="8"> Không có đơn hàng nào </td>
                </tr>
            <?php
            }
            
            ?>

        </tbody>
    </table>
</div>
<?php } ?>
<?php if (!isset($_POST['order-status']) || $_POST['order-status']==2  || $_POST['order-status']==0){ ?>
<div class="">
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
            
            $sql = "SELECT * FROM orders WHERE status = 1 ".$sqlfilter." ORDER BY id DESC";
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
                    <td colspan="8"> Không có đơn hàng nào </td>
                </tr>
            <?php
            }
            
            ?>

        </tbody>
    </table>
</div>
<?php } ?>
<?php if (!isset($_POST['order-status']) || $_POST['order-status']==3 || $_POST['order-status']==0){ ?>
<div class="">
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
            if (!isset($_POST['order-status']) || $_POST['order-status']==3 || $_POST['order-status']==0){
            $sql = "SELECT * FROM orders WHERE status = 2 ".$sqlfilter." ORDER BY id DESC";
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
                    <td colspan="8"> Không có đơn hàng nào </td>
                </tr>
            <?php
            }
        }
            ?>

        </tbody>
    </table>
</div>
<?php } ?>
<?php include "footer.php" ?>
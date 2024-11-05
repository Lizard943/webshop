<?php include "header.php"; ?>
<?php 
    $_SESSION['sql'] = 'SELECT * FROM san_pham';
    if (isset($_POST['product-search'])){
        $_SESSION['sql'] = 'SELECT * FROM san_pham WHERE ten_san_pham LIKE \'%'.$_POST['product-name'].'%\' ';
    }
?>
<div class="">
    <div class="row justify-contents-between">
        <div class="col">
            <span class="fs-3">Danh sách sản phẩm</span>
        </div>
        <div class="col-auto">
            <form method="post" action="admin-products.php">
                <input type="text" name="product-name"></input>
                <input type="submit" name="product-search" value="Tìm"></input>
            </form>
        </div>
    </div>
    
    <table class="table table-bordered table-striped border-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá gốc</th>
                <th>Chiết khấu</th>
                <th>Giá bán</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = $_SESSION['sql'];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($item = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td> <?= $item['id']; ?> </td>
                        <td> <img src="<?= $item['img']; ?>" width="50px" height="50px">  </td>
                        <td style="width: 500px; word-wrap: break-word;"> <?= $item['ten_san_pham']; ?> </td>
                        <td> <?= $item['danh_muc']; ?> </td>
                        <td> <?= number_format($item['gia']); ?>đ </td>
                        <td> <?=onsale($item['id'],$conn)?>%</td>
                        <td> <?= number_format(tinhgia($item['id'],$item['gia'],$conn)); ?>đ </td>
                        <td>
                            <a href="admin-productdetail.php?id=<?= $item['id']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
                            <a href="admin-productdetail.php?id=<?= $item['id']; ?>" class="btn btn-danger">Xoá</a>
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
<?php include "footer.php"; ?>
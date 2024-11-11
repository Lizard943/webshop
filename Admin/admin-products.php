<?php include "header.php"; ?>
<?php 
    $_SESSION['sql'] = 'SELECT * FROM san_pham';
    if (isset($_POST['product-search'])){
        if ($_POST['product-filter']!=0){
            $_SESSION['sql'] = 'SELECT * FROM san_pham WHERE ten_san_pham LIKE \'%'.$_POST['product-textbox'].'%\' AND danh_muc IN (SELECT danh_muc FROM muc WHERE id = '.$_POST['product-filter'].') ';
        }
        else {
            $_SESSION['sql'] = 'SELECT * FROM san_pham WHERE ten_san_pham LIKE \'%'.$_POST['product-textbox'].'%\' ';
        }
        if ($_POST['price-filter']==1){
            $_SESSION['sql'] .= ' ORDER BY gia ASC';
        }
        else if ($_POST['price-filter']==2){
            $_SESSION['sql'] .= ' ORDER BY gia DESC';
        }
    }
    if (isset($_GET['action'])){
        if ($_GET['action']=="xoa"){
            $sql = "DELETE FROM san_pham WHERE id = '".$_GET['id']."'";
            mysqli_query($conn,$sql);
        }
        
    }
    
    
?>
<div class="">
    <div class="">
        <?php 
            if (isset($_GET['action'])){
                if ($_GET['action']=="xoa"){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> Bạn vừa xoá sản phẩm có ID là <?=$_GET['id']?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php }
                
            }
        ?>
    </div>
    <div class="row justify-contents-between">
        <div class="col">
            <span class="fs-3">Danh sách sản phẩm</span>
            <a href="admin-addproduct.php" class="btn align-top"><img src="../img/plus.png" width="30px" height="30px"></a>
        </div>
        <div class="col-auto">
            <form method="post" action="admin-products.php">
                <label>Tìm theo tên</label>
                <input type="text" name="product-textbox" ></input>
                <label>Phân loại</label>
                <select name="product-filter" style="padding: 2px 0;">
                    <option value="0"></option>
                    <option value="1">Hỗ trợ điều trị</option>
                    <option value="2">Hỗ trợ tiêu hoá</option>
                    <option value="3">Hỗ trợ làm đẹp</option>
                    <option value="4">Sinh lý - Nội tiết tố</option>
                    <option value="5">Vitamin - Khoáng chất</option>
                    <option value="6">Thần kinh não</option>
                    <option value="7">Sức khoẻ tim mạch</option>
                    <option value="8">Dinh dưỡng</option>
                </select>
                <label>Giá</label>
                <select name="price-filter" style="padding: 2px 0;">
                    <option value="0"></option>
                    <option value="1">Tăng dần</option>
                    <option value="2">Giảm dần</option>   
                </select>
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
                        <td> <img src="../img/<?= $item['img']; ?>" width="50px" height="50px">  </td>
                        <td style="width: 500px; word-wrap: break-word;"> <?= $item['ten_san_pham']; ?> </td>
                        <td> <?= $item['danh_muc']; ?> </td>
                        <td> <?= number_format($item['gia']); ?>đ </td>
                        <td> <?=onsale($item['id'],$conn)?>%</td>
                        <td> <?= number_format(tinhgia($item['id'],$item['gia'],$conn)); ?>đ </td>
                        <td>
                            <a href="admin-productdetail.php?id=<?= $item['id']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
                            <a href="admin-products.php?action=xoa&id=<?= $item['id']; ?>" class="btn btn-danger">Xoá</a>
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
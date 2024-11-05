<?php include "header.php" ?>
<div class="">
    <div class="row justify-contents-between">
        <div class="col">
            <span class="fs-3">Danh sách tài khoản</span>
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
                <th>Tên</th>
                <th>Email</th>
                <th>SDT</th>
                <th>Role</th>
                <th>Chi Tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tbl_user ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($item = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td> <?= $item['id']; ?> </td>
                        <td> <?= $item['name']; ?> </td>
                        <td> <?= $item['username']; ?> </td>
                        <td> <?= $item['sdt']; ?> </td>
                        <td> <?= $item['role']==1? "Admin":"Khách hàng" ?> </td>
                        <td width="200px">
                            <a href="admin-accountdetail.php?id=<?= $item['id']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
                            <a href="admin-accountdetail.php?id=<?= $item['id']; ?>" class="btn btn-danger">Xoá</a>
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
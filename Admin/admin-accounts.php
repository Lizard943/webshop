<?php include "header.php" ?>
<div class="">
    <span class="fs-3">Danh sách tài khoản</span>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>SDT</th>
                <th>Chi Tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id,name,username,sdt FROM tbl_user ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($item = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td> <?= $item['id']; ?> </td>
                        <td> <?= $item['name']; ?> </td>
                        <td> <?= $item['username']; ?> </td>
                        <td> <?= $item['sdt']; ?> </td>
                        <td>
                            <a href="admin-accountdetail.php?id=<?= $item['id']; ?>" class="btn btn-primary">Xem Chi Tiết</a>
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
<?php include "header.php" ?>
<div class="">
    <span class="fs-3">Góp ý</span>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>UserID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Tiêu đề</th>
                <th>Lời góp ý</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT feedback.id,userid, name, username, sdt, tieude,gopy,ngay_gui FROM feedback,tbl_user WHERE tbl_user.id = feedback.userid ORDER BY feedback.id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($item = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td> <?= $item['userid']; ?></td>
                        <td> <?= $item['name']; ?> </td>
                        <td> <?= $item['username']; ?>  </td>
                        <td> <?= $item['sdt']; ?> </td>
                        <td> <?= $item['tieude']; ?> </td>
                        <td> <?= $item['gopy']; ?> </td>
                        <td> <?= $item['ngay_gui']; ?> </td>
                    </tr>
                <?php
                    
                }
            } else {
                ?>
                <tr>
                    <td colspan="5"> Không có góp ý nào </td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>
<?php include "footer.php" ?>
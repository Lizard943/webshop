<?php include "header.php" ?>
<?php
    $sql1 = "SELECT * FROM tbl_user";
    if (isset($_POST['account-search'])){
        if ($_POST['account-filter']==1){
            $sql1 = 'SELECT * FROM tbl_user WHERE name LIKE \'%'.$_POST['account-textbox'].'%\' ';
        }
        else if ($_POST['account-filter']==2){
            $sql1 = 'SELECT * FROM tbl_user WHERE sdt LIKE \'%'.$_POST['account-textbox'].'%\' ';
        }
        else if ($_POST['account-filter']==3){
            $sql1 = 'SELECT * FROM tbl_user WHERE username LIKE \'%'.$_POST['account-textbox'].'%\' ';
        }  
    }
?>
<div class="">
    <div class="row justify-contents-between">
        <div class="col">
            <span class="fs-3">Danh sách tài khoản</span>
        </div>
        <div class="col-auto">
            <form method="post" action="admin-accounts.php">
                <select name="account-filter" style="padding: 2px 0;">
                    <option value="1" <?php if(isset($_POST['account-filter']) && $_POST['account-filter']==1) echo "selected";?>>Tìm theo tên</option>
                    <option value="2" <?php if(isset($_POST['account-filter']) && $_POST['account-filter']==2) echo "selected";?>>Tìm theo SĐT</option>
                    <option value="3" <?php if(isset($_POST['account-filter']) && $_POST['account-filter']==3) echo "selected";?>>Tìm theo Email</option>
                </select>
                <input type="text" name="account-textbox"></input>
                <input type="submit" name="account-search" value="Tìm"></input>
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
            $sql = $sql1;
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
                    <td colspan="5"> Không có dữ liệu </td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>
<?php include "footer.php" ?>
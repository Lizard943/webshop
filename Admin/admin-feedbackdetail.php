<?php include "header.php" ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT feedback.id,userid, name, username, sdt, tieude,gopy FROM feedback,tbl_user WHERE tbl_user.id = feedback.userid AND feedback.id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        echo "0 kết quả";
    }
} else {
    die();
}
?>
<div class="row py-2">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-3">Thông tin tài khoản</span>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Thông Tin</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Tên</label>
                                            <div class="border p-1">
                                                <?= $data['name'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['username'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">SĐT</label>
                                            <div class="border p-1">
                                                <?= $data['sdt'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Địa Chỉ</label>
                                            <div class="border p-1">
                                                <?= $data['tieude'] ?>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
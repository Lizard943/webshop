<?php include "header.php" ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM san_pham WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_array($result);
        $chietkhau = onsale($id,$conn);
    } else {
        echo "0 kết quả";
    }
} else {
    die();
}
function onsale($id,$conn){
    $sql1 = "SELECT * FROM sale WHERE id = '$id'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        $sale = mysqli_fetch_array($result1);
        return $sale['chietkhau'];
    } else {
        return 5;
    }
}
if (isset($_POST['doigia'])) {
    $giamoi = $_POST['giamoi'];
    $ckmoi = $_POST['ckmoi'];
    $sql = "UPDATE san_pham SET gia = $giamoi WHERE id = '$id';";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        header("Location:admin-productdetail.php?id=$id");
    } else {
        echo "Lỗi khi cập nhật: " . $conn->error;
    }
}
?>
<div class="row py-2">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-3">Thông tin Sản phẩm</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?= $data['img']; ?>" width="100%">
                                </div>
                                <div class="col-md-8">
                                    <h4><?= $data['ten_san_pham'] ?> </h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">

                                            <form method="post" action="admin-productdetail.php?id=<?=$id?>">
                                                <div class="text-danger">
                                                    <label class="fs-3 fw-bold">Giá bán:  <?= number_format(tinhgia($id,$data['gia'],$conn)) ?>đ</label>
                                                </div>
                                                <br>
                                                <div class="">
                                                    <label class="fs-5 fw-bold">Giá gốc: </label>
                                                    <input type="text" class="fs-5" name="giamoi" value="<?= $data['gia'] ?>" style="width:150px"></input>
                                                    <label class="fs-5 fw-bold">Chiết khấu : </label>
                                                    <input type="text" class="fs-5" name="ckmoi" value="<?= $chietkhau ?>" style="width:50px"></input>
                                                    <label class="fs-5 fw-bold">%</label>
                                                    <input type="submit" name="doigia" class="btn btn-primary fs-6 ms-3 align-top" value="Cập nhật"></input>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Danh mục</label>
                                            <div class="border p-1">
                                                <?= $data['danh_muc'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Quy cách</label>
                                            <div class="border p-1">
                                                <?= $data['quy_cach'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Nhà sản xuất</label>
                                            <div class="border p-1">
                                                <?= $data['nha_san_xuat'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Nước sản xuất</label>
                                            <div class="border p-1">
                                                <?= $data['nuoc_san_xuat'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Đối tượng sử dụng</label>
                                            <div class="border p-1">
                                                <?= $data['doi_tuong_su_dung'] ?>
                                            </div>
                                        </div>



                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <h4>Thống kê</h4>
                                    <hr>
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
                                            $sql = "SELECT * FROM orders WHERE user_id = " . $_GET['id'];
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
                                                            if ($item['status'] == 0) {
                                                                echo "Đang xử lý";
                                                            } else if ($item['status'] == 1) {
                                                                echo "Thành công";
                                                            } else if ($item['status'] == 2) {
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
                                                    <td colspan="5"> Bạn chưa đặt đơn hàng nào </td>
                                                </tr>
                                            <?php
                                            }

                                            ?>

                                        </tbody>
                                    </table>
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
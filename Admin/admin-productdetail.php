<?php include "header.php" ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM san_pham WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_array($result);
        $chietkhau = onsale($id, $conn);
    } else {
        echo "0 kết quả";
    }
} else {
    die();
}

if (isset($_POST['doigia'])) {
    $giamoi = $_POST['giamoi'];
    $ckmoi = $_POST['ckmoi'];
    $sql = "UPDATE san_pham SET gia = $giamoi WHERE id = '$id';";
    $sql1 = "INSERT INTO sale (id, chietkhau) VALUES ($id,$ckmoi) ON DUPLICATE KEY UPDATE chietkhau = $ckmoi;";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
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
                            <span class="text-white fs-3">Thông tin Sản phẩm ID: <?=$data['id']?></span>
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

                                            <form method="post" action="admin-productdetail.php?id=<?= $id ?>">
                                                <div class="text-danger">
                                                    <label class="fs-3 fw-bold">Giá bán: <?= number_format(tinhgia($id, $data['gia'], $conn)) ?>đ</label>
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
                                    <hr>
                                    <div class="p-4">
                                        <h4>Thông tin chi tiết</h4>
                                        <?php
                                        $sql = "SELECT * FROM san_pham WHERE id = $id";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $item = $result->fetch_assoc();
                                        ?>
                                            <table class="table table-light table-striped-columns border">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 20%;">Tên sản phẩm</td>
                                                        <td> <?= $item['ten_san_pham'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Danh mục</td>
                                                        <td> <?= $item['danh_muc'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Quy cách</td>
                                                        <td> <?= $item['quy_cach'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Nhà sản xuất</td>
                                                        <td> <?= $item['nha_san_xuat'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Nước sản xuất</td>
                                                        <td> <?= $item['nuoc_san_xuat'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Thành phần</td>
                                                        <td> <?= $item['thanh_phan'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Công dụng</td>
                                                        <td> <?= $item['cong_dung'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Đối tượng sử dụng</td>
                                                        <td> <?= $item['doi_tuong_su_dung'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Cách sử dụng</td>
                                                        <td> <?= $item['cach_su_dung'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Thời hạn sử dụng</td>
                                                        <td> <?= $item['thoi_han_su_dung'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Bảo quản</td>
                                                        <td> <?= $item['bao_quan'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Lưu ý khi sử dụng</td>
                                                        <td> <?= $item['luu_y_khi_su_dung'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Số đăng ký</td>
                                                        <td> <?= $item['so_dang_ky'] ?> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php }
                                        ?>

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
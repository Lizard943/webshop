<?php include "header.php" ?>
<?php
if (isset($_POST['them'])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file = $_FILES['image'];
        $uploadDir = "../img/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileName = basename($file['name']);
        $targetFile = $uploadDir . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'png'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $sql = "SELECT * FROM muc WHERE id = ".$_POST['danh_muc'];
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $sql = "INSERT INTO `san_pham` (`ten_san_pham`, `gia`, `img`, `danh_muc`, `quy_cach`, `nha_san_xuat`, `nuoc_san_xuat`, `thanh_phan`, `cong_dung`, `doi_tuong_su_dung`, `cach_su_dung`, `thoi_han_su_dung`, `bao_quan`, `luu_y_khi_su_dung`, `so_dang_ky`) VALUES
                        ('".$_POST['ten_san_pham']."', ".$_POST['gia'].", '".$fileName."','". $row['danh_muc']."','". $_POST['quy_cach']."','". $_POST['nha_san_xuat']."','". $_POST['nuoc_san_xuat']."', '". $_POST['thanh_phan']."','".$_POST['cong_dung']."','".  $_POST['doi_tuong_su_dung']."','".  $_POST['cach_su_dung']."','".  $_POST['thoi_han_su_dung']."','".  $_POST['bao_quan']."','".  $_POST['luu_y_khi_su_dung']."','". $_POST['luu_y_khi_su_dung']."')";
                
            } else {
                echo "Lỗi khi tải lên file.";
            }
        } else {
            echo "Chỉ chấp nhận các định dạng ảnh: JPG, PNG";
        }
    } 
    else {
        echo "Không có file nào được tải lên hoặc có lỗi xảy ra.";
    }
}

?>
<div class="row py-2">
    <div class="container">
        <div class="">
            <?php 
                if (isset($_POST['them'])){
                    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){ mysqli_query($conn,$sql); ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong> Thêm sản phẩm thành công</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }
                    
                }
            ?>
        </div>
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-3">Thêm sản phẩm</span>
                        </div>
                        <div class="card-body">
                            <form method="post" action="admin-addproduct.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="../img/1.png" width="100%">
                                        <label>- Nên chọn ảnh có tỉ lệ 1:1<br>- Các tệp hỗ trợ: JPG, PNG</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="fs-5 fw-bold">
                                            <label>Danh mục</label>
                                            <select name="danh_muc">
                                                <?php 
                                                    $sql = "SELECT * FROM muc";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($item = $result->fetch_assoc()) {
                                                ?>
                                                        <option value="<?=$item['stt']?>"><?=$item['danh_muc']?></option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="fs-5 fw-bold">
                                            <label for="image">Chọn ảnh:</label>
                                            <input type="file" name="image" id="image" accept=".jpg, .png" required>
                                        </div>
                                        <br>
                                        <div class="fs-5 fw-bold">
                                            <label>Giá gốc: </label>
                                            <input type="text" name="gia"  style="width:150px"></input>
                                            <br>
                                            <br>
                                            <input type="submit" name="them" class="btn btn-primary fs-6" value="Thêm"></input>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="p-4">
                                            <h4>Thông tin chi tiết</h4>
                                            <table class="table table-light table-striped-columns border">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 20%;">Tên sản phẩm</td>
                                                        <td style="width: 100%;"><textarea name="ten_san_pham" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Quy cách</td>
                                                        <td style="width: 100%;"> <textarea name="quy_cach" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Nhà sản xuất</td>
                                                        <td style="width: 100%;"> <textarea name="nha_san_xuat" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Nước sản xuất</td>
                                                        <td style="width: 100%;"> <textarea name="nuoc_san_xuat" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Thành phần</td>
                                                        <td style="width: 100%;"> <textarea name="thanh_phan" style="width:inherit"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Công dụng</td>
                                                        <td style="width: 100%;"> <textarea name="cong_dung" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Đối tượng sử dụng</td>
                                                        <td style="width: 100%;"> <textarea name="doi_tuong_su_dung" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Cách sử dụng</td>
                                                        <td style="width: 100%;"> <textarea name="cach_su_dung" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Thời hạn sử dụng</td>
                                                        <td style="width: 100%;"> <textarea name="thoi_han_su_dung" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Bảo quản</td>
                                                        <td style="width: 100%;"> <textarea name="bao_quan" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Lưu ý khi sử dụng</td>
                                                        <td style="width: 100%;"> <textarea name="luu_y_khi_su_dung" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 20%;">Số đăng ký</td>
                                                        <td style="width: 100%;"> <textarea name="so_dang_ky" style="width:inherit"></textarea> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
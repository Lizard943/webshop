<?php
require_once 'component/database.php';
session_start();
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'ct') {
        $_SESSION["detail"] = $_GET['id'];
        header("Location:details.php?id=" . $_SESSION["detail"]);
    }
}
if (isset($_POST['gui'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sql = "INSERT INTO feedback (userid ,ngay_gui ,tieude, gopy) VALUES ('" . $_SESSION['userid'] . "','" . date('H:i d/m/Y') . "', '" . $_POST['tieude'] . "', '" . $_POST['fback'] . "');";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Lỗi: "  . mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Store</title>
    <link rel="icon" href="img/medical.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="tieude" placeholder="Tiêu đề">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Góp ý</label>
                        <textarea class="form-control" rows="7" name="fback"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="gui">Gửi</button>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    

    <?php include "footer.php" ?>
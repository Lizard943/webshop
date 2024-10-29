<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg border-bottom bg-body-tertiary">
        <div class="container">
            <a href="index.php"><img src="img/images.png" height="40" class="me-5"></a>
            <form class="d-flex" action="list.php">
                <input id="search" name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> 
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" >
                    <li class="nav-item" >
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <?php 
                            if (isset($_SESSION['name'])){ ?>
                                <a class="nav-link" href="myorder.php"><?=$_SESSION['name']?></a>
                            <?php }
                        ?>
                    </li>
                    
                    <li class="nav-item">
                        <?php 
                            if (!isset($_SESSION['name'])){ ?>
                                <a class="nav-link" href="loginindex.php">Login</a>
                            <?php } 
                                else { ?>
                                    <a class="nav-link" href="logout.php">Log out</a>
                                <?php }
                            ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="danhmuc">
        <div class="container">
            <div class="btn-group">
                <?php
                    $sql = "SELECT * FROM muclon";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // Hiển thị dữ liệu
                            while($row = $result->fetch_assoc()) {
                                $_SESSION["idmuc"] = $row['id']; 
                                ?>
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $row['ten_muc']?>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                        $sql1 = "SELECT * FROM muc WHERE id = " .$_SESSION['idmuc'];
                                        $result1 = $conn->query($sql1);
                                        if ($result1->num_rows > 0) {
                                            while($row = $result1->fetch_assoc()) {?>
                                                <li><a class="dropdown-item" href="list.php?muclon=<?=$row['id']?>&muc=<?=$row['id_danh_muc']?>"><?=$row['danh_muc']?></a></li>
                                            <?php }
                                        } 
                                    ?>
                                </ul>
                        <?php }
                        } 
                     ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    $sql = "SELECT * FROM sale";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // Hiển thị dữ liệu
        while($row = $result->fetch_assoc()) {
            echo "
                <div class=\"col-md-2 g-6\">
                    <div class=\"card\" style=\"width: 12rem;\">
                        <img src=\"" . $row["img"] . "\" class=\"card-img-top\" style=\"width: 10rem;display:flex;margin: 10px auto;\">
                        <div class=\"card-body\" style=\"height:14rem\">
                            <p class=\"card-text \">" . $row["name"] . "</p>
                            <div class=\"row gx-6\" style=\"position:absolute;bottom:10px\">
                                <p class=\"col\" style=\"color:red;font-weight:bold;display:flex;margin: auto 0;\">" . number_format($row["gia"]) . "đ</p>
                                <a type=\"submit\" class=\"btn btn-primary col\" style=\"width:80px\" name=\"mua\">Mua</a>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
    } 
    else {
        echo "0 results";
    }
?>
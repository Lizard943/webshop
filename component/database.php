<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanthuoc";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    function tinhgia($id,$gia,$conn){
        $sql = "SELECT * FROM sale";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                if ($row['id'] == $id){
                    return $gia*((100-$row['chietkhau'])/100);
                }
            }
            return $gia*((100-5)/100);
        }
    }
    function doanhthu($conn){
        $sql = "SELECT SUM(total) FROM orders";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['SUM(total)'];
        } else {
            
        }
        
    }
    function donhang($conn){
        $sql = "SELECT COUNT(*) FROM orders";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['COUNT(*)'];
        } else {
            
        }
        
    }
    function taikhoan($conn){
        $sql = "SELECT COUNT(*) FROM tbl_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['COUNT(*)'];
        } else {
            
        }
        
    }
    function gopy($conn){
        $sql = "SELECT COUNT(*) FROM feedback";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['COUNT(*)'];
        } else {
            
        }
        
    }
    function checksale($id,$conn){
        $sql = "SELECT * FROM sale";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                if ($row['id'] == $id){
                    echo "<img style=\"z-index:1;width:40px;position:absolute;margin: 10px;\" src=\"img/discount.png\">";
                }
            }
            
        }
    }

    function dsitem($ma){
        return "SELECT
                    san_pham.ten_san_pham AS name,
                    san_pham.img AS img,
                    order_items.sl,
                    order_items.gia
                FROM 
                    order_items
                JOIN 
                    san_pham ON order_items.id_san_pham = san_pham.id
                WHERE 
                    order_items.order_id = (SELECT id FROM orders WHERE ma_don_hang = '".$ma."');";
    }
?>
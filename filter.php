<?php
    function chondanhmuc($idmuc,$iddanhmuc){
        $sql = "SELECT * FROM san_pham WHERE danh_muc IN (SELECT danh_muc FROM muc WHERE id = ".$idmuc." AND id_danh_muc = ".$iddanhmuc.")";
        return $sql;
    }

    function chondanhmucdem($conn,$idmuc,$iddanhmuc){
        $sql = "SELECT COUNT(*) FROM san_pham WHERE danh_muc IN (SELECT danh_muc FROM muc WHERE id = ".$idmuc." AND id_danh_muc = ".$iddanhmuc.")";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                return $row['COUNT(*)'];
            }
        }

    }
?>
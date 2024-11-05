<?php
    function chondanhmuc($idmuc,$iddanhmuc){
        if ($iddanhmuc==0){
            $sql = "SELECT * FROM san_pham WHERE danh_muc IN (SELECT danh_muc FROM muc WHERE id = ".$idmuc.")";
            return $sql;
        }
        $sql = "SELECT * FROM san_pham WHERE danh_muc IN (SELECT danh_muc FROM muc WHERE id = ".$idmuc." AND id_danh_muc = ".$iddanhmuc.")";
        return $sql;
    }

?>
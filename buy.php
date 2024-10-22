<?php
    
    session_start();
    if (isset($_GET['mua']) && isset($_SESSION['name'])) {
        if (isset($_SESSION['cart'])) {
            $session_arr_id = array_column($_SESSION['cart'], 'id');
            if (!in_array($_GET['id'], $session_arr_id)) {
                $_sestion_array = array(
                    'id' => $_GET['id'],
                    'name' => $_POST['name'],
                    'gia' => $_POST['gia'],
                    'img' => $_POST['img'],
                    'sl' => 1
                    
                );
                $_SESSION['cart'][] = $_sestion_array;
            }
            else {
                foreach ($_SESSION['cart'] as $key => $item){
                    if ($item['id'] == $_GET['id']){
                        $_SESSION['cart'][$key]['sl'] +=1;
                    }
                }
            }
        }
        else {
            $_sestion_array = array(
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'gia' => $_POST['gia'],
                'img' => $_POST['img'],
                'sl' => 1
                
            );
            $_SESSION['cart'][] = $_sestion_array;
        } 
    }
    if (isset($_GET['action'])){
        if ($_GET['action'] == 'ct'){
            $_SESSION["detail"] = $_GET['id'];
            header("Location:details.php");                     
        }
    }
    
?>
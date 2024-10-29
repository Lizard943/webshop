<?php
    session_start();
    include_once('component\database.php');

    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `tbl_user` WHERE `username`='$username' AND `password`='$password'";
        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $id = $row['id'];
            $name = $row['name'];
            $username = $row['username'];
            $password = $row['password'];
            $role = $row['role'];

            if ($username == $username && $password == $password && $role == 1) {
                $_SESSION['userid'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header('location:Admin\index.php');
            }

            else if ($username == $username && $password == $password && $role == 0) {
                $_SESSION['userid'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header('location:index.php');
            }
        } 
        
    }
?>
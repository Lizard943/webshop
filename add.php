<?php
    include_once('component/database.php');

    if(isset($_POST['register']))
    {
        if ($_POST['password'] == $_POST['repassword']){
            if (!checkuserexist($_POST['sdt'],$_POST['username'],$conn)){
                $name=$_POST['name'];
                $username=$_POST['username'];
                $pass=$_POST['password'];
                $sdt=$_POST['sdt'];
                $address=$_POST['address'];

                $sql = "INSERT INTO `tbl_user`(`name`, `username`, `sdt`, `address`, `password`,`role`) VALUES ('$name','$username','$sdt','$address','$pass',0)";
                $result=mysqli_query($conn,$sql);
                if($result){ 
                    header('location:loginindex.php');   
                }
                else{
                    die(mysqli_error($conn)) ;
                }
            }
            
        }  
    }

    function checkuserexist($sdt,$username,$conn){
        $sql = "SELECT * FROM tbl_user WHERE sdt = '$sdt' or username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        else {
            return false;
        }
    }
?>

<?php
include('../config/constant_admin.php');
 $ch_id = $_GET['ch_id'];
 $sql ="DELETE FROM `ch` WHERE ch_id = $ch_id";
 $result = mysqli_query($conn,$sql);
 if($result){
    $_SESSION['noti']= "Đã xóa";
    header("location:mana_ch.php");
}else{
    $_SESSION['noti'] =" Lỗi!!!!";
    header("location:mana_ch.php");
 }
?>
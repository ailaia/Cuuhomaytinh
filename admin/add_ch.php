<?php
ob_start();
include('../config/adminheader.php');
include('../config/constant_admin.php');
?>

<section class="container-fluid text-center form-bg py-4">
    <h1 class="fw-bold my-5 fst-italic"> Thêm bài viết </h1>
    <div class="row">
        <div class="col-12">
            <form method = "POST">
                <div class="mb-3">
                    <label class="form-label input-label">Tên dịch vụ</label>
                    <input type="text" class="form-control  input-text" name="ch_Name" id="ch_Name">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Giá</label>
                    <input type="text" class="form-control  input-text" name="ch_price" id="ch_price">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control  input-text" name="ch_day_start" id="ch_day_start">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Ngày kết thúc</label>
                    <input type="date" class="form-control  input-text" name="ch_day_end" id="ch_day_end">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Thời gian diễn ra</label>
                    <input type="text" class="form-control  input-text" name="ch_days" id="ch_days">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Địa điểm</label>
                    <input type="text" class="form-control  input-text" name="ch_location" id="ch_location">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Ảnh</label>
                    <input type="text" class="form-control  input-text" name="img" id="img">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Số điện thoại liên lạc</label>
                    <input type="text" class="form-control  input-text" name="ch_phone_contact" id="ch_phone_contact">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Người phụ trách</label>
                    <input type="text" class="form-control  input-text" name="ch_guild" id="ch_guild">
                </div>
                <div class="mb-3">
                    <label class="form-label input-label">Số lượng chỗ tối đa</label>
                    <input type="text" class="form-control  input-text" name="ch_number" id="ch_number">
                </div>
                <button type="submit" class=" btn btn-primary btn-lg" name="submit">Thêm bài viết</button>
            </form>
        </div>
    </div>
</section>




<?php

if(isset($_POST['submit'])){
    $ch_Name = $_POST['ch_Name'];;
      $ch_price = $_POST['ch_price'];
      $ch_day_start = $_POST['ch_day_start'];
      $ch_day_end = $_POST['ch_day_end'];
      $ch_days = $_POST['ch_days'];
      $ch_location = $_POST['ch_location'];
      $img = $_POST['img'];
      $ch_phone_contact = $_POST['ch_phone_contact'];
      $ch_guild = $_POST['ch_guild'];
      $ch_number = $_POST['ch_number'];
      $sql = "INSERT INTO  ch(ch_Name, ch_price, ch_day_start, ch_day_end, ch_days, ch_location, img, ch_phone_contact, ch_guild, ch_number) VALUE ('$ch_Name', '$ch_price', '$ch_day_start', '$ch_day_end', '$ch_days', '$ch_location', '$img', '$ch_phone_contact', '$ch_guild', '$ch_number')";
      $result = mysqli_query($conn,$sql);
      if($result > 0){
        $_SESSION['noti']= "Đã thêm thành công";
        header("location:mana_ch.php");
    }else{
        $_SESSION['noti'] =" Lỗi!!!!";
      header("location:mana_ch.php");
    }
}
include('../config/adminfooter.php');
?>

?>
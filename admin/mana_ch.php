<?php
include('../config/adminheader.php');
include('../config/constant_admin.php');

?>


<div class="container-fluid ">
    <h1 class="fw-bold my-5 fst-italic"> Danh sách Các Bài Viết</h1>
    <a href="add_ch.php" class=" btn btn-outline-primary">Thêm bài viết</a>
    <?php
   if(isset($_SESSION['noti'])){
      echo $_SESSION['noti'];
      unset($_SESSION['noti']);
    }

    ?>

    <br>
    <table class="table table-info table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên dịch vụ</th>
      <th scope="col">Giá</th>
      <th scope="col">Ngày bắt đầu</th>
      <th scope="col">Ngày kết thúc</th>
      <th scope="col">Địa điểm</th>
      <th scope="col">Ảnh</th>
      <th scope="col">Số điện thoại liên hệ</th>
      <th scope="col">Người Phụ Trách</th>
      <th scope="col">Số lượng lịch</th>
      <th scope="col">Cập nhật</th>
      <th scope="col">Xóa bài viết</th>
    </tr>
  </thead>
  <tbody>
  <?php
  //Truy van 
  $sql ="SELECT * FROM ch";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
      $i = 1;
      while($row = mysqli_fetch_assoc($result)){

  ?>
    <!--hien thi du lieu-->
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['ch_Name']; ?></td>
      <td><?php echo $row['ch_price']; ?></td>
      <td><?php echo $row['ch_day_start']; ?></td>
      <td><?php echo $row['ch_day_end']; ?></td>
      <td><?php echo $row['ch_location']; ?></td>
      <td><?php echo $row['img']; ?></td>
      <td><?php echo $row['ch_phone_contact']; ?></td>
      <td><?php echo $row['ch_guild']; ?></td>
      <td><?php echo $row['ch_number']; ?></td>
      <td><a href="edit_ch.php?ch_id=<?php echo $row['ch_id']; ?> " class="btn btn-outline-success"> Cập nhật  </a></td>
      <td><a href="delete_ch.php?ch_id=<?php echo $row['ch_id']; ?> " class="btn btn-outline-danger"> Xóa Bài Viết</a></td>
    </tr>
    <?php
    $i++;
      }
    }
    ?>
  </tbody>
</table>
</div>



<?php
include('../config/adminfooter.php')

?>
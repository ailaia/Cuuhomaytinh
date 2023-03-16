<?php
        include('config/constant.php');
        include('config/header.php');
?>
<section class=" mt-5 bg-light ">


<h3 class="text-center my-4 fw-bold fs-1">ch du lịch</h3>
<div class=" container  ">

<?php
$search = $_GET['search'];
//Truy vấn bảng ch (có thể dùng booking hoặc tùy)
$sql = "SELECT *FROM ch WHERE ch_name like '%$search%'";
$result = mysqli_query($conn,$sql);
//check xem bảng ch có đc kết nối hay ko
if(mysqli_num_rows($result)>0){
    //ch được kết nối
    while($row = mysqli_fetch_assoc($result)){
        //Get the Values like img,ch_Name,ch_number(lấy giá trị cần dùng)'
        $ch_id= $row['ch_id'];
        $ch_name = $row['ch_Name'];
        $img = $row['img'];
        $ch_number = $row['ch_number'];

?>
<style>
.ch_img{
    width:60%;
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

.fix{
    width:60%;
}
text-center{
    text-align:center;
}


</style>

    <div class=" detailbox ">
        <a href="detail.php?ch_id=<?php echo $ch_id ?> ">
            <img src="<?php echo $img?> " class="card-img-top img-cruv ch_img" alt="... "><!--lấy ảnh từ csdl-->
        </a>
        <div class="card-body ">
            <a href="detail.php?ch_id=<?php echo $ch_id ?> ">
                <h4 class="ch_name text-center ">
                     <?php echo $ch_name?> <!--lấy tên của ch từ csdl-->
                </h4>
            </a>
            <p class="fs-5 fst-italic fw-light text-center">(ch <?php echo $ch_number ?> người)</p><!--lấy số lượng khách của ch từ csdl-->

        </div>
        <div class="form d-flex justify-content-between fix">
            <a href="booking_ch.php?ch_id=<?php echo $ch_id ?>">
                <button type="submit" class=" btn bg-danger text-light fw-bold " style="position:relative;left:320px;">Đặt ngay</button>
            </a>
            <a href="detail.php?ch_id=<?php echo $ch_id ?> ">
            <button type="submit" class=" btn bg-danger text-light fw-bold"style="position:relative;left:197px;">Xem chi tiết</button>
            </a>
        </div>
    </div>
    <?php
    }
}else{
    echo "<p style='font-weight: bold;  margin-left: 450px; color:red; font-size:25px'>   ch của bạn hiện tại không tìm thấy  </p>";
}

?>
</div>

<?php
    include('config/footer.php');

?>
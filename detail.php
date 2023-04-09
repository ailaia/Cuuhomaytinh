<?php
ob_start();
session_start();

include('config/header.php');
include('config/constant.php');

?>


<style>
.ch_detail{
    color: black;
    font-family: "Times New Roman";
  font-size: 110%;
}
img{
    border-radius: 15px;
}
.ch_Name{
    font-size: 200%;
}
.ch_price{
    font-size: 130%;
    font-family: Arial, Helvetica, sans-serif;
}


    
</style>

<!--Tuyen du lieu-->
<?php
                if(isset($_GET['ch_id']))
                $ch_id = $_GET['ch_id'];
                $sql = "SELECT * FROM ch WHERE ch_id=$ch_id";
                $result = mysqli_query($conn,$sql);
                //check xem bảng ch có đc kết nối hay ko
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $ch_id = $row['ch_id'];
                        $ch_Name = $row['ch_Name'];
                        $ch_price = $row['ch_price'];
                        $img = $row['img'];
                        $ch_number = $row['ch_number'];
                        $ch_day_start = $row['ch_day_start'];
                        $ch_day_end = $row['ch_day_end'];
                        $ch_days = $row['ch_days'];
                        $ch_location = $row['ch_location'];
                        $ch_guild = $row['ch_guild'];
                        $ch_detail= $row['ch_detail']
                        //$ch_detail=$row['ch_detail'];
?>

 <div class="container mt-5">
     <h1 class="text-center fw-bold my-4 fst-italic"> Chi tiết bài viết</h1>
        <div class="ch-detail d-flex justify-content-around ">
            <div class= "ch-img ch_detail" style="width:1000px">
                <img src="<?php echo $img?>"  class="img-fluid  img-cruv" alt="">
            </div>
            <div class="product-info bg-light ms-3" style="width: 500px">
                <h4><?php echo $ch_Name ?></h4>
                <p > Bắt đầu: <?php echo $ch_day_start ?>
                <p > Kết thúc: <?php echo $ch_day_end ?>
                <p > Địa điểm:  <?php echo $ch_location ?>
                <p > Số lượng người tối đa: <?php echo $ch_number ?> người </p>
                <p>Hướng dẫn viên: <?php echo $ch_guild ?></p>
                <p><?php echo $ch_detail ?></p>
                <p class="ch_price " >-  <?php echo $ch_price?><span  style="color:red;" >  VNĐ</span>  -</p>
                <a href="booking_ch.php?ch_id=<?php echo $ch_id ?>" >
                    <button type="submit" class=" btn bg-danger text-light fw-bold">Đặt ngay</button>
                </a>


            </div>
        <div class="clear-both">
        <p></p>
        </div>
        </div>

 </div>
 <?php
            }
        }

?>
<!--Tuyen du lieu-->

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  -->

<?php
include('config/footer.php')
?>
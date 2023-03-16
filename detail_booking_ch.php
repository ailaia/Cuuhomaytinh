<?php
session_start();
include('config/header.php');
include('config/constant.php')

?>

<!-- Bắt đầu code -->


    
   
        <?php
        if(isset($_POST["submit"])) {
        $ch_id = $_POST['ch_id'];
        $sql = "SELECT * FROM ch WHERE ch_id = $ch_id";
        $result = mysqli_query($conn,$sql);
        //check xem bảng ch có đc kết nối hay ko
        if(mysqli_num_rows($result)>0){
           
            //ch được kết nối
            $row = mysqli_fetch_assoc($result);
            $ch_id = $row['ch_id'];
            $ch_Name = $row['ch_Name'];
            $img = $row['img'];
            $ch_number = $row['ch_number'];
            $ch_day_start = $row['ch_day_start'];
            $ch_day_end = $row['ch_day_end'];
            $ch_days = $row['ch_days'];
            $ch_location = $row['ch_location'];
            $ch_guild = $row['ch_guild'];

        
        ?>
            <div class="container-sm text-center">
            <h1 class="fs-1 fw-bold fst-italic my-5">Thông tin ch vừa đặt</h1>
            <div class="row d-flex justify-content-between"> 
                        <div class="col ">
                            <a href="#">
                                <img src="<?php echo $img?> " class="img-fluid rounded-3"  alt="... "> <!--lấy ảnh từ csdl-->
                            </a>
                        </div>
                
                        <div class="col bg-light">
                            <h2 class="ch_Name">
                                <?php echo $ch_Name?> <!--lấy tên của ch từ csdl-->
                            </h2>
                            <p > Số lượng người tối đa: <?php echo $ch_number ?> người </p><!--lấy số lượng khách của ch từ csdl-->
                            <p > Bắt đầu: <?php echo $ch_day_start ?>
                            <p > Kết thúc: <?php echo $ch_day_end ?>
                            <p > Địa điểm:  <?php echo $ch_location ?>
                            <p>Hướng dẫn viên: <?php echo $ch_guild ?></p>
                        
                        </div>
            </div>
        </div>
        <?php
            }
        
        ?>
    <?php
            $ch_id = $_POST['ch_id'];
            $guest_id = $_SESSION['guest_id'];
            $booking_guest_name    = $_POST['booking_guest_name'];
            $booking_guest_address = $_POST['booking_guest_address'];
            $booking_guest_number  = $_POST['booking_guest_number'];
            $booking_guest_email   = $_POST['booking_guest_email'];

            $sql ="INSERT INTO `booking_ch`(`ch_id`, `guest_id`, `booking_guest_name`, `booking_guest_address`, `booking_guest_number`,`booking_guest_email`)
            VALUES ($ch_id,$guest_id,'$booking_guest_name', '$booking_guest_address','$booking_guest_number','$booking_guest_email')";
            $result = mysqli_query($conn,$sql);
    ?>
            <section>
            <h1 class="my-4 fs-1 fw-bold fst-italic text-center" >Thông tin khách hàng vừa đặt</h1>
                <div class="container  bg-danger p-2 text-dark bg-opacity-10 ">
                    <p class=" fs-4 fst-italic "> Tên khách hàng: <?php  echo $booking_guest_name ?></p>
                 
                    <p class=" fs-4 fst-italic"> Địa điểm:  <?php echo $booking_guest_address ?></p>
                    <p class=" fs-4 fst-italic"> Email:  <?php echo $booking_guest_email ?></p>
                    <p class=" fs-4 fst-italic"> Số điện thoại:  <?php echo $booking_guest_number ?></p>

            </section>
    <?php
        } else {
            echo '
                <div>
                    Nothing to showw
                </div>
            ';
        }
    ?>        

<?php
include('config/footer.php');



?>
<link rel="stylesheet" href="css/booking_ch.css">

<?php
ob_start();
session_start();
include('config/constant.php')
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Đội cứu hộ máy tính</title>
  </head>
  <body >
    <!--Navbar-->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logoch.png" width="100px" alt="Logo">
                </a>

                <form class="d-flex">
                      <?php
                      //echo $_SESSION['user'];
                      if(isset($_SESSION['login'])){
                        echo '<a href="logout.php">
                        <button type="button" class="btn btn-primary me-3 ">Logout</button>
                        </a>';
                      }else{
                        echo '
                        <a href="login.php">
                        <button type="button" class="btn btn-primary me-3 ">Login</button>
                        </a>';
                        echo '
                        <a href="register.php">
                        <button type="button" class="btn btn-primary me-3 ">Register</button>
                        </a>';
                      }
                      ?>
                    
                   
                </form>
               
            </div>
        </nav>
    </section>
    <!--Navbar-->

<!-- Hiển thị thông tin ch bằng cách lấy từ bảng ch trong SQL -->

    <?php
        //Truy vấn bảng ch (có thể dùng booking hoặc tùy)
        if(isset($_GET['ch_id']))
            $ch_id = $_GET['ch_id'];
        $sql = "SELECT * FROM ch WHERE ch_id=$ch_id";
        $result = mysqli_query($conn,$sql);
        //check xem bảng ch có đc kết nối hay ko
        if(mysqli_num_rows($result)>0){
           
            //ch được kết nối
            while($row = mysqli_fetch_assoc($result)){
                
                
            
                //Lấy giá trị
                $ch_id = $row['ch_id'];
                $ch_Name = $row['ch_Name'];
                $img = $row['img'];
                $ch_number = $row['ch_number'];
                $ch_day_start = $row['ch_day_start'];
                $ch_day_end = $row['ch_day_end'];
                $ch_days = $row['ch_days'];
                $ch_location = $row['ch_location'];
                $ch_guild = $row['ch_guild'];
               // $ch_detail=$row['ch_detail'];

    ?>
        

        <div class="container-sm">
            <div class="row align-items-start">
                <div class="col">
                    <a href="#">
                        <img src="<?php echo $img?> " class="img-fluid  img-cruv"  alt="... "> <!--lấy ảnh từ csdl-->
                    </a>
                </div>
        
                <div class="col-6 cruv">
                    <h2 class="ch_Name">
                        <?php echo $ch_Name?> <!--lấy tên của ch từ csdl-->
                    </h2>
                        <p><b> Số lượng người tối đa: <?php echo $ch_number ?> người </b></p><!--lấy số lượng khách của ch từ csdl-->
                        <p><b> Bắt đầu: <?php echo $ch_day_start ?> </b></p>
                        <p><b> Kết thúc: <?php echo $ch_day_end ?> </b></p>
                        <p><b> Địa điểm:  <?php echo $ch_location ?> </b></p>
                        <p><b> Người phụ trách: <?php echo $ch_guild ?> </p>

                
                </div>
            </div>
        </div>
        <?php
            }
        }
        
        ?>

         
        <!--tien hanh dat ch-->
       
        <div class="container Thongtinkhachhang">
        <section class="container">
        <h1> Thông tin khách hàng </h1>
            <div class="row">
                <div class="col-12" >
                    <form action="detail_booking_ch.php" method = "POST">
                            <div class="mb-3">
                                <label class="form-label">Họ và tên*</label>
                                <input type="text" class="form-control forminputname" name="booking_guest_name" id="booking_guest_name" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control forminputname" name="booking_guest_email" id="booking_guest_email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại*</label>
                            <input type="text" class="form-control forminputname" name="booking_guest_number" id="booking_guest_number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control forminputname input-lg" name="booking_guest_address" id="booking_guest_address">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Thời gian</label>
                            <input type="datetime-local" class="form-control forminputname input-lg" name="booking_day" id="booking_day">
                        </div>
                        <div class="mx-auto" style="width: 200px;">
                            <button type="submit" name="submit" class="btn btn-info btn-lg"> Đặt Lịch Ngay</button>
                        </div>
                        
                        <input type="hidden" class="form-control" name="ch_id" id="ch_id" value="<?php echo $ch_id?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
        </section>

<?php
include('config/footer.php');
?>
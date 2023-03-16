<?php
ob_start();
session_start();

;

include('config/header.php');
include('config/constant.php');
?>

    <?php
    if(isset($_SESSION['register'])){
        echo $_SESSION['register'];
        unset($_SESSION['register']);
    }
    ?>
    <!--Sugguest ch-->
    <section>
        <h2 class="text-center my-4 fw-bold fs-1 ">Những Hình Ảnh Về Đội</h2>
        <div class="container-fluid d-flex justify-content-around">

                <div class="hl-ch">
                    <img src="img/hinh1.jpg" alt="" class=" img-cruv">

                    <h3 class="hl-ch-content text-white ">Tuyển thành viên</h3>
                </div>
        
 
                <div class="hl-ch">
                    <img src="img/hinh2.jpg" alt="" class=" img-cruv">

                    <h3 class="hl-ch-content text-white">Thành viên đội</h3>
                </div>
            
 
                <div class="hl-ch">
                    <img src="img/hinh3.jpg" alt="" class=" img-cruv">

                    <h3 class="hl-ch-content text-white">Hỗ trợ CS2</h3>
                </div>
            
  
                <div class="hl-ch">
                    <img src="img/hinh4.jpg" alt="" class=" img-cruv">

                    <h3 class="hl-ch-content text-white">Họp thường niên</h3>
                </div>
            
        </div>
    </section>
    <!--highlight ch-->



    <!--family ch-->
    <section class=" mt-5 bg-light ">


        <h3 class="text-center my-4 fw-bold fs-1">Các Hoạt Động Của Đội Cứu Hộ Máy Tính</h3>
        <div class=" container d-flex   ">

        <?php
        //Truy vấn bảng ch (có thể dùng booking hoặc tùy)
        $sql = "SELECT * FROM ch";
        $result = mysqli_query($conn,$sql);
        //check xem bảng ch có đc kết nối hay ko
        if(mysqli_num_rows($result)>0){
            //ch được kết nối
            while($row = mysqli_fetch_assoc($result)){
                //Get the Values like img,ch_Name,ch_number(lấy giá trị cần dùng)
                $ch_id = $row['ch_id'];
                $ch_Name = $row['ch_Name'];
                $img = $row['img'];
                $ch_number = $row['ch_number'];

        ?>
        

            <div class=" me-4">
                <a href="#">
                    <img src="<?php echo $img?> " class="card-img-top img-cruv " alt="... "><!--lấy ảnh từ csdl-->
                </a>
                <div class="card-body ">
                    <a href="detail.php?ch_id=<?php echo $ch_id?>">
                        <h4 class="ch_name  ">
                             <?php echo $ch_Name?> <!--lấy tên của ch từ csdl-->
                        </h4>
                    </a>

                </div>
                <div class="form d-flex justify-content-between">
                    <a href="booking_ch.php?ch_id=<?php echo $ch_id ?>">
                        <button type="submit" class=" btn bg-danger text-light fw-bold">Đặt lịch ngay</button>
                    </a>
                    <a href="detail.php?ch_id=<?php echo $ch_id ?>">
                        <button type="submit" class=" btn btn-outline-primary ">Xem chi tiết</button>
                    </a>
                </div>
            </div>
            <?php
            }
        }
        ?>
    </section>
          

    
<?php

include('config/footer.php')
?>

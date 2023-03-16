<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <title>Đăng kí</title>
  </head>
  <body>
    <div class="container-fluid register-form ">
        <h1 class="text-center text-white ">Nhập thông tin đăng kí</h1>
        <form action="./process-register.php" method="POST">
            <div class="mb-3 text-center ">
                <label for="exampleInputEmail1" class="form-label text-white fs-4">Tên đăng nhập</label>
                <input type="text" class="form-control input-register " name="guest_username" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 text-center">
                <label for="exampleInputPassword1" class="form-label text-white fs-4">Mật khẩu</label>
                <input type="password" name="guest_password" class="form-control input-register" id="exampleInputPassword1">
            </div>
            <div class="mb-3 text-center">
                <label for="exampleInputEmail1" class="form-label text-white fs-4">Email</label>
                <input type="text" class="form-control input-register" name="guest_email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 text-center">
                <label for="exampleInputEmail1" class="form-label text-white fs-4">Địa chỉ</label>
                <input type="text" class="form-control input-register" name="guest_address" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 text-center">
                <label for="exampleInputEmail1" class="form-label text-white fs-4">Tuổi</label>
                <input type="text" class="form-control input-register" name="guest_age" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 text-center">
                <label for="exampleInputEmail1" class="form-label text-white fs-4">Giới tính</label>
                <select name="guest_gender" id="">
                    <option value="nam">Nam</option>
                    <option value="nữ">Nữ</option>
                </select>
            </div>

            <div class="mb-3 text-center">
                <label for="exampleInputEmail1" class="form-label text-white fs-4">Số điện thoại</label>
                <input type="text" class="form-control input-register" name="guest_phone" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div>
            <button type="submit" name="register" class="btn btn-primary btn-lg">Đăng ký</button>
            </div>
        </form>
        <!--Footer-->
        <?php
include('config/footer.php');
    // session_destroy();
        if(isset($_POST["login"]))
        {
            $username=trim($_POST["username"]);
            $password=($_POST["password"]);
            $sqllogin="SELECT * FROM user WHERE guest_username='$username' AND guest_password='$password'";
            $result = mysqli_query($conn,$sqllogin);
            if(mysqli_num_rows($result) > 0){
                $rowlogin= mysqli_fetch_assoc($result);
                $_SESSION['login']= $rowlogin['guest_email'];
                $_SESSION['guest_id']=$rowlogin['guest_id'];
                header('location:../index.php');
            }else{
                echo "sai";
                //header("location:../user/login.php");
            }
            
        }
?>
    <!--Footer-->
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
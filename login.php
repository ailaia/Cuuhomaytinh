<?php
ob_start();
include('config/constant.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
    <style>
body{
  
  position: relative;
}
.check{
  
  
  position: relative;
  width: 100%;
  height: 18rem;
  text-align:center;
  
}

.text-center{
  text-align:center;
}

    </style>
  </head>
  <body>
    <center>
    <div class="logo">
    <a class="navbar-brand" href="index.php">
                    <img src="img/logoch.png" width="200px" alt="Logo">
                </a>
    </div>
    </center>
    <div class="check">
      <div>
    <a href="../baitaplon/register.php"><button type="button" class="btn btn-primary center my-3 " >Đăng kí</button></a>
    </div>
    <div>
    <a href="../baitaplon/user/login.php"><button type="button" class="btn btn-success center my-3 " >Đăng nhập với tư cách là khách hàng</button></a>
    </div>    
    <div> 
         <a href="../baitaplon/admin/login.php"><button type="button" class="btn btn-warning my-3 ">Đăng nhập với tư cách là admin</button></a> 
    </div> 
    <div>
      <a href="index.php"><button type="button" class="btn btn-danger my-3">Quay về trang chủ</button></a>  
    </div> 
       
            </div>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
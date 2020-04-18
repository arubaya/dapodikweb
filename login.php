<?php
session_start();
if(isset($_SESSION["login"])){
    header("Location: admin/admin.php");
    exit;
  }
if( isset($_POST["submit"])){
    $user = $_POST["uname"];
    $password = $_POST["psw"];
    echo $user;

    if($user == "admin" && $password == "admin123"){
        // set session
        $_SESSION["login"] = true;
        header('Location: admin/admin.php');
    } else {
        header('Location: login.php?login=failed');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="default-style.css">
    <style>
        .login{
            width: 100%;
            height: 400px;
            margin-top: 80px;
        }
        .login-container{
            width: 40%;
            margin-top: 200px;
            margin-left: auto;
            margin-right: auto;
        }
        input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        button {
        background-color: #707070;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }

        button:hover {
        opacity: 0.8;
        }

        .cancelbtn {
        width: 100%;
        padding: 10px 18px;
        background-color: #f44336;
        color: #fff;
        }

        .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        }

        img.avatar {
        width: 40%;
        border-radius: 50%;
        }

        .container {
        width: 100%;
        padding: 16px;
        }

        span.psw {
        float: right;
        padding-top: 16px;
        }

    </style>
</head>
<body>
    <!-- Header start -->
    <nav class="header">
      <div class="container-header">
        <p class="tittle-web" >Dapodik DIY</p>
        <a class="login-btn" href="index.php">
          <img src="" alt="">
          <p></p>
        </a>
        </div>
      </div>
    </nav>
    <!-- Header End -->
    <?php
        if($_GET['login'] == 'failed'){
            echo"
            <script>
            alert('Username atau Password salah!')
            </script>";
        } 
    ?>

    <div class="login">
        <div class="login-container">
            <form action="" method="post">
                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                        
                    <button type="submit" name="submit">Login</button>
                    
                </div>

                <div class="container" >
                    <a class="cancelbtn"href="index.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="footer-section">
      <p>Copyright 2020. Dapodik. Design by Si Tupi</p>
    </div>
    <!-- Footer End -->
    
</body>
</html>
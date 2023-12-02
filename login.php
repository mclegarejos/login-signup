<?php
session_start();
include("db.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--MY CSS FILE-->
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">
        <!--SIGNUP FORM-->
        <form class="form" method="post">
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="loginEmail" aria-describedby="emailHelp">
            </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="loginPassword">
                </div>
                      <a href="index.php">Don't you have an account?</a><br>
                        <button name="login" type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>








  
    <!--BOOTSTRAP JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  </body>
</html>

<?php
if(isset($_POST["login"]) && isset($_POST["loginEmail"]) && isset($_POST["loginPassword"])){
  
  $email = $_POST["loginEmail"];
  $pw = $_POST["loginPassword"];

    // CHECK IF EVERY FIELD ARE FILLED
  if($email == "" || $pw == ""){
    // SHOW WARNING
    echo "please fill all the areas";
  }else{
    //CHECK IF USER EXISTS
    $sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$pw."'";
    $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $_SESSION["user"] = $email;
            header("Location: welcome.php");
        }else{
            echo "User not found";
        }

  }
}



?>
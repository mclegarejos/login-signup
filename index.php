<?php
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
                <input type="email" class="form-control" name="signupEmail" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="signupPassword">
                </div>
                    <div class="form-group">
                        <label>Password Again</label>
                        <input type="password" class="form-control" name="signupPassword2">
                    </div>
                        <button name="signup" type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>








  
    <!--BOOTSTRAP JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  </body>
</html>

<?php
if(isset($_POST["signup"]) && isset($_POST["signupEmail"]) && isset($_POST["signupPassword"]) && isset($_POST["signupPassword2"])){
  
  $email = $_POST["signupEmail"];
  $pw = $_POST["signupPassword"];
  $pw2 = $_POST["signupPassword2"];

    // CHECK IF EVERY FIELD ARE FILLED
  if($email == "" || $pw == "" || $pw2 == ""){
    // SHOW WARNING
    echo "please fill all the areas";
  }else{
    // IF PASSWORD MATCHING
    if($pw == $pw2){
      $sql = "INSERT INTO users (email, password) VALUES ('".$email."' , '".$pw."')";

        //CHECK IF RECORD SUCCESFUL
        if(mysqli_query($conn, $sql)){
          echo "new user recorded";
        }else{
          echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        }
    }else{
      echo "password dont match";
    }
  }
}



?>
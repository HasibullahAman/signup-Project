<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="Boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body class="bg-light">
    <?php
    include'dbcon.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // is account exist or not

        $email_search = "SELECT * FROM ragistaritions WHERE Email='$email' ";
        $query = mysqli_query($con,$email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['Password'];
            // password decode
            $pass_decode = password_verify($password,$db_pass);
            if($pass_decode){
                echo "Loggin successfull";
              ?>
              <script>
                  location.replace("index.html");
                </script>
              <?php
                
            }
            else{
                echo "Incorect Password";
            }
        }else{
            ?>
            <script>
            alert("Email is encorect...!");
            </script>
            <?php
        }
        
    }

    ?>
        <section class="section-1">
            <div class="container">
                <div class="row text-center align-items-center">
                    <h6 class="display-1 pt-5" id="header">Creat Account</h6>
                    <p id="text" class="py-1">Get Started whit your free Account</p>
                    <button class="btn btn-danger social-button my-2"><img src="bootstrap-icons/google.svg" class="img-fluid" alt=""> Login via Gmail</button>
                    <button class="btn btn-primary social-button"><img src="bootstrap-icons/facebook.svg" class="img-fluid xczcd" alt=""> Login via Facebook</button>
                    <h1 class="display-6 pt-3" id="header-hr-line">OR</h1>
                </div>
            </div>
        </section>
        <section class="section-2">
            <div class="container">
                <div class="d-flex align-items-center input-row">
                    <div class="row">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>") method="POST" class="d-flex align-items-center input-row">
                            <div class="input-group mt-1 py-2">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                <input type="eamil" name="email" class="form-control" placeholder="Enter your email address" required>
                            </div>
                            <div class="input-group py-2">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                <input type="text" name="password" class="form-control" placeholder="Email address" required><br>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary social-button mt-3" style="width:20rem;">Login Now</button>
                        </form>
                        <p class="display-6 text-center pt-4" style=" font-size:1rem; ">Not have an account? <a href="# ">Signin</a></p>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>
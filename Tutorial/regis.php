<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="Boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Signup</title>
</head>

<body>
    <?php
    include('dbemail.php'); 
        if(isset($_POST['submit'])){
            $Name =mysqli_real_escape_string($con,$_POST['Name']);
            $Email = mysqli_real_escape_string($con,$_POST['Email']);
            $Phone = mysqli_real_escape_string($con,$_POST['Phone']);
            $Password = mysqli_real_escape_string($con,$_POST['Password']);
            $cPassword = mysqli_real_escape_string($con,$_POST['cPassword']);
            // is pass comper or not
            $pass = password_hash($Password, PASSWORD_BCRYPT);
            $cPass = password_hash($cPassword, PASSWORD_BCRYPT);
            // generate a uniqid code
            $token = bin2hex(random_bytes(15));
            // is email exists
            $emailquery = "SELECT * FROM regis WHERE Email = '$Email' ";
            $query = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query);
            if($emailcount>0){
                ?>
                <script>
                     alert("Email already exist..!");
                </script>
                <?php
            }else{
                if($Password === $cPassword){
                    $insertquery = "INSERT INTO regis (Name,Email,Phone,Password,cPassword,token,status) VALUES ('$Name','$Email','$Phone','$pass','$cPass','$token','inactive')";
                    $iquery = mysqli_query($con,$insertquery);
                    if($iquery){
                        ?>
                            <script>
                                alert("inset are  successful");
                            </script>
                        <?php
                    }else{
                        ?>
                            <script>
                                alert("insert are not successful");
                            </script>
                        <?php
                    }
                }else{
                        ?>
                            <script>
                            alert("password not matching...!");
                            </script>
                    <?php
                }
            }



        }

    ?>
        <section class="section-1">
            <div class="container">
                <div class="row text-center align-items-center">
                    <h6 class="display-1 pt-5" id="header">Creat Account</h6>
                    <p id="text" class="py-1">Get Started whit your free Account</p>
                    <button class="btn btn-danger social-button my-2"><img src="/Tutorial/bootstrap-icons/google.svg" class="img-fluid" alt=""> Login via Gmail</button>
                    <button class="btn btn-primary social-button"><img src="/Tutorial/bootstrap-icons/facebook.svg" class="img-fluid xczcd" alt=""> Login via Facebook</button>
                    <h1 class="display-6 pt-3" id="header-hr-line">OR</h1>
                </div>
            </div>
        </section>
        <!-- <p class="divider-text">
        <span class="bg-light">OR</span>
    </p> -->
        <section class="section-2">
            <div class="container">
                <div class="row">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="d-flex align-items-center input-row">
                        <div class="input-group mt-1 py-2">
                            <span class="input-group-text"><img src="bootstrap-icons/person.svg" alt=""></span>
                            <input type="text" name="Name" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="Email" class="form-control" placeholder="Email address" required><br>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            <input type="Number" class="form-control" name="Phone" placeholder="Phone Number" required>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" name="Password" class="form-control" placeholder="Create Password" required>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" name="cPassword" class="form-control" placeholder="Repeat Password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary social-button mt-3" style="width:20rem;">Create Account</button>
                    </form>
                    <p class="display-6 text-center pt-4" style=" font-size:1rem; ">Have an Account <a href="# ">Login</a></p>
                </div>
            </div>
        </section>
        <script src="/Tutorial/Boostrap/bootstrap.bundle.min.js "></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
    <?php
    include"dbcon.php";
    if(isset($_POST['submit'])){
        $name =mysqli_real_escape_string($con,$_POST['name']);
        $email =mysqli_real_escape_string($con,$_POST['email']);
        $password =mysqli_real_escape_string($con,$_POST['password']);
        $cPassword =mysqli_real_escape_string($con,$_POST['cPassword']);
        // is pass comper or not
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cPass = password_hash($cPassword, PASSWORD_BCRYPT);
         // is email exists
         $emailquery = "SELECT * FROM register WHERE email = '$email' ";
         $query = mysqli_query($con,$emailquery);

         $emailcount = mysqli_num_rows($query);
         if($emailcount>0){
             ?>
             <script>
             alert("Email already exist..!");
             </script>
             <?php
         }else{
             if($password === $cPassword){
                 $insertquery = "INSERT INTO register (name,email,password,cPassword) VALUES ('$name','$email','$pass','$cPass')";
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
    }}
    ?>
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index.html"><b>Admin</b>Dashboard</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>
                    <!-- action--- ../../index.html -->
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='name' placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name='email' placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name='password' placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name='cPassword' placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign up using Google+
                    </a>
                </div>

                <a href="login.html" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
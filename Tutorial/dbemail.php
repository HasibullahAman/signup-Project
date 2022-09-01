<?php
$servername = 'localhost';
$user = 'root';
$password = '';
$dbname = 'eamilphp';

$con = mysqli_connect($servername,$user,$password,$dbname);

if($con){
    ?>
    <script>
        alert("Connectin successful");
    </script>
    <?php
}else{
    ?>
    <script>
        alert("Connectin not successful");
    </script>
    <?php
}
?>
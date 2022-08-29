<?php include('do_register.php');?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> register</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <div id="user">
            <form action="user/do_register.php" method="post">
                <input type="text" name="name" placeholder="display_name"><br>
                <input type="text"  name="email"  placeholder="Email"><br>
                <input type="text"  name="password"  placeholder="password"><br>
                <input type="text"   name="pass_conf"  placeholder="Confirm"><br>
                <input type="submit"  name="do-redister"  value="register">
            </form>
        </div>
    </body>
 </html>



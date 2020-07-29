
<?php

  require('./db.php');

        if(isset($_REQUEST['register']))
        {
            if(isset($_REQUEST['user']) && isset($_REQUEST['fname']) && isset($_REQUEST['Email']) && isset($_REQUEST['upass']))
            {
               $username = $mysql->real_escape_string($_REQUEST['user']);
               $name = $mysql->real_escape_string($_REQUEST['fname']);
               $email = $mysql->real_escape_string($_REQUEST['Email']);
               $pass = $mysql->real_escape_string($_REQUEST['upass']);

               $res = $mysql->query("SELECT * from users where email='$email' and user='$username'");
               if($res->num_rows > 0)
               {
                   echo '<script>alert("User Already Registered");</script>';
               }
               else
               {
                 $pass = substr(sha1($pass),0,90);
                   if($mysql->query("INSERT into users (user,fname,Email,upass) VALUES('$username','$name','$email','$pass')"))
                   {
                    echo '<script>alert("User Registered Sucessfully");</script>';
                    {
                        header('Location:'.'index.php');
                    }
                  }
               }
            }

        }
        //else{echo '<script>alert("Error");</script>';}

?>

<html>
    <head>
        <title> Sign up </title>
        <link rel="stylesheet" type="text/css" href="assets/css/Style1.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="loginbox">
            <img src="images/avatar.png" class="avatar">
            <h1> Sign up Here </h1>
            <form action="./accounts.php" method="POST">
                <p>UserName</p>
                <input type="text" name="user" placeholder="Enter Username" required="">
                <p>Name</p>
                <input type="text" name="fname" placeholder="Enter Name" required="">
                <p>Email</p>
                <input type="Email" name="Email" placeholder="Enter Email" required="">
                <p>Password</p>
                <input type="password" name="upass" placeholder="Enter Password" required="">
                <input type="submit" name="register" value="Register">
                <input type="reset" name="" value="Reset">

            </form>

        </div>
    </body>
</html>

<?php
include('includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">

        <?php
        if (isset($_GET['signup'])) {
            $msg = $_GET['signup'];
            echo '<div class="heading">
        <h1>Sign up</h1>

    </div>
    <form action="login.php" method="post">';
            if ($msg) {
                echo "<div class='error'>$msg</div>";

            }
            echo '<input type="email" placeholder="Username" name="username" required>
        <input type="text" placeholder="Name" name="name" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="password" name="confirm_password" id="" placeholder="Confirm password" required>
        <input type="submit" name="signup" id="" value="signup" class="btn">
        <p>Already have an account? <a href="login.php?login">Login</a></p>
    </form>';
        } else {
            $msg = '';
            if (isset($_GET['login'])) {
                $msg = $_GET['login'];
            }
            echo '<div class="heading">
            <h1>Login</h1>
    
        </div>
        <form action="login.php" method="post">';
            if ($msg) {
                echo "<div class='error'>$msg</div>";

            }
            echo '<input type="email" placeholder="Usename" name="username" required>
            <input type="password" id="" placeholder="Password" name="password" required>
            <input type="submit" name="login" id="" value="login" class="btn">
            <p>Don\'t have an account? <a href="login.php?signup">Signup</a></p>
        </form>';
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["login"])) {
                $userName = $_POST["username"];
                $password = $_POST["password"];
                $select_user = "Select * from `users_table` where username='$userName'";
                $result = mysqli_query($conn, $select_user);
                $rows = mysqli_num_rows($result);
                $raw_data = mysqli_fetch_assoc($result);
                if ($rows > 0) {
                    $hash = md5($password);
                    if ($hash == $raw_data['password']) {
                        header("Location:index.php");
                        exit;
                    } else {
                        header("Location:login.php?login=Username or Password is incorrect!");
                        exit;
                    }
                } else {
                    header("Location:login.php?login=Username or Password is incorrect!");
                    exit;
                }

            } elseif (isset($_POST["signup"])) {
                $userName = $_POST["username"];
                $name = $_POST["name"];
                $password = $_POST["password"];
                $confirm_password = $_POST["confirm_password"];
                $select_user = "Select * from `users_table` where username='$userName'";
                $result = mysqli_query($conn, $select_user);
                $rows = mysqli_num_rows($result);
                if (!$rows > 0) {
                    if ($password == $confirm_password) {
                        $spassword = md5($password);
                        $insert_query = "insert into `users_table` (name,username,password) values ('$name','$userName','$spassword')";
                        $result = mysqli_query($conn, $insert_query);
                        if ($result) {
                            header("Location:index.php");
                            exit;
                        } else {
                            header("Location:login.php?signup=Something went wrong. Please try again!");
                            exit;
                        }
                    } else {
                        header("Location:login.php?signup=Passwords don't match!");
                        exit;
                    }

                } else {
                    header("Location:login.php?signup=User already exist. Try login instead");
                    exit;
                }



            }

        }


        ?>
    </div>
</body>

</html>
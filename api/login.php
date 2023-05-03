<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'catalyst') or die("Connection failure!!");


if (isset($_POST['registerbtn'])) {


    $username = $_POST['username'];
    $password = $_POST['password'];
    $con_password = $_POST['conpassword'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $contact=$_POST['contact'];

    if ($password != $con_password) {
        echo '<script> 
        alert("Password mismatch!")
        window.location = "../registration/register.html";
        </script>';
    } else {
        $checker = mysqli_query($connect, "SELECT username FROM userinfo WHERE username = '$username' LIMIT 1");
        if (mysqli_num_rows($checker) > 0) {
            echo '<script>
        alert("Username already exits")
        window.location = "../registration/register.html";
        </script>';
        } else {
            $insert = mysqli_query($connect, "INSERT INTO userinfo VALUES('$username','$password','$name','$contact','$age')");
            if ($insert) {
                echo '<script>
        alert("REGISTRATION SUCCESSFULL")
        window.location = "../login/login.html";
        </script>';
            } else {
                echo '<script>
        alert("REGISTRATION Failed!")
        window.location = "../registration/register.html";
        </script>';
            }
        }
    }
}

if (isset($_POST['loginbtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $check = mysqli_query($connect, "SELECT username FROM userinfo WHERE username= '$username'");
    if ((mysqli_num_rows($check) > 0)) {

        $check = mysqli_query($connect, "SELECT username FROM userinfo WHERE username= '$username' AND password= '$password'");
        if (mysqli_num_rows($check) > 0) {
            echo '<h1>hi</h1>';
            $fetch = mysqli_fetch_array($check);
            $name = $fetch['username'];
            $_SESSION['name'] = $name;
            echo '<script>
        window.location = "../Home/index.php";
        </script>';
        } else {
            echo '<script>
        alert("New user?Login failed!")
        window.location = "../index.html";
        </script>';
        }
    } else {
        echo '<script>
        alert("User is not yet registered!")
        window.location = "../registration/register.html";
        </script>';
    }
}
?>
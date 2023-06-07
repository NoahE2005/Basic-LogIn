<?php 
session_start();

include 'functions.php';

$conn = ConnectDB();

if(isset($_POST['username']) && isset($_POST['password']))
{
    $result = ExecuteQuery($conn, "SELECT * FROM account");

    $username = $_POST['username'];
    $password = $_POST['password'];

        foreach ($result as $row) {
            if ($row["Username"] == $username && $row["Password"] == $password) 
            {
                $_SESSION["Account"] = $row["ID"];
                break;
            }
        }

    header("Location: index.php");
    exit(); 
}
elseif(isset($_GET['username']) && isset($_GET['password']))
{
    $result = ExecuteQuery($conn, "SELECT * FROM account");

    $username = $_GET['username'];
    $password = $_GET['password'];

        foreach ($result as $row) {
            if ($row["Username"] == $username && $row["Password"] == $password) 
            {
                $_SESSION["Account"] = $row["ID"];
                break;
            }
        }
    
    header("Location: index.php");
    exit(); 
}


?>

<h1>Log in</h1>
<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Submit">
</form>

<br><br>

<a href="SignUp.php">Sign up</a>
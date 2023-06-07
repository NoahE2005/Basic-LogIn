<?php 
include 'functions.php';
session_start();

$conn = ConnectDB();

echo "<h1>Welkom op de home-pagina</h1>";

echo "<br>";

if(isset($_SESSION["Account"]))
{
    $accountId = $_SESSION["Account"];

    // Retrieve the username and password from the database using the session ID
    $result = ExecuteQuery($conn, "SELECT * FROM account WHERE ID = '$accountId'");

    if (count($result) > 0) {
        $username = $result[0]["Username"];
        $password = $result[0]["Password"];

        echo "<p>Je bent ingelogd met:</p>";
        echo "Username: $username";
        echo "<br>";
        echo "Password: $password";
    }
}
else
{
    echo "<p>Je bent niet ingelogd</p>";
}

echo "<br><br>";

if (isset($_SESSION["Account"])) 
    {
        echo "<a href='LogOut.php'>Log uit</a>";
    }
    else
    {
        echo "<a href='LogIn.php'>Log in</a>";
    }


?>
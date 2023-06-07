<?php 
include 'functions.php';

$conn = ConnectDB();

if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check if username already exists in the database
    $existingUser = ExecuteQuery($conn, "SELECT * FROM account WHERE Username = '$username'");

    if (count($existingUser) > 0) {
        // Username already exists, handle the error (e.g., display a message or redirect back to the sign-up page)
        echo "Username already exists. Please choose a different username.";
    } else {
        // Username is available, proceed with account creation
        // Insert the new user into the database
        $query = "INSERT INTO account (Username, Password) VALUES ('$username', '$password')";
        ExecuteQuery($conn, $query);

        // Redirect to the index page or any other desired location after successful sign-up
        $url = "Login.php?username=" . urlencode($username) . "&password=" . urlencode($password);
        header("Location: " . $url);
        exit();
    }
}



?>
<h1>Sign up</h1>
<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Submit">
</form>
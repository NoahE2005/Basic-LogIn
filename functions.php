<?php 
function ConnectDB()
{
    $host = 'localhost';
    $dbname = 'LogIn';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }   
}

function ExecuteQuery($pdo, $query)
{
    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        // If you expect to fetch results from the query
        $results = $stmt->fetchAll();

        return $results;
    } catch (PDOException $e) {
        die("Query execution failed on table: " . $e->getMessage());
    }
}

?>
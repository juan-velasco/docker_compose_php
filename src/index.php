<?php
$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: 'exampledb';
$user = getenv('DB_USER') ?: 'postgres';
$pass = getenv('DB_PASS') ?: 'postgres';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "<h1>Connected to PostgreSQL successfully!</h1>";
    $stmt = $pdo->query("SELECT * FROM books");
    echo "<h2>Books:</h2><ul>";
    foreach ($stmt as $row) {
        echo "<li>" . htmlspecialchars($row['title']) . " by " . htmlspecialchars($row['author']) . "</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "<h1>Database connection failed:</h1>" . $e->getMessage();
}
?>

<?php
$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: 'exampledb';
$user = getenv('DB_USER') ?: 'postgres';
$pass = getenv('DB_PASS') ?: 'postgres';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "<h1>Connected to PostgreSQL successfully!</h1>";

    //Add a new movie

    // Create random movie data
    $title = 'Title ' . rand(1, 1000);
    $director = 'Director ' . rand(1, 1000);
    
    $stmt = $pdo->prepare("INSERT INTO movies (title, director) VALUES (:title, :director)");
    $stmt->execute(['title' => $title, 'director' => $director]);
    echo "<h2>Book '$title' by '$director' added successfully</h2>";

} catch (PDOException $e) {
    echo "<h1>Database connection failed:</h1>" . $e->getMessage();
}
?>
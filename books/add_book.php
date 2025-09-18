<?php
$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: 'exampledb';
$user = getenv('DB_USER') ?: 'postgres';
$pass = getenv('DB_PASS') ?: 'postgres';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "<h1>Connected to PostgreSQL successfully!</h1>";

    //Add a new book

    // Create randdom book data
    $title = 'Book ' . rand(1, 1000);
    $author = 'Author ' . rand(1, 1000);
    
    $stmt = $pdo->prepare("INSERT INTO books (title, author) VALUES (:title, :author)");
    $stmt->execute(['title' => $title, 'author' => $author]);
    echo "<h2>Book '$title' by '$author' added successfully</h2>";

} catch (PDOException $e) {
    echo "<h1>Database connection failed:</h1>" . $e->getMessage();
}
?>
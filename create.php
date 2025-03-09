<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    try {
        $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

         header('Location: index.php'); // Redirect back to index page after adding
         exit();
    } catch(PDOException $e) {
         echo "Error creating item: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
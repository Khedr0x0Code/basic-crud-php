<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $conn->prepare("DELETE FROM items WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: index.php'); //Redirect after deletion
        exit();
    } catch(PDOException $e){
        echo "Error deleting item: " . $e->getMessage();
    }
} else {
    echo "Invalid item ID.";
}
?>
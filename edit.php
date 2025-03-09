<?php
require 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

// Check for POST (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
     try {
         $stmt = $conn->prepare("UPDATE items SET name = :name, description = :description WHERE id = :id");
         $stmt->bindParam(':name', $name);
         $stmt->bindParam(':description', $description);
         $stmt->bindParam(':id', $id);
         $stmt->execute();

         header('Location: index.php'); // Redirect back to index after updating
         exit();
     } catch(PDOException $e){
         echo "Error updating item: ". $e->getMessage();
     }
}

// Get Item Data to Pre-fill the form
if ($id) {
    try {
       $stmt = $conn->prepare("SELECT * FROM items WHERE id = :id");
       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       $item = $stmt->fetch(PDO::FETCH_ASSOC);

       if (!$item) {
           echo "Item not found!";
           exit;
       }
    } catch (PDOException $e){
        echo "Error retrieving item: " . $e->getMessage();
        exit;
    }
} else {
    echo "Invalid item ID!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($item['name']); ?>" required><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description"><?php echo htmlspecialchars($item['description']); ?></textarea><br>
        <button type="submit">Update</button>
    </form>

</body>
</html>
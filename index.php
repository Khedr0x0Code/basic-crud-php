<?php
require 'db.php';

// Retrieve items
try {
    $stmt = $conn->query("SELECT * FROM items");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error fetching items: " . $e->getMessage();
    $items = [];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
</head>
<body>
    <h1>Items</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['id']); ?></td>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo htmlspecialchars($item['description']); ?></td>
                    <td>
                         <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a>
                         <a href="delete.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Create New Item</h2>
    <form action="create.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea><br>
        <button type="submit">Create</button>
    </form>

</body>
</html>
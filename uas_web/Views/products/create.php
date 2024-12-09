<?php 
$title = 'Add Product';
require_once('Views/layouts/header.php'); 
?>

<div class="container">
    <h2>Add Product</h2>
    <form method="post" enctype="multipart/form-data" class="product-form" 
          action="index.php?action=create">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="file" name="image" required>
        <input type="number" name="price" placeholder="Price" required>
        <button type="submit">Add Product</button>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    </form>
    <a href="index.php" class="btn btn-secondary">Back to List</a>
</div>

<?php require_once('Views/layouts/footer.php'); ?>

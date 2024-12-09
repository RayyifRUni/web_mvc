<?php 
$title = 'Edit Product';
require_once('Views/layouts/header.php'); 
$product_data = $product->fetch_assoc();
?>

<div class="container">
    <h2>Edit Product</h2>
    <form method="post" enctype="multipart/form-data" class="product-form" 
          action="index.php?action=edit&id=<?php echo $product_data['id']; ?>">
        <input type="text" name="name" 
               value="<?php echo htmlspecialchars($product_data['name']); ?>" 
               placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description" required>
            <?php echo htmlspecialchars($product_data['description']); ?>
        </textarea>
        <input type="file" name="image">
        <p class="note">Leave empty to keep current image</p>
        <input type="number" name="price" 
               value="<?php echo htmlspecialchars($product_data['price']); ?>" 
               placeholder="Price" required>
        <button type="submit">Update Product</button>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    </form>
    <a href="index.php" class="btn btn-secondary">Back to List</a>
</div>

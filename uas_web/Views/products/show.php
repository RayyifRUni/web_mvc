<?php 
$title = 'Product Details';
require_once('Views/layouts/header.php'); 
$product_data = $product->fetch_assoc();
?>

<div class="product-details">
    <h2><?php echo htmlspecialchars($product_data['name']); ?></h2>
    <img src="assets/images/<?php echo htmlspecialchars($product_data['image']); ?>" 
         alt="<?php echo htmlspecialchars($product_data['name']); ?>">
    <p><strong>Description:</strong> <?php echo htmlspecialchars($product_data['description']); ?></p>
    <p><strong>Price:</strong> <?php echo number_format($product_data['price'], 2, ',', '.'); ?> IDR</p>
    
    <div class="actions">
        <a href="index.php?action=edit&id=<?php echo $product_data['id']; ?>" 
           class="btn btn-warning">Edit Product</a>
        <a href="index.php?action=delete&id=<?php echo $product_data['id']; ?>" 
           class="btn btn-danger" 
           onclick="return confirm('Are you sure you want to delete this product?');">
            Delete Product
        </a>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</div>

<?php require_once('Views/layouts/footer.php'); ?>
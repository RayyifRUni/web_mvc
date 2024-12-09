<?php 
$title = 'Product List';
require_once('Views/layouts/header.php'); 
?>

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>

<div class="actions">
    <a href="index.php?action=create" class="btn btn-primary">Add Product</a>
    <a href="index.php?action=logout" class="btn btn-danger">Logout</a>
</div>

<div class="products-container">
    <?php while ($product = $products->fetch_assoc()): ?>
    <div class="product-card">
        <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
             alt="<?php echo htmlspecialchars($product['name']); ?>">
        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
        <a href="index.php?action=show&id=<?php echo $product['id']; ?>" 
           class="btn btn-info">View Details</a>
    </div>
    <?php endwhile; ?>
</div>

<?php require_once('Views/layouts/footer.php'); ?>
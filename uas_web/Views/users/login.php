<?php 
$title = 'Login';
require_once('Views/layouts/header.php'); 
?>

<form method="post" action="index.php">
    <h2>LOGIN</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<p>Don't have an account? <a href="index.php?action=register">Register</a></p>

<?php require_once('Views/layouts/footer.php'); ?>
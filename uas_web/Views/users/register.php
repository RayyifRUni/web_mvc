<?php 
$title = 'Register';
require_once('Views/layouts/header.php'); 
?>

<form method="post" action="index.php?action=register">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>
<p>Already have an account? <a href="index.php">Login</a></p>

<?php require_once('Views/layouts/footer.php'); ?>
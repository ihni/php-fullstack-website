<?php
$pageTitle = 'Login';
include '../includes/header.php';

$controller = new App\Controllers\AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $errors = $controller->login();
    }
}

?>

<main>
    <h2>Welcome back!</h2>

    <?php if (!empty($errors['general'])): ?>
        <p><?php echo $errors['general']; ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        <?php if (!empty($errors['email'])): ?>
            <p class="error"><?= htmlspecialchars($errors['email']) ?></p>
        <?php endif; ?>
        
        <input type="password" name="password" placeholder="Password">
        <?php if (!empty($errors['password'])): ?>
            <p class="error"><?= htmlspecialchars($errors['password']) ?></p>
        <?php endif; ?>

        <button class="auth-submit" type="submit">Sign in</button>
        <input type="hidden" name="action" value="login">
    </form>

    <div class="account-callout">
        New to the website? <span><a href="register.php">Create an account</a></span>
    </div>
</main

<?php include '../includes/footer.php' ?>
<?php
$pageTitle = 'Sign up';
include '../includes/header.php';

$controller = new App\Controllers\UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'register') {
        $errors = $controller->register();
    }
}

?>

<main>
    <h2>Sign up!</h2>
    <p>Fill in your details to continue </p>

    <?php if (!empty($errors['general'])): ?>
        <p><?php echo $errors['general']; ?></p>
    <?php endif; ?>

    <form method="POST" action="register.php">
        <input type="text" name="fname" placeholder="First Name">
        <?php if (!empty($errors['fname'])): ?>
            <p class="error"><?= htmlspecialchars($errors['fname']) ?></p>
        <?php endif; ?>

        <input type="text" name="lname" placeholder="Last Name">
        <?php if (!empty($errors['fname'])): ?>
            <p class="error"><?= htmlspecialchars($errors['fname']) ?></p>
        <?php endif; ?>

        <input type="text" name="email" placeholder="Email">
        <?php if (!empty($errors['email'])): ?>
            <p class="error"><?= htmlspecialchars($errors['email']) ?></p>
        <?php endif; ?>

        <input type="password" name="password" placeholder="Password">
        <?php if (!empty($errors['password'])): ?>
            <p class="error"><?= htmlspecialchars($errors['password']) ?></p>
        <?php endif; ?>

        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <?php if (!empty($errors['confirm_password'])): ?>
            <p class="error"><?= htmlspecialchars($errors['confirm_password']) ?></p>
        <?php endif; ?>

        <button class="auth-submit" type="submit">Sign up</button>
        <input type="hidden" name="action" value="register">
    </form>

    <div class="account-callout">
        Already have an account? <span><a href="login.php">Sign in</a></span>
    </div>
</main

<?php include '../includes/footer.php' ?>
<?php
$pageTitle = 'Login';
include '../includes/header.php';
?>

<main>
    <h2>Welcome back!</h2>

    <form method="POST">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button class="auth-submit" type="submit">Sign in</button>
    </form>

    <div class="account-callout">
        New to the website? <span><a href="">Create an account</a></span>
    </div>
</main

<?php include '../includes/footer.php' ?>
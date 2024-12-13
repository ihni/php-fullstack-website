<?php
$pageTitle = 'Sign up!';
include '../includes/header.php';
?>

<main>
    <h2>Sign up!</h2>
    <p>Fill in your details to continue </p>

    <form method="POST">
        <input type="text" name="fname" placeholder="First Name">
        <input type="text" name="lname" placeholder="Last Name">
        <input type="text" name="email" placeholder="Email">

        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <button class="auth-submit" type="submit">Sign up</button>
    </form>

    <div class="account-callout">
        Already have an account? <span><a href="">Sign in</a></span>
    </div>
</main

<?php include '../includes/footer.php' ?>
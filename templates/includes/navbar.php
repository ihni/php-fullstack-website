<nav>
    <ul>
        <li><a href="<?php echo BASE_URL ?>public/index.php">Home</a></li>

        <?php if (isset($_SESSION['user_id']) && ($_SESSION['role'] === 1)): ?>
            <li><a href="<?php echo BASE_URL ?>templates/admin/dashboard.php">Admin Dashboard</a></li>
            <li><a href="<?php echo BASE_URL ?>templates/admin/users.php">View Users</a></li>
        <?php endif; ?>

        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="<?php echo BASE_URL ?>templates/auth/logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="<?php echo BASE_URL ?>templates/auth/login.php">Login</a></li>
            <li><a href="<?php echo BASE_URL ?>templates/auth/register.php">Sign Up</a></li>
        <?php endif; ?>
    </ul>
</nav>
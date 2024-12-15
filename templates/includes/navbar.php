<nav class="bg-white text-gray-800">
    <div class="container mx-auto px-4 flex justify-between items-center py-4">
        <!-- Logo -->
        <div class="logo-container flex items-center">
            <a href="<?php echo BASE_URL ?>public/">
            <img src="<?php echo BASE_URL ?>public/assets/images/icons/penguin-icon.png" alt="Logo" class="h-8 w-8">
            </a>
            <span class="ml-2 font-bold text-lg">Registration Website</span>
        </div>

        <!-- Navigation Links -->
        <ul class="hidden md:flex space-x-6 text-sm font-medium">
            <li><a href="<?php echo BASE_URL ?>public/" class="hover:text-gray-500">Home</a></li>

            <?php if (isset($_SESSION['user_id']) && ($_SESSION['role'] === 1)): ?>
                <li><a href="<?php echo BASE_URL ?>templates/admin/dashboard.php" class="hover:text-gray-500">Admin Dashboard</a></li>
                <li><a href="<?php echo BASE_URL ?>templates/users/content.php" class="hover:text-gray-500">User Content</a></li>
                <li><a href="<?php echo BASE_URL ?>templates/admin/users.php" class="hover:text-gray-500">View Users</a></li>
                <li><a href="<?php echo BASE_URL ?>templates/auth/logout.php" class="hover:text-gray-500">Logout</a></li>
            <?php elseif (isset($_SESSION['user_id']) && ($_SESSION['role'] === 0)): ?>
                <li><a href="<?php echo BASE_URL ?>templates/users/content.php" class="hover:text-gray-500">Content</a></li>
                <li><a href="<?php echo BASE_URL ?>templates/auth/logout.php" class="hover:text-gray-500">Logout</a></li>
            <?php else: ?>
                <li><a href="<?php echo BASE_URL ?>templates/auth/login.php" class="hover:text-gray-500">Login</a></li>
                <li><a href="<?php echo BASE_URL ?>templates/auth/register.php" class="hover:text-gray-500">Sign Up</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

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

<main class="min-h-screen flex items-center justify-center bg-gray-50">
    <section class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-2 text-gray-800">Sign up!</h2>
        <p class="text-center text-gray-600 mb-4">Fill in your details to continue</p>

        <?php if (!empty($errors['general'])): ?>
            <p class="text-red-500 text-sm text-center mb-4"><?php echo htmlspecialchars($errors['general']); ?></p>
        <?php endif; ?>

        <form method="POST" action="register.php" class="space-y-4">
            <!-- First Name -->
            <div>
                <input
                    type="text"
                    name="fname"
                    placeholder="First Name"
                    value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                <?php if (!empty($errors['fname'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['fname']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Last Name -->
            <div>
                <input
                    type="text"
                    name="lname"
                    placeholder="Last Name"
                    value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                <?php if (!empty($errors['lname'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['lname']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Email -->
            <div>
                <input
                    type="text"
                    name="email"
                    placeholder="Email"
                    value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                <?php if (!empty($errors['email'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['email']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                <?php if (!empty($errors['password'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['password']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Confirm Password -->
            <div>
                <input
                    type="password"
                    name="confirm_password"
                    placeholder="Confirm Password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                <?php if (!empty($errors['confirm_password'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['confirm_password']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                    Sign up
                </button>
            </div>

            <input type="hidden" name="action" value="register">
        </form>

        <!-- Callout -->
        <div class="mt-6 text-center text-sm text-gray-600">
            Already have an account? 
            <a href="login.php" class="text-indigo-500 hover:text-indigo-700 font-medium">Sign in</a>
        </div>
    </section>
</main>

<?php include '../includes/footer.php' ?>
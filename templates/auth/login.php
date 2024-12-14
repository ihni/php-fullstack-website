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

<main class="min-h-screen flex items-center justify-center bg-gray-50 mt-[-5rem]">
    <section class="bg-white shadow-md rounded-lg p-6 w-full max-w-sm">
        <h2 class="text-2xl font-bold text-center mb-4 text-gray-800">Welcome back!</h2>

        <?php if (!empty($errors['general'])): ?>
            <p class="text-red-500 text-sm text-center mb-4"><?php echo htmlspecialchars($errors['general']); ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php" class="space-y-4">
            <!-- Email Input -->
            <div>
                <input
                    type="text"
                    name="email"
                    placeholder="Email"
                    value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500"
                >
                <?php if (!empty($errors['email'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['email']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Password Input -->
            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500"
                >
                <?php if (!empty($errors['password'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['password']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="w-full bg-sky-500 text-white py-2 rounded-lg hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500"
                >
                    Sign in
                </button>
            </div>

            <input type="hidden" name="action" value="login">
        </form>

        <!-- Callout -->
        <div class="mt-6 text-center text-sm text-gray-600">
            New to the website? 
            <a href="register.php" class="text-sky-500 hover:text-sky-700 font-medium">Create an account</a>
        </div>
    </section>
</main>

<?php include '../includes/footer.php' ?>
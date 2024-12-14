<?php
$pageTitle = 'Forbidden: 403';
include '../includes/header.php';
?>

<main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 mt-[-5rem]">
    <div class="text-center bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">403 Forbidden</h1>
        <p class="text-lg text-gray-600 mb-6">Sorry, you do not have permission to access this page.</p>
        <p class="text-sm text-gray-500 mb-6">If you believe this is an error, please contact the administrator.</p>
        
        <!-- Return to Home Button -->
        <a href="<?php echo BASE_URL ?>/public/index.php" class="text-white bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-opacity-50 px-6 py-3 rounded-lg transition-all duration-300">Return to Home</a>
    </div>
</main>

<?php include '../includes/footer.php' ?>

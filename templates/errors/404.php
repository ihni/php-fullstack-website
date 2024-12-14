<?php
$pageTitle = 'Oh oh! 404';
include '../includes/header.php';
?>

<main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 mt-[-5rem]">
    <div class="text-center bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Oops! 404</h1>
        <p class="text-lg text-gray-600 mb-6">It seems like you've hit a dead end!</p>
        <p class="text-sm text-gray-500 mb-8">Sorry, but there's nowhere else to go.</p>
        
        <!-- Back to Home Button -->
        <a href="<?php echo BASE_URL?>public/" class="text-white bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-opacity-50 px-6 py-3 rounded-lg transition-all duration-300">Go Back Home</a>
    </div>
</main>

<?php include '../includes/footer.php' ?>

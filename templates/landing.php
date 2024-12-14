<?php
$pageTitle = 'Welcome!';
include 'includes/header.php';
?>

<main class="min-h-screen bg-gray-50 flex flex-col justify-center items-center">
    <!-- Hero Section -->
    <section class="w-full bg-sky-500 text-white py-20">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to My Registration Website</h1>
            <p class="text-lg max-w-2xl mx-auto">This is my first fullstack project built with PHP, MySQL, Apache, and TailwindCSS!</p>
        </div>
    </section>

    <section class="mt-10">
        <div class="flex justify-center gap-8 flex-wrap">
            <!-- Apache Image -->
            <div class="flex justify-center items-center p-4">
                <img src="<?php echo BASE_URL ?>public/assets/images/icons/apache.png" alt="Apache" class="w-24 h-24 md:w-32 md:h-32 object-contain transition-transform transform hover:scale-110">
            </div>
            <!-- Tailwind Image -->
            <div class="flex justify-center items-center p-4">
                <img src="<?php echo BASE_URL ?>public/assets/images/icons/tailwind.png" alt="TailwindCSS" class="w-24 h-24 md:w-32 md:h-32 object-contain transition-transform transform hover:scale-110">
            </div>
            <!-- MySQL Image -->
            <div class="flex justify-center items-center p-4">
                <img src="<?php echo BASE_URL ?>public/assets/images/icons/mysql.png" alt="MySQL" class="w-24 h-24 md:w-32 md:h-32 object-contain transition-transform transform hover:scale-110">
            </div>
            <!-- PHP Image -->
            <div class="flex justify-center items-center p-4">
                <img src="<?php echo BASE_URL ?>public/assets/images/icons/php.png" alt="PHP" class="w-24 h-24 md:w-32 md:h-32 object-contain transition-transform transform hover:scale-110">
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="mt-10 text-center px-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">About the Project</h2>
        <p class="text-gray-600 max-w-lg mx-auto">
            It's a showcase of my knowledge in backend and frontend development(though i really don't do frontend nor enjoy it at all)
        </p>
        <div class="mt-6">
            <a href="<?php echo BASE_URL ?>templates/auth/register.php" class="bg-sky-500 text-white py-2 px-4 rounded-lg hover:bg-sky-600">Get Started</a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php' ?>
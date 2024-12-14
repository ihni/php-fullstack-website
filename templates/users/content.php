<?php
use App\Controllers\AuthController;
require __DIR__ . '/../../src/controllers/AuthController.php';
AuthController::requireRole([0, 1]);

$pageTitle = 'Your Content';
include '../includes/header.php';
?>

<main class="bg-grey-50 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <!-- Page Title -->
        <h1 class="text-3xl font-semibold text-sky-500 mb-8 text-center">Welcome!</h1>

        <!-- Blog Section -->
        <section class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Latest Projects</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo BASE_URL?>public/assets/images/projects/regis-web-card.png" alt="Project 1" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800">PHP Registration Website</h3>
                        <p class="text-gray-600 mt-2">A fullstack registration website made without any frameworks using PHP, Apache, MySQL, and TailwindCSS</p>
                        <a href="https://github.com/ihni/php-fullstack-website" class="text-blue-600 hover:text-blue-800 mt-4 inline-block">&lt;/&gt; Source</a>
                    </div>
                </div>

                <!-- Dummy Blog Post 2 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo BASE_URL?>public/assets/images/projects/movie-sys-card.png" alt="Project 2" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800">Python Student Dashboard</h3>
                        <p class="text-gray-600 mt-2">An interactive GUI Python Application using Tkinter for managing, registering, and students with read/write functionality(WIP)</p>
                        <a href="https://github.com/ihni/student-regis" class="text-blue-600 hover:text-blue-800 mt-4 inline-block">&lt;/&gt; Source</a>
                    </div>
                </div>

                <!-- Dummy Blog Post 3 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo BASE_URL?>public/assets/images/projects/movie-sys-card.png" alt="Project 3" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800">Python Movie Booking System</h3>
                        <p class="text-gray-600 mt-2">A CLI Python Application for the final project of my DSA class. This app allows you to book tickets for movies</p>
                        <a href="https://github.com/ihni/movie-system" class="text-blue-600 hover:text-blue-800 mt-4 inline-block">&lt;/&gt; Source</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Language Cards Section -->
        <section>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">What I wanna learn</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Icon 1 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo BASE_URL?>public/assets/images/icons/raspberry-pi.svg" alt="Icon 1" class="w-full h-56 object-contain">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Raspberry Pi</h3>
                    </div>
                </div>

                <!-- Icon 2 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo BASE_URL?>public/assets/images/icons/linux-icon.png" alt="Icon 2" class="w-full h-56 object-contain">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Linux</h3>
                    </div>
                </div>

                <!-- Icon 3 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo BASE_URL?>public/assets/images/icons/rust-icon.png" alt="Icon 3" class="w-full h-56 object-contain">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Rust</h3>
                    </div>
                </div>

                <!-- Icon 4 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="<?php echo BASE_URL?>public/assets/images/icons/clang-icon.png" alt="Icon 4" class="w-full h-56 object-contain">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">C</h3>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php include '../includes/footer.php' ?>

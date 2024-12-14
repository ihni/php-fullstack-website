<?php
$pageTitle = 'Registration Success!';
include '../includes/header.php';
?>

<main class="bg-grey-50 min-h-screen flex items-center justify-center">
    <div class="text-center p-8 bg-white rounded-lg shadow-lg max-w-md mx-auto">
        <h1 class="text-3xl font-semibold text-green-600 mb-4">Registration Successful!</h1>
        <p class="text-lg text-gray-700 mb-6">Congratulations, you've successfully registered. You can now log in to your account!</p>
        
        <div>
            <a href="<?php echo BASE_URL ?>templates/auth/login.php" 
               class="bg-green-600 text-white text-lg py-2 px-6 rounded-full hover:bg-green-700 transition duration-300">
                Log In!
            </a>
        </div>
        
        <p class="mt-6 text-gray-500">Need help? <a href="#" class="text-green-600 hover:text-green-800">Contact Support</a></p>
    </div>
</main>

<?php include '../includes/footer.php' ?>

<?php
use App\Controllers\AuthController;
require __DIR__ . '/../../src/controllers/AuthController.php';
AuthController::requireRole([1]);

$pageTitle = 'Admin Dashboard';
include '../includes/header.php';
?>

<main class="bg-gray-50 py-8">
    <div class="container mx-auto px-6">
        <!-- Dashboard Header -->
        <div class="mb-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <p class="text-lg text-gray-500">You're logged in as an admin</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800">Total Users</h2>
                <p class="text-3xl font-bold text-gray-800">120</p>
                <p class="text-gray-500">Users registered on the platform</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800">Active Users</h2>
                <p class="text-3xl font-bold text-gray-800">95</p>
                <p class="text-gray-500">Users active in the last 30 days</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800">Pending Approvals</h2>
                <p class="text-3xl font-bold text-gray-800">5</p>
                <p class="text-gray-500">Users awaiting admin approval</p>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Activity</h2>
            <ul class="space-y-4">
                <li class="flex justify-between items-center text-gray-600">
                    <span>User John Doe registered</span>
                    <span class="text-sm text-gray-400">1 hour ago</span>
                </li>
                <li class="flex justify-between items-center text-gray-600">
                    <span>User Jane Smith logged in</span>
                    <span class="text-sm text-gray-400">3 hours ago</span>
                </li>
                <li class="flex justify-between items-center text-gray-600">
                    <span>User Mike Johnson updated profile</span>
                    <span class="text-sm text-gray-400">5 hours ago</span>
                </li>
                <li class="flex justify-between items-center text-gray-600">
                    <span>User Emily White deleted account</span>
                    <span class="text-sm text-gray-400">6 hours ago</span>
                </li>
            </ul>
        </div>

        <!-- Charts and Graphs Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">User Growth</h2>
                <div class="h-64 bg-gray-100 rounded-lg"> 
                    <!-- Placeholder for graph, you can integrate a chart library here -->
                    <p class="text-center text-gray-500 mt-28">Graph Placeholder</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Registrations</h2>
                <div class="h-64 bg-gray-100 rounded-lg">
                    <!-- Placeholder for another graph, like registration trends -->
                    <p class="text-center text-gray-500 mt-28">Graph Placeholder</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php' ?>

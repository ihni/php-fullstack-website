<?php
use App\Controllers\AuthController;
require __DIR__ . '/../../src/controllers/AuthController.php';
AuthController::requireRole([1]);

require __DIR__ . '/../../src/controllers/UserController.php';
$controller = new App\Controllers\UserController();
$users = $controller->getAllUsers();

$pageTitle = 'All Users';
include '../includes/header.php';
?>

<main class="min-h-screen bg-gray-50 mt-12 mb-12">
    <section class="bg-white shadow-lg rounded-lg p-8 w-full max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">All Users</h2>
        <p class="text-center text-gray-600 mb-8">Manage users by viewing, editing, and deleting their profiles</p>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left text-gray-700">ID</th>
                    <th class="px-6 py-3 text-left text-gray-700">First Name</th>
                    <th class="px-6 py-3 text-left text-gray-700">Last Name</th>
                    <th class="px-6 py-3 text-left text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left text-gray-700">Role</th>
                    <th class="px-6 py-3 text-left text-gray-700">Created At</th>
                    <th class="px-6 py-3 text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <?php $isAdmin = $user['role'] === 1;?>
                        <tr class="border-b">
                            <td class="px-6 py-4 text-gray-700"><?php echo htmlspecialchars($user['id']); ?></td>
                            <td class="px-6 py-4 text-gray-700"><?php echo htmlspecialchars($user['fname']); ?></td>
                            <td class="px-6 py-4 text-gray-700"><?php echo htmlspecialchars($user['lname']); ?></td>
                            <td class="px-6 py-4 text-gray-700"><?php echo htmlspecialchars($user['email']); ?></td>
                            <td class="px-6 py-4 text-gray-700 <?php echo $isAdmin ? 'font-bold text-red-600' : ''; ?>"> <!-- Bold and red for admin role -->
                            <?php 
                            
                            if ($isAdmin): ?>
                                <i class="fas fa-user-shield mr-2 text-yellow-500"></i>
                            <?php else: ?>
                                <i class="fa-solid fa-user"></i>
                            <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                            <?php 
                            $createdAt = new DateTime($user['created_at']);
                            echo htmlspecialchars($createdAt->format('F j, Y, g:i a'));
                            ?>
                            </td>
                            <td class="px-6 py-4 text-gray-700 flex space-x-4">
                                <a href="update.php?id=<?php echo $user['id']; ?>" class="text-blue-500 hover:text-blue-700 text-xl p-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $user['id']; ?>" class="text-red-500 hover:text-red-700 text-xl p-2" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-600">No users found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>

<?php include '../includes/footer.php'; ?>
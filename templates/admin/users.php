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

        <?php if (isset($_GET['status']) && isset($_GET['message'])): ?>
        <div class="p-4 mb-4 text-sm <?php echo $_GET['status'] === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?> rounded-lg">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
        <?php endif; ?>

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
                        <?php $isAdmin = $user['role'] === 1; ?>
                        <tr class="border-b">
                            <td class="px-6 py-4 text-gray-700"><?php echo htmlspecialchars($user['id']); ?></td>
                            <td class="px-6 py-4 text-gray-700"><?php echo htmlspecialchars($user['fname']); ?></td>
                            <td class="px-6 py-4 text-gray-700"><?php echo htmlspecialchars($user['lname']); ?></td>
                            <td class="px-6 py-4 text-gray-700"><?php echo htmlspecialchars($user['email']); ?></td>
                            <td class="px-6 py-4 text-gray-700 <?php echo $isAdmin ? 'font-bold text-red-600' : ''; ?>">
                                <?php echo $isAdmin ? '<i class="fas fa-user-shield text-yellow-500"></i> Admin' : '<i class="fas fa-user"></i> User'; ?>
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
                                <button 
                                    class="text-red-500 hover:text-red-700 text-xl p-2" 
                                    title="Delete" 
                                    onclick="confirmDeletion(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['fname'] . ' ' . $user['lname']); ?>')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-8 w-1/3">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Confirm Deletion</h2>
        <p id="deleteModalMessage" class="text-gray-600 mb-6"></p>
        <div class="flex justify-end space-x-4">
            <button 
                onclick="closeModal()" 
                class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                Cancel
            </button>
            <form id="deleteForm" method="POST" action="delete.php">
                <input type="hidden" name="id" id="deleteUserId">
                <button 
                    type="submit" 
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDeletion(userId, userName) {
        document.getElementById('deleteModalMessage').textContent = `Are you sure you want to delete ${userName}? This action cannot be undone.`;
        document.getElementById('deleteUserId').value = userId;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>


<?php include '../includes/footer.php'; ?>
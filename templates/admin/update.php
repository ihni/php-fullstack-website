<?php
use App\Controllers\AuthController;
require __DIR__ . '/../../src/controllers/AuthController.php';
AuthController::requireRole([1]);

$controller = new App\Controllers\UserController();

$result = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $result = $controller->updateUser($_POST);
    }
}

$user = $controller->getUserById($_GET['id']);
$fname = $user['fname'] ?? '';
$lname = $user['lname'] ?? '';
$email = $user['email'] ?? '';
$role = (int)($user['role'] ?? 0);
$id = $user['id'] ?? '';

$pageTitle = 'Edit User';
include '../includes/header.php';
?>

<main class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
    <section class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Update User Information</h2>
        <p class="text-center text-gray-600 mb-6">Make changes to the user's details below</p>
        
        <!-- Success card -->
        <?php if (isset($result['success']) && $result['success']): ?>
        <div class="bg-green-100 text-green-800 p-4 rounded-md mb-6 relative">
            <button class="absolute top-0 right-0 p-2 text-green-500" onclick="this.parentElement.style.display='none'">X</button>
            <h3 class="font-semibold">Changes made:</h3>
            <ul class="list-disc pl-6">
            <?php foreach ($result['changes'] as $change) : ?>
                <li><?php echo htmlspecialchars($change); ?></li>
            <?php endforeach; ?>
            </ul>
        </div>

        <!-- No changes/Updates to user attributes card -->
        <?php elseif (isset($result['no_changes']) && $result['no_changes']):?>
        <div class="bg-gray-200 text-gray-800 p-4 rounded-md mb-6 relative">
            <button class="absolute top-0 right-0 p-2 text-gray-500" onclick="this.parentElement.style.display='none'">X</button>
            <p>No changes made to the user's information.</p>
        </div>

        <!-- General Error Message (for duplicate email or other errors) -->
        <?php elseif (isset($result['general']) && !empty($result['general'])): ?>
        <div class="bg-red-100 text-red-800 p-4 rounded-md mb-6 relative">
            <button class="absolute top-0 right-0 p-2 text-red-500" onclick="this.parentElement.style.display='none'">X</button>
            <p><strong>Error:</strong> <?php echo htmlspecialchars($result['general']); ?></p>
        </div>

        <!-- Field-based errors -->
        <?php else: ?>
        <?php
        $fieldErrors = [];
        foreach (['fname', 'lname', 'email'] as $field) {
            if (!empty($result[$field])) {
                $fieldErrors[] = $result[$field];
            }
        }

        if (!empty($fieldErrors)): ?>
            <div class="bg-red-100 text-red-800 p-4 rounded-md mb-6 relative">
                <button class="absolute top-0 right-0 p-2 text-red-500" onclick="this.parentElement.style.display='none'">X</button>
                <p><strong>Errors:</strong></p>
                <ul>
                    <?php foreach ($fieldErrors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php endif; ?>

        <form action="update.php?id=<?php echo $id; ?>" method="POST" class="space-y-6">
            <div>
                <label for="fname" class="block text-gray-700 font-semibold">First Name</label>
                <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div>
                <label for="lname" class="block text-gray-700 font-semibold">Last Name</label>
                <input type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div>
                <label for="role" class="block text-gray-700 font-semibold">Role</label>
                <select name="role" class="w-full p-3 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="0" <?php echo $role === 0 ? 'selected' : ''; ?>>User</option>
                    <option value="1" <?php echo $role === 1 ? 'selected' : ''; ?>>Admin</option>
                </select>
            </div>

            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="hidden" name="action" value="update">

            <button type="submit" class="w-full bg-sky-500 text-white py-3 rounded-lg hover:bg-sky-600 transition duration-200">Update</button>
        </form>
    </section>
</main>

<?php include '../includes/footer.php' ?>
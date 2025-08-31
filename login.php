<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $lines = file('users.txtdb', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($storedUser, $storedPass) = explode('|', $line);
        if ($username === $storedUser && $password === $storedPass) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
        }
    }

    $error = 'Invalid login';
}

$bodyClass = 'login-page';
include 'header.php';
?>

<main class="login-container">
  <h2>MedBillCalc Login</h2>
  <?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="POST" action="login.php">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
</main>

<?php include 'footer.php'; ?>

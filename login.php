<?php
session_start();
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf_token'])) {
        $error = "Invalid CSRF token.";
    } else {
        $user = trim($_POST['username']);
        $pass = trim($_POST['password']);
        if (auth_user($user, $pass)) {
            $_SESSION['user'] = $user;
            header('Location: index.php');
            exit;
        } else {
            $error = "Invalid credentials.";
        }
    }
}

$csrf_token = generate_csrf();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MedBillCalc Login</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div class="login-container">
    <h2>🔒 MedBillCalc Access</h2>
    <?php if (!empty($error)): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST" action="login.php">
      <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" />
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>

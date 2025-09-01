<?php
include 'header.php';

$error = '';

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Basic form validation and sanitization
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Hash the password for security
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Check if username already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $error = "Username already exists.";
        } else {
            // Insert the new user into the database
            $stmt = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
            $stmt->execute([$username, $password_hash]);

            // Redirect to login page after successful registration
            header("Location: login.php?registered=1");
            exit();
        }
    }
}
?>

<style>
    .form-group {
        margin-bottom: 15px;
        text-align: center;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input {
        width: 100%;
        max-width: 300px;
        display: inline-block;
    }
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>

<div class="wrapper">
    <div class="title-wrapper">
        <h2 class="title">Register</h2>
    </div>

    <div class="form-container">
        <?php if ($error): ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form action="register.php" method="POST" style="width: 100%;">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div class="button-group" style="text-align: center;">
                <button class="button" type="submit">Register</button>
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

<?php include 'footer.php'; ?>

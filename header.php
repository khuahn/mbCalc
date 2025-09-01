<?php
// Start a new session or resume the existing one
session_start();
// Include the database connection file.
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MedBillCalc</title>

    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="<?= isset($bodyClass) ? $bodyClass : '' ?>">
    <header class="bar">
        <div style="display: flex; align-items: center; justify-content: center; gap: 10px; font-size: 1.5rem; font-weight: bold; color: white;">
            <i class="fas fa-calculator"></i>
            Med Bill Calc
        </div>
        
        <nav class="nav-links">
            <?php if (isset($_SESSION['username'])): ?>
                <?php if ($_SESSION['username'] === 'jac'): ?>
                    <a href="admin.php"><i class="fas fa-user-shield"></i> Admin</a>
                <?php endif; ?>
                <a href="logout.php" class="button"><i class="fas fa-right-from-bracket"></i> Logout</a>
            <?php endif; ?>
        </nav>
    </header>

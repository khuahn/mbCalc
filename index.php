<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<?php include 'header.php'; ?>
<main>
  <h1>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
  <p>This is your MedBillCalc dashboard.</p>
</main>
<?php include 'footer.php'; ?>

<?php
session_start();
if (empty($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}
$bodyClass = 'home-page';
include 'header.php';
?>
<main class="page">
  <h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>.</h2>
  <p>MedBillCalc is ready.</p>
</main>
<?php include 'footer.php'; ?>

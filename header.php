<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MedBillCalc</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="bar">
    <strong>jac · MedBillCalc</strong>
    <?php if (!empty($_SESSION['user'])): ?>
      <nav><a href="logout.php">Logout</a></nav>
    <?php endif; ?>
  </header>

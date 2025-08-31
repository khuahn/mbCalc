<?php
session_start();
$bodyClass = 'calculator-page';
include 'header.php';
?>

<div class="container">
  <h1>MedBillCalc</h1>
  <form id="calcForm">
    <label for="charge">Charge Amount:</label>
    <input type="number" id="charge" name="charge" required>

    <label for="allowed">Allowed Amount:</label>
    <input type="number" id="allowed" name="allowed" required>

    <label for="copay">Copay:</label>
    <input type="number" id="copay" name="copay" required>

    <label for="deductible">Deductible:</label>

<?php
session_start();
$bodyClass = 'calculator-page';
include 'header.php';
?>

<div class="container">
  <h1>MedBillCalc</h1>
  <table id="calcTable">
    <thead>
      <tr>
        <th>Charges</th>
        <th>Payments</th>
        <th>Adjustment</th>
        <th>Balance</th>
      </tr>
    </thead>
    <tbody id="calcBody">
      <tr>
        <td><input type="number" name="charge[]"></td>
        <td class="payment">0.00</td>
        <td class="adjustment">0.00</td>
        <td class="balance">0.00</td>
      </tr>
    </tbody>
  </table>

  <div class="buttons">
    <button id="addRow">Add Row</button>
    <button id="clear">Clear</button>
    <button id="print">Print</button>
    <button id="darkMode">Dark Mode</button>
  </div>

  <div id="totals">
    <p>Total Payments: <span id="totalPayments">0.00</span></p>
    <p>Total Adjustments: <span id="totalAdjustments">0.00</span></p>
    <p>Total Balance: <span id="totalBalance">0.00</span></p>
  </div>
</div>

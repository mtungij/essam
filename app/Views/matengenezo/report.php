<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.report-header {
  width: 100%;
  margin-bottom: 12px;
  border-bottom: 2px solid #4b0082;
  padding-bottom: 8px;
}

.report-header td {
  vertical-align: middle;
}

.logo {
  width: 48px;
  height: 48px;
  border-radius: 6px;
}

.brand-title {
  font-size: 18px;
  font-weight: 700;
  color: #1f2937;
  margin: 0;
}

.brand-subtitle {
  font-size: 11px;
  color: #4b5563;
  margin: 2px 0 0 0;
}

#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4b0082;
  color: white;
}
h1{
  text-align: center;
  font-size: 14px;
  margin: 8px 0 12px 0;
  color: #111827;
}


</style>
</head>
<body>

<?php
  $logoPath = FCPATH . 'image/logo.jpg';
  $logoData = '';
  if (is_file($logoPath)) {
      $logoData = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logoPath));
  }
?>

<table class="report-header">
  <tr>
    <td style="width: 56px;">
      <?php if ($logoData !== ''): ?>
        <img class="logo" src="<?= $logoData ?>" alt="Logo">
      <?php endif; ?>
    </td>
    <td>
      <p class="brand-title">ESSAM DIGITAL</p>
      <p class="brand-subtitle">CREATIVES MANAGEMENT SYSTEM</p>
    </td>
  </tr>
</table>

<h1>MAINTANANCE REPORT</h1>

<table id="customers">
  <tr>
     <th>S/No</th>
    <th>DATE</th>
    <th>AMOUNT</th>
    <th>PAYMENT METHOD</th>
  </tr>
  <?php $rowId = 1 ;?>
  <?php foreach ($maoni as $item) : ?>
  <tr>
    <td><?= $rowId ++ ?></td>
    <td><?= $item->created_time  ?></td>
    <td><?= $item->income ?></td>
    <td><?= $item->payment_method ?></td>
  </tr>
  <?php endforeach ?>
</table>

</body>
</html>



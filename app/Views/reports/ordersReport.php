<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
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
  margin-left: 250px;
  font-family:lato;
  font-size: 16px;
  
}


</style>
</head>
<body>

<h1>TODAY ORDER REPORT</h1>

<table id="customers">
  <tr>
     <th>S/No</th>
    <th>CUSTOMER NAME</th>
    <th>PHONE NUMBER</th>
    <th>ORDER TYPE</th>
    <th>WORK BUDGET</th>
    <th>WORK COST</th>
    <th>WORK EXPENSES</th>
  </tr>
  <?php $rowId = 1 ;?>
  <?php foreach ($orders as $item) : ?>
  <tr>
    <td><?= $rowId ++ ?></td>
    <td><?= $item->customer ?></td>
    <td> <?= $item->phone ?></td>
    <td><?= $item->order_type ?></td>
    <td><?= number_format($item->budget) ?></td>
    <td><?= number_format($item->cost) ?></td>
    <td><?= number_format($item->budget - $item->cost) ?></td>
  </tr>
  <tr>
  <?php endforeach ?>

</table>

</body>
</html>



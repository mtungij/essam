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



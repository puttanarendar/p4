<!DOCTYPE html>
<html>
<head>
<title>Display the view for database</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<a download="<?php $rows;?>" href="<?= base_url().index_page().'/Excel/button'; ?>"><button style="margin-left:200px;margin-top:50px;" id="btn1" class="btn btn-primary" onclick="return m1();">Download the file in format of .csv</button></a>
	<h1 style="text-align:center;"><b>Import data from database:</b></h1>
<table class="table table-bordered" border="2" style="width:500px;margin-left:400px;">
                <thead>
                    <tr>
						<th>id</th>
                      <th>vechicleno</th>b
                      <th>vechicletype</th>
                      <th>fueltype</th>
                      <th>insurance</th>
                      <th>fitness</th>
                      <th>tax</th>
                      <th>permit</th>
                      <th>rc</th>
                      <th>pollution</th>
                      <th>seating capcity</th>
                      <th>vendorid</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach ($rows as $row): ?>
                    <tr>
						<td><?= $i;?></td>
						<td><?= $row->vechicleno;?></td>
						<td><?= $row->vechicletype;?></td>
						<td><?= $row->fueltype;?></td>
						<td><?= $row->insurance;?></td>
						<td><?= $row->fitness;?></td>
						<td><?= $row->tax;?></td>
						<td><?= $row->permit;?></td>
						<td><?= $row->rc;?></td>
						<td><?= $row->pollution;?></td>
						<td><?= $row->seatingcapacity;?></td>
						<td><?= $row->vendorid;?></td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach; ?>

                  </tbody>
	 </table>          
	</body>
</html>

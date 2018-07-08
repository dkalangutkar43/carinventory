<?php
require_once "common.php";
$model_object = new model();
$data = $model_object->get_model_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mini Car Inventory System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	.manufacture{
		width:50%;
		
	}
	
	.model{
		width:50%;
	}
	
	ul{
		list-style-type:none;
		
	}
	
	ul li{
		padding: 5px 10px;
		background-color:Black;
		color:white;
		margin: 4px 0px;
		text-align:center;
	}
	
	a{
		text-decoration:none !important;;
		font-size:15px;
		color:white;
	}
	
	
	a:hover{
		color:black;
		background-color:white;
	}
	
  </style>
  
</head>
<body>

<div class="jumbotron text-center">
  <h1>Mini Car Inventory System</h1>
</div>  
<div class="container">
  <div class="row">
    <div class="col-sm-2">
		<ul>
			<li><a href="javascript:;" onclick="open_manufacture();">Manufacture</a></li>
			<li><a href="javascript:;" onclick="open_model();">Model</a></li>
			<li><a href="javascript:;" onclick="open_view();">View Inventory</a></li>
		</ul>
    </div>
	
	<div class="col-sm-10">
		<div class="manufacture" id="manufacture" style="display:none">
			<div class="form-group">
				<label for="manufacturer">Manufacturer</label>
				<input type="text" class="form-control" id="manufacturer" placeholder="Enter Manufacturer Name">    
			</div>  
			<button id="manu_butt" class="btn btn-primary">Submit</button>
		</div>
		
		<div class="model" id="model" style="display:none">
			<div class="form-group" style="float:left;margin-right:50px;">
				<label for="manufacturer">Model</label>
				<input type="text" class="form-control" id="modelname" placeholder="Enter Model Name" width="20">    
			</div>
			<div class="form-group">
				<label for="manufacturer" style="position: relative;top: 0px;left: -15px;">Manufacturer</label>
				<select id="manu_select" name="manu_select" style="width:100px;position: relative;top: 28px;height: 27px;left: -112px;">
				</select>
			</div>  

			<button id="btnmodel" class="btn btn-primary" style="position: relative;top: -20px;left: 121px;">Submit</button>		
		</div>
		
		
		<div class="view_inventory" id="view_inventory" style="display:none">
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Serial Number</th>
						<th>Manufacturer Name</th>
						<th>Model Name</th>
						<th>Count</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$i = 1;
					foreach($data as $val)
					{
				?>
						<tr id="tr_<?php echo $val['model_id'];?>">
							<td><?php echo $i;?></td>
							<td><?php echo $val['manufacturer_name'];?></td>
							<td><input type="hidden" id="row_<?php echo $val['model_id'];?>" value="<?php echo $val['model_count'];?>"/><?php echo $val['model_name'];?></td>
							<td id="td_<?php echo $val['model_id'];?>"><?php echo $val['model_count'];?></td>
							<td><button type="button" onclick="soldaction(<?php echo $val['model_id'];?>)">Sold</button></td>
						</tr>
				<?php
						$i++;
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
  </div>
</div>
</body>
</html>

<script src="js/carinventory.js"></script>
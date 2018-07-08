<?php
require_once "common.php";
$manufacture_object = new manufacture();
$model_object = new model();
$m = $_POST["switchcase"];
switch ($m) {
	case "addmanufacturer":
		//add_manufacture
		if(isset($_POST) && isset($_POST["manu_name"]))
		{
			$manu_name = $_POST["manu_name"];
			if(isset($manu_name))
			{
				if($manufacture_object->add_manufacture($manu_name))
				{
				   echo 1;
				} else {
				   echo 3;
				}
			}
			else
			{
				echo 2;
			}
		}
	break;
	
	case "addmodel":	
		if(isset($_POST) && isset($_POST["model_name"]))
		{
			$model_name = $_POST["model_name"];
			$manufacturerid = $_POST["manufacturerid"];
			if(isset($model_name)){
				if($model_object->add_model($model_name, $manufacturerid)){
					echo 1;
				} else {
					echo 3;
				}
			}else{
				echo 2;
			}
		}
	break;
	
	
	case "getmanufacturer":
		echo $manufacture_object->readmanufacturer();
	break;
	
	case "viewinventory":
		echo $model_object->get_model_data();
	break;
	
	case "soldmodel":
	print_r($_POST);
		if(isset($_POST) && isset($_POST["model_id"]))
		{
			$model_id = $_POST["model_id"];
			$model_count = $_POST["model_count"];
			if ($model_object->sold_model($model_id, $model_count)) {
				echo 1;
			}else {
				echo 2;
			}
		}		
	break;
	
}

?>
<?php
class car_inventory_db
{
	public $db_host = "localhost";
	public $user = "root";
	public $password = "";
	public $db_name = "car_inventory";
	public $connection_db;
	
	public function __construct() {
         $this->connection_db = mysqli_connect($this->db_host,$this->user,$this->password,$this->db_name);
    }
	
	public function add_manufacture_db($name)
	{
		$q = "insert into manufacturer values('','$name')";
		$r = mysqli_query($this->connection_db,$q);
		if($r)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function add_model_db($model_name, $manufacturerid)
	{
		$q = "insert into model values('',$manufacturerid,'$model_name',10)";
		$r = mysqli_query($this->connection_db,$q);
		if($r)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function get_all_model_db()
	{
		$q = "select * from model as m join manufacturer as mu on m.manufacturer_id = mu.manufacturer_id";
		$r = mysqli_query($this->connection_db,$q);		
		//$sTableData = "";
		//$i = 1;
		$sTableDataarray = array();
		while ($o = mysqli_fetch_array($r)) {			
			/*$sTableData .= "<tr id='tr_".$o["model_id"]."'>";
			$sTableData .= "<td>$i</td>";
			$sTableData .= "<td>".$o["manufacturer_name"]."</td>";
			$sTableData .= "<td>".$o["model_name"]."</td>";//<input type="text" id="row_'.$o["model_id"].'" value="'.$o["model_count"].'"/>
			$sTableData .= '<td style="display:none;"><input type="text" id="row_'.$o["model_id"].'" value="'.$o["model_count"].'"/></td>';
			$sTableData .= '<td id="td_'.$o["model_id"].'">'.$o["model_count"].'</td>';
			$sTableData .= '<td><button type="button" onclick="soldaction('.$o["model_id"].')">Sold</button></td>';
			$sTableData .= "</tr>";
			$i++;*/
			$sTableDataarray[] = $o;
		}
		return $sTableDataarray;
	}
	
	public function getmanufacturer() {
		$q = "SELECT manufacturer_id, manufacturer_name
		      FROM manufacturer";
		$r = mysqli_query($this->connection_db,$q);	
		$sDropdown = "";
		while ($o = mysqli_fetch_array($r)) {			
			$sDropdown .= "<option value=".$o["manufacturer_id"].">".$o["manufacturer_name"]."</option>";
		}
		return $sDropdown;
	}
	
	public function sold_model_db($model_id, $model_count)
	{
		if ( $model_count >0 ) {
			$q = "UPDATE model SET model_count = ". $model_count."
				  WHERE model_id=".$model_id;
			$r = mysqli_query($this->connection_db,$q);	
		}  else {
			$q = "DELETE FROM model WHERE model_id=".$model_id;
			$r = mysqli_query($this->connection_db,$q);	
		}
		if($r) {
			return true;
		} else {
			return false;
		}	
	}	
}
?>
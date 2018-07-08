<?php
class manufacture
{
	private $manu_data_object;
	
	public function __construct() {
         $this->manu_data_object =  new car_inventory_db();
    }
	
	function add_manufacture($name)
	{		
		return $this->manu_data_object->add_manufacture_db($name);
	}
	
	function readmanufacturer() {
		return $this->manu_data_object->getmanufacturer();	
	}
}
?>
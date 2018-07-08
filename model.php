<?php
class model
{
	private $manu_data_object;
	
	public function __construct() {
         $this->manu_data_object =  new car_inventory_db();
    }
	
	function add_model($model_name, $manufacturerid)
	{
		return $this->manu_data_object->add_model_db($model_name, $manufacturerid);
	}
	
	function get_model_data()
	{
		return $this->manu_data_object->get_all_model_db();	
	}
	
	
	function sold_model($model_id, $model_count)
	{
		return $this->manu_data_object->sold_model_db($model_id, $model_count);	
	}
}
?>
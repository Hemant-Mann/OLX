<?php

class Categories extends DatabaseObject {
	
	protected static $table_name = "categories";
	protected static $db_fields = ['id',  'category'];
	public $id;
	public $category;

}
	
?>
<?php 

$cat = Categories::find_all();
$categories = [];

foreach($cat as $obj) {
	$categories[$obj->id] = [
		"id" => "{$obj->id}",
		"value" => "{$obj->category}"
	];
}

?>
<?php 
	function cate_parent($data, $parent_id = 0, $str = "---")
	{
		foreach ($data as $value) {
			if($value->parent_id == $parent_id)
			echo "<option>$str $value->name </option>"
		}
	}
 ?>
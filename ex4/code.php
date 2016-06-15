<?php
include 'table.php.inc';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title></title>
	</head>
	<body>
		<?php
		$table = new table();
		$table->set_header(array("col1","col2","col3"));
		$table->add_row(array("1","2","3"));
		$table->add_row(array("4","5","6"));
 
		echo $table;
		?>
 
		<?php
		$data = array(
		array('Name', 'Color', 'Size'),
		array('Fred', 'Blue', 'Small'),
		array('Mary', 'Red', 'Large'),
		array('John', 'Green', 'Medium')
		);
		$table1 = new table($data);
 
		echo $table1;
		?>
	</body>
</html>
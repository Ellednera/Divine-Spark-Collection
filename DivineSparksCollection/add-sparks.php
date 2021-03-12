<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// die("Success!");
	
	$_name = addslashes(strip_tags($_POST["spark_name"]));
	$_source = addslashes(strip_tags($_POST["source"]));
	$_description = nl2br(addslashes(strip_tags($_POST["description"])));
	
	$sql = "insert into `sparks` (`spark_id`, `name`, `source`, `description`, `deleted`) 
			values 				('', N'". $_name ."', N'". $_source ."', N'". $_description ."', 0)";
	
	// die($sql);
	
	$conn = mysqli_connect("localhost", "root", "", "sparks_collection")
				or die("Error connecting to the database");
	mysqli_query($conn, $sql) or die("Somethings wrong with the sql statement.<br/>$sql");
	mysqli_close($conn);
	
	$processed_message =  "Your spark has been elavated. Thank you." . "<br/>" .
				"You should close this tab if you are done.";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Divine Book Sparks Collection</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="style.css"/>
<head>
<body>
	<div class="BSD">בס"ד</div>
	<div class="foreground">
		<!-- No need for menu, after adding, close this window manually -->
		<h1>Add Divine Sparks</h1>
		<?php
		 if (isset($processed_message)) { ?>
			<p class="processed-message"> 
			<?php echo $processed_message; ?>
			</p>
			<?php
		 }
		?>
		<form method="POST" enctype="multipart/form-data">
			<input class="general" type="text" name="spark_name" placeholder="Spark Name" required/>
			<input class="general" type="text" name="source" placeholder="Source" required/>
			
			<textarea name="description" placeholder="Description">No description</textarea>
			<input class="buttons" type="reset" value="Clear">
			<input class="buttons" type="submit" value="Add">
		</form>
	</div>
	<!-- besiyata d'shmaya -->

</body>
</html>
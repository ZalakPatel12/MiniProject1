<?php
/**
 * Created by PhpStorm.
 * User: zalakpatel
 * Date: 2019-03-27
 * Time: 09:27
 */

require_once("Util.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> CSV Table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
	</style>
</head>
<body>
	<div class="container">
		<h2 class="alert alert-info text-center">CSV File Records</h2><br>
	<table class="table table-bordered table-striped">
		<?php
        (new \App\initialization)->initial("03.csv");	// File 03
        ?>
	</table>
	</div>
</body>
</html>

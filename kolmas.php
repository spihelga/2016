<?php
session_start();
if (!isset($_SESSION['visits'])){
	$_SESSION['visits'] = 1;
}
function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

connect_db();

?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="UTF-8">
	<title>2016</title>
</head>

<body>
	<form action="kolmas.php">
		<input type="button" value="Refresh" onClick="window.location.reload()" name="submit"/> 
	</form>
</body>
</html>

<?php
function countvis(){

	if(isset($_SESSION['visits'])){
	global $connection;

	$sql = "UPDATE spihelga_2016 set visiite = visiite + 1 where id=23";
	mysqli_query($connection, $sql);

	$sql = "SELECT visiite FROM spihelga_2016 where id=23";
	$sum = mysqli_query($connection, $sql);
	$summ = mysqli_fetch_assoc($sum);
	$summm = $summ['visiite'];

	echo "Külastuste arv on: $summm";

	}
}

countvis();
session_unset();

?>

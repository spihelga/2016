<?php

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
	<form action="esimene.php" method="post">
		<input type="text" name="t1"/>
		<input type="submit" value="Saada" name="submit"/> 
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
        global $connection;
        $kirje = mysqli_real_escape_string($connection, $_POST['t1']);
        $sql = "INSERT INTO spihelga_2016 (kirje) VALUES ('$kirje')";
//        $result = mysqli_query($connection, $sql);
                if ($_POST['t1']!="" && mysqli_query($connection, $sql)) {
                        echo "Kirje sisestatud";
                } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                }
	//header("location: esimene.php");
}

$sql = "SELECT * FROM spihelga_2016";		//SQL lause järgmises muutujas
$result = mysqli_query($connection, $sql) or die ("$sql - " .mysqli_error($connection));	//Tulemuse rida

	while($row = mysqli_fetch_assoc($result)) {
		echo $row['kirje']."<br/>";
		}
?>

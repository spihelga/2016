<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="UTF-8">
	<title>2016</title>
</head>

<body>
	<form action="teine.php" method="post">
		<input type="text" name="t1"/>
		<input type="submit" value="Saada" name="submit"/>
	</form>
</body>
</html>

<?php
if(isset($_POST['submit']) && $_POST['t1']!=""){

	$fail='kirjed.txt';
	$kirje=htmlspecialchars($_POST['t1']);
	file_put_contents($fail, "$kirje</br>" . PHP_EOL, FILE_APPEND);
	echo "Kirje sisestatud";

	$sisu = file_get_contents($fail);
	echo $sisu;
//        $fail = fopen("kirjed.txt", "w") or die ("Ei leidnud faili!");
//	$kirje = htmlspecialchars($_POST['t1']);
//	fwrite($fail, $kirje);
//	fclose($fail);
//        echo "Kirje sisestatud";
} elseif (isset($_POST['submit']) && $_POST['t1']!="") {
        echo "Error: ei saanud sisestada millegipärast </br>";
}
?>

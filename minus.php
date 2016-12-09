<?php
if(isset($_POST['score']))
	$score          = $_POST['score'];
else
	$score          = 0;

$firstRandom	= mt_rand(1, 50);
$secondRandom	= mt_rand(1, $firstRandom);
$summ           = $firstRandom - $secondRandom;
$result         = '';
if(!isset($_POST['hidden']))
{
	$result = "";
} elseif ($_POST['hidden'] === $_POST['itog']){
	$result = "Правильно!";
	$score++;
} else {
	$result = "Неправильно!";
}
?>

<html>
<head></head>
<body>
<?php
echo $result."<br>";
echo $firstRandom . " " . "-" . " " . $secondRandom . " " . "=";
?>
	<form method="POST">
		<input type="number" name="itog" size="6" required autofocus>
		<br>
		<input type="submit">
		<br>
		<input type="hidden" name="hidden" value="<?php echo $summ?>">
		<input type="hidden" name="score" value="<?php echo $score?>">
	</form>
</body>
</html>
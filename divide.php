<?php
if(isset($_POST['score']))
	$score          = $_POST['score'];
else
	$score          = 0;

$firstNumber 		= "";
$secondRandom 		= mt_rand(2, 10);
for ($firstNumber=2;$firstNumber<=100;$firstNumber++)
{
	if (($firstNumber % $secondRandom) == 0)
	{
		$numbersArray[] = $firstNumber;										//Массив подходищих для деления чисел
	}
}
$randomFromArray	 = array_rand($numbersArray);							//Беру рандомное число из массива
?>

<?php
$summ				 = $numbersArray[$randomFromArray] / $secondRandom;
$result				 = '';
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
echo $numbersArray[$randomFromArray] . " " . "/" .  " " . $secondRandom . " " . "=";
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
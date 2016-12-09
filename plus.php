<?php
if(isset($_POST['totalMathSamples']))									//кол-во вопросов в тесте
	$totalMathSamples 			= $_POST['totalMathSamples'];
else
	$totalMathSamples 			= 0;

if(isset($_POST['correctAnswers']))										//кол-во правильных ответов
	$correctAnswers 				= $_POST['correctAnswers'];
else
	$correctAnswers 				= 0;

$firstRandom    	= mt_rand(1, 50);
$secondRandom   	= mt_rand(1, 50);
$summ           	= $firstRandom + $secondRandom;
$result         	= "";
$visibleFields 		= 1;										//поле для регулировки видимости полей
$primer 			= "";
$action 			= "1";										//старт и стоп для теста

if(!isset($_POST['hidden']))
{
	$result = "";
} elseif ($_POST['hidden'] === $_POST['itog']){
	$result = "Правильно!";
	$correctAnswers++;
	$totalMathSamples++;
} else {
	$result = "Неправильно!";
	$totalMathSamples++;
}

if($correctAnswers == 1)
{
	$primer = "пример";
} elseif ($correctAnswers > 1 && $correctAnswers < 5){
	$primer = "примера";
} elseif ($correctAnswers > 4 && $correctAnswers <= 20){
	$primer = "примеров";
}

if($totalMathSamples === 20)											//если достигнут установленный предел кол-ва вопросов в тесте
{
	$action = "0";
	$visibleFields = 0;
	echo "Вы ответили правильно на" . " " . $correctAnswers . " " . $primer . " " . "из" . " " . $totalMathSamples;
	MYSQL_CONNECT (localhost, root, password) OR DIE ("Не могу создать соединение");
	mysql_select_db("math_test") OR DIE ("Не могу выбрать базу данных");
	$query = "INSERT INTO `score_board` VALUES ('', NOW(), '$correctAnswers')";
	mysql_query ($query);
	MYSQL_CLOSE();
	echo "<br>" . "<form method='POST'>" . "<input type='submit' value='Начать заново'>" . "</form>";
}

if($visibleFields === 1)
{
	echo $result . "<br>";
	echo $firstRandom . " " . "+" . " " . $secondRandom . " " . "=" . "<br>";
}
?>

<html>
<head>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.0.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>
	<div id="mainDiv">
		<form id="mainForm" method="POST">
			<input type="number" name="itog" required autofocus>
			<br>
			<input type="submit">
			<br>
			<input type="hidden" name="hidden" value="<?php echo $summ?>">
			<input type="hidden" id="totalMathSamples" name="totalMathSamples" value="<?php echo $totalMathSamples?>">
			<input type="hidden" id="correctAnswers" name="correctAnswers" value="<?php echo $correctAnswers?>">
			<input type="hidden" name="action" value="<?php echo $action?>">
		</form>
		
			<script>
			var sec = 10;
			if ($("input[name='action']").val() === '1')
			{
				timerId = setInterval (function decTimer()
				{
					sec = sec - 1;
					$("#timer").html(sec);
					$("input[name='timer']").val(sec);
					if (sec === 0)
					{
						clearInterval(timerId);
						jQuery("form#mainForm").submit();
					}
				}, 1000);
			}	
			</script>
			
			<div id="timer" style="float:left">10</div><div>&nbsp сек. для ответа</div>
	</div>
	
	<script>
	if ($("input[name='totalMathSamples']").val() === '20')						//если достигнут установленный предел кол-ва вопросов в тесте
	{
		$("#mainDiv").css("visibility", "hidden");
	}
	</script>
</body>
</html>
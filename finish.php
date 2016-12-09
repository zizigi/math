<html>
	<head>
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.0.js"></script>
	</head>
	<body>
		<script>
			var sec = 10;
			timerId = setInterval (function decTimer()
			{
				sec = sec - 1;
				$("#timer").html(sec);
				if (sec === 0)
				{
					clearInterval(timerId);
				}
			}, 1000);
		</script>
			<div id="timer" style="float:left">10</div><div>&nbsp сек. для ответа</div>
	</body>
</html>
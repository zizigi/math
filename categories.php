<html>
	<head>
	</head>
	<body>
		<div id="cat1" class="divvis">
			<form method="POST" id="formSubmit" action="/count.php">
				<div name="category"><input type="radio" name="operation" value="Сложение" >Сложение</div>
				<div name="category"><input type="radio" name="operation" value="Вычетание">Вычетание</div>
				<div name="category"><input type="radio" name="operation" value="Умножение">Умножение</div>
				<div name="category"><input type="radio" name="operation" value="Деление">Деление</div>
				<div name="category"><input type="submit" value="Начать" onclick="category_off()"></div>
			</form>
		</div>
	</body>
</html>
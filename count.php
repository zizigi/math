<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				switch ($_POST['operation']) {
					case Сложение:
						//echo "Сложение";
						header('Location:http://vs-horoshev00-01a.hosting.local/plus.php');
						break;
					case Вычетание:
						//echo "Вычетание";
						header('Location:http://vs-horoshev00-01a.hosting.local/minus.php');
						break;
					case Умножение:
						//echo "Умножение";
						header('Location:http://vs-horoshev00-01a.hosting.local/multiply.php');
						break;
					case Деление:
						//echo "Деление";
						header('Location:http://vs-horoshev00-01a.hosting.local/divide.php');
						break;
				}
		}
?>
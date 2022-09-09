<?php
$cookie_name = "znak";
if(!isset($_COOKIE['punkty']))
	setcookie('punkty', 0, time() + (86400 * 30), "/");
    
if(!isset($_COOKIE[$cookie_name]) ){
	while($_COOKIE[$cookie_name] == $rand)
		$rand = rand(1,6);
	$cookie_value = $rand;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
}

if($_GET['KOM'] == $_COOKIE[$cookie_name])
{
	while($_COOKIE[$cookie_name] == $rand)
		$rand = rand(1,6);
	$cookie_value = $rand;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
	setcookie('punkty', $_COOKIE['punkty'] + 1, time() + (86400 * 30), "/");
}
?>
<!DOCTYPE html>
<head>
<html lang="pl">
<meta charset="utf-8">
<title>Test</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div id="container">
<div id="header">
<h1> TEST </h1>
</div>

<div class="menu">
	<a class="aktywna" href="test.php?KOM=0"><strong>Test</strong></a>
	<a href="index.php"><strong> Nauka </strong></a>


</div>
<div id="content">
<a href="test.php?KOM=1"><img src="img/1.png" width="100" height="100" alt="Znak1"></a>
<a href="test.php?KOM=2"><img src="img/2.png" width="100" height="100" alt="Znak2"></a>
<a href="test.php?KOM=3"><img src="img/3.png" width="100" height="100" alt="Znak3"></a>
<a href="test.php?KOM=4"><img src="img/4.png" width="100" height="100" alt="Znak4"></a>
<a href="test.php?KOM=5"><img src="img/5.png" width="100" height="100" alt="Znak5"></a>
<a href="test.php?KOM=6"><img src="img/6.png" width="100" height="100" alt="Znak6"></a>
</div>
<form action="test.php" method="get">
	<button id="dalej">Dalej</button>
</form>
<?php
echo '<h1 class="wynik">Wynik: ' . $_COOKIE['punkty'] . '</h1>';
	switch($_COOKIE[$cookie_name])
	{
		case 1:
			echo '<h2 class="nazwa"> Uwaga dzieci </h2>';
		break;
		case 2:
			echo '<h2 class="nazwa"> Sygnaly świetlne </h2>';
		break;
		case 3:
			echo '<h2 class="nazwa"> Ustąp pierszeństa </h2>';
		break;
		case 4:
			echo '<h2 class="nazwa"> Skrzyżowanie z drogą podporządtkowaną występującą po obu stronach </h2>';
		break;
		case 5:
			echo '<h2 class="nazwa"> Uwaga zakręt w prawo</h2>';
		break;
		case 6:
			echo '<h2 class="nazwa"> Dziekie zwierzęta</h2>';
		break;
	}
?>


<div id="footer">
<strong>Nauka znaków drogowych &copy; Wszelkie prawa dozwolone </strong>
</div>
</div>
</body>

</html>
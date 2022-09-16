<?php
// Path: index.php
//declaration of cookie name
    $cookie_name = "znak";
   
    //if button value is 0 keep the same value of cookie
    if(isset($_COOKIE[$cookie_name]) && isset($_POST['button']) && $_POST['button'] == 0 ){
        setcookie($cookie_name, $_COOKIE[$cookie_name], time() + (86400 * 30), "/");
    }
    //if cookie is set or button 'znam' is pressed change value of existing cookie
    else if(isset($_COOKIE[$cookie_name]) && isset($_POST['button']) && $_POST['button'] == 1){
        $rand = $_COOKIE[$cookie_name];
        while($_COOKIE[$cookie_name] == $rand)
            $rand = rand(1,6);
        $cookie_value = $rand;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
    }
    //set cookie if it is not set yet
    else if(!isset($_COOKIE[$cookie_name])){
        //get random number and set it as cookie value
        $rand = rand(1,6);
        $cookie_value = $rand;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
    }
    
?>
<!DOCTYPE html>
<head>
<html lang="pl">
<meta charset="utf-8">
<title>Znaki ostrzegawcze</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div id="container">
<div id="header">
<h1> ZNAKI OSTRZEGAWCZE </h1>
</div>

<div class="menu">
	<a class="aktywna" href="index.php"><strong>Nauka</strong></a>
	<a href="test.php?KOM=0"><strong> Test </strong></a>
</div>
<div id="content">
<?php
            // because of the way cookies work, we need to check if cookie is set or not
            if(!isset($_COOKIE[$cookie_name]))
                //if cookie is not set, display image with random number
                echo "<img src='img/$cookie_value.png' alt='Znak'>";
                //if cookie is set, display image with value of cookie
            else if(isset($_COOKIE[$cookie_name]))
                echo "<img src='img/$_COOKIE[$cookie_name].png' alt='Znak'>"; 
                 
        ?>
		<form action="index.php" method="post">
            <button type="submit" value="1" name="button" id="yes">Znam</button>
            <button type="submit" value="0" name="button" id="no">Nie znam</button>
        </form>
		<br>
        <?php
        //if button 'znam' is pressed, display description of the sign
            if(isset($_POST['button']) && $_POST['button'] == 0)
            {
                //switch case to display description of the sign
                switch($_COOKIE[$cookie_name])
                {
                    case 1:
                        echo "<h2>Znak ostrzega przed miejscem na drodze szczególnie uczęszczanym przez dzieci w wieku od 7 do 15 lat. Znak umieszcza się zwłaszcza w pobliżu szkół podstawowych, gimnazjów, placówek prowadzących zajęcia z dziećmi, terenów zabaw itp.</h2>";
                        break;
                    case 2:
                        echo "<h2>Znak ostrzega przed miejscem, w którym ruch jest kierowany za pomocą sygnalizacji świetlnej. Znak stosuje się:
                        przed każdą sygnalizacją świetlną poza obszarem zabudowanym,
                        przed pierwszą sygnalizacją w obszarze zabudowanym,
                        w każdym miejscu, gdzie sygnalizacja zastosowana została do kierowania ruchem wahadłowym,
                        w każdym miejscu, gdzie sygnalizator jest tylko zawieszony nad jezdnią.</h2>";
                        break;
                    case 3:
                        echo "<h2>Znak ostrzega przed koniecznością ustąpienia pierwszeństwa. Umieszczony jest na drodze podporządkowanej przed skrzyżowaniem z drogą z pierwszeństwem, gdy spełnione są warunki widoczności (w innym wypadku stosuje się znak B-20 „stop”). W obrębie skrzyżowania znak dotyczy tylko najbliższej jezdni, przed którą został umieszczony. Umieszczony razem ze znakiem C-12 „ruch okrężny” określa pierwszeństwo dla znajdującego się na skrzyżowaniu. Może być umieszczony w innych miejscach, gdzie z przepisów ustawy – Prawo o ruchu drogowym wynika obowiązek ustąpienia pierwszeństwa, np. wyjazd z obiektu, torowisko tramwajowe.
                        Pod znakiem może być umieszczona tabliczka T-6c „tabliczka wskazująca rzeczywisty przebieg drogi z pierwszeństwem przez skrzyżowanie”
                        
                        Na drogach o dopuszczalnej prędkości powyżej 60 km/h znak A-7 poprzedzany jest znakiem A-7 z tabliczką T-1 „tabliczka wskazująca odległość znaku ostrzegawczego od miejsca niebezpiecznego”.</h2>";
                        break;
                    case 4:
                        echo "<h2>Znak ostrzega przed skrzyżowaniem z drogą podporządkowaną występującą po obu stronach drogi z pierwszeństwem. Stosowany jest poza obszarem zabudowanym dla wskazania pierwszeństwa drogi przebiegającej na wprost, przy której jest ustawiony. Jeżeli osie dróg poprzecznych nie przecinają się na skrzyżowaniu, stosuje się tabliczkę T-6b „tabliczka wskazująca układ dróg podporządkowanych”.</h2>";
                        break;
                    case 5:
                        echo "<h2>Znak ostrzega przed pojedynczym niebezpiecznym zakrętem w prawo. Stosuje się go na ogół poza miastami, gdy kąt zwrotu łuku drogi jest większy niż 5°, a jego promień jest mniejszy niż 750 m oraz w zależności od przechyłki. Ustawiany także na zakrętach o ograniczonej widoczności, bądź gdzie dochodzi do częstych wypadków lub kolizji.</h2>";
                        break;
                    case 6:
                        echo "<h2>Zwierzęta dzikie</h2>";
                        break;

                }
            }
        ?>
</div>


<div id="footer">
<strong>Nauka znaków drogowych &copy; Wszelkie prawa zastrzeżone </strong>
</div>
</div>
</body>

</html>
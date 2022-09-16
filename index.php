<?php
    $cookie_name = "znak";
    
    if(!isset($_COOKIE[$cookie_name]) ){
        while($_COOKIE[$cookie_name] == $rand) 
            $rand = rand(1,6);
        $cookie_value = $rand;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
    }
    else if(isset($_COOKIE[$cookie_name]) && isset($_POST['button']) && $_POST['button'] == 1)
		{
		$rand = rand(1,6);			
        while($_COOKIE[$cookie_name] == $rand)
            $rand = rand(1,6);
        $cookie_value = $rand;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
		}
	
?>
<!DOCTYPE html>		<!Znacznik deklaracji dokumentu html!>
<head>		<!"Glowa, czyli sekcja naglowkowa"!>
<html lang="pl">		<!Ustawienie jezyka!>
<meta charset="utf-8">		<!Ustawanienie kodowania znakow!>
<title>Znaki ostrzegawcze</title>		<!Tytul strony!>
<link rel="stylesheet" href="style.css">		<!Podlaczenie css, czyli arkusza stylow!>
</head>		<!"Glowa, czyli zamkniecie sekcji naglowkowej"!>

<body>		<!"Cialo", czyli zawartosc dokumentu (tresci/tekst)!>
<div id="container">		<!Rodzaj pojemnika, w ktorym znajduja sie tresci (nazwa pojemnika: container). !!!Pojemniki moga miec osobne style w arkuszu css!!! !>
<div id="header">			<!Rodzaj pojemnika, w ktorym znajduja sie tresci (nazwa pojemnika: header). !!!Pojemniki moga miec osobne style w arkuszu css!!! !>
<h1> ZNAKI OSTRZEGAWCZE </h1>		<!Tekst "Znaki ostrzegawcze" o wielkosci h1 (h1,h2,h3...itd. to ustawienie wielkosci tekstu)!>
</div>		<!Zamkniecie pojemnika o nazwie "header"!>

<div class="menu">		<!Ustawienie wartosci artybutu!>
	<a class="aktywna" href="index.php"><strong>Nauka</strong></a>		<!Wywolanie klasy "aktywna", adres dokumentu oraz pogrubiony napis "Nauka"!>
	<a href="test.php?KOM=0"><strong> Test </strong></a>			<!Adres dokumentu oraz pogrubiony napis "Test"!>
</div>					<!Zamkniecie pojemnika o nazwie "menu"!>
<div id="content">		<!Utworzenie pojemnika o nazwie "content"!>
<?php
            if(!isset($_COOKIE[$cookie_name]))
                echo "<img src='img/$cookie_value.png' alt='Znak'>";
            else if(isset($_COOKIE[$cookie_name]))
                echo "<img src='img/$_COOKIE[$cookie_name].png' alt='Znak'>"; 
                 
        ?>
		<form action="index.php" method="post">			<!Utworzenie formularza: atrybut "action" określa, gdzie mają być wysyłane dane formularza podczas przesyłania formularza, metoda: post, czyli metoda przesyłania danych!>
            <button type="submit" value="1" name="button" id="yes">Znam</button>		<!Przycisk do przeslania odpowiedzi o wartosci "1", wyswietli sie odpowiedz o tresci: "Znam"!>
            <button type="submit" value="0" name="button" id="no">Nie znam</button>		<!Przycisk do przeslania odpowiedzi o wartosci "0", wyswietli sie odpowiedz o tresci: "Nie znam"!>
        </form>		<!Zamnkniecie formularza!>
		<br>		<!Przechodzi do nowej lini!>
        <?php
            if(isset($_POST['button']) && $_POST['button'] == 0)
            {
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
</div>		<!Zamkniecie pojemnika o nazwie "content"!>


<div id="footer">		<!Utworzenie tzw. stopki. Stopka przechowuje zwykle informacje na temat sekcji - np.: autor, linki..itd.!>
<strong>Nauka znaków drogowych &copy; Wszelkie prawa zastrzeżone </strong>		<!Pogrubiony napis wyswietlajacy sie w stopce!>
</div>					<!Zamkniecie pojemnika o nazwie "footer" (zamkniecie stopki)!>
</div>					<!Zamkniecie pojemnika o nazwie "container" (zamkniecie konteneru, czyli pojemnika na tresc)!>
</body>					<!Zamkniecie zawartosci dokumentu!>

</html>					<!Zamkniecie dokumentu (zakonczenie)!>
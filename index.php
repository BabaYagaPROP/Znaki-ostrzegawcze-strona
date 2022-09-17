<?php
//setting cookie for the first time
if(!isset($_COOKIE['sign']))
{
    setcookie('sign', '1', time()+3600);
}
//if the cookie is set and button znam is pressed increment value of cookie
if(isset($_COOKIE['sign']) && isset($_POST['button']) && $_POST['button'] == 1)
{
    setcookie('sign', $_COOKIE['sign']+1, time()+3600);
    //if the value of cookie is greater than 6 set it to 1
    if($_COOKIE['sign'] >= 6)
    {
        setcookie('sign', '1', time()+3600);
    }
}
//setting cookie which tells if site is loaded for the first time
if(!isset($_POST['button']) || !isset($_COOKIE['first']))
{
    setcookie('first', '1', time()+3600);
}
else{
    setcookie('first', '0', time()+3600);
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
//if button wasnt pressed yet display the first image
if(!isset($_POST['button']) && isset($_COOKIE['sign']))
{
    echo "<img src='img/".$_COOKIE['sign'].".svg' alt='znak' />";
}
//if button was pressed display the next image
else if(isset($_COOKIE['sign'])&& isset($_POST['button']) && $_POST['button'] == 1)
{
    echo "<img src='img/".$_COOKIE['sign'].".svg' alt='znak' />";
}
//if the cookie is set and button nie znam is pressed display the image with the answer
else if(isset($_COOKIE['sign']) && isset($_POST['button']) && $_POST['button'] == 0)
{
    //if the page is loaded for the first time display the image with the answer
    if($_COOKIE['first'] == 1)
    {
        echo "<img src='img/".($_COOKIE['sign']).".svg' alt='znak' />";
    }
    //if the page is loaded for for more than one time display the image -1
    else if($_COOKIE['sign'] == 1 && $_COOKIE['first'] == 0)
    {
        echo "<img src='img/6.svg' alt='znak' />";
    }
    else if($_COOKIE['sign'] != 1 && $_COOKIE['first'] == 0)
    {
        echo "<img src='img/".($_COOKIE['sign']-1).".svg' alt='znak' />";
    }
}

                 
?>
		<form action="index.php" method="post">			<!Utworzenie formularza: atrybut "action" określa, gdzie mają być wysyłane dane formularza podczas przesyłania formularza, metoda: post, czyli metoda przesyłania danych!>
            <button class="znam" type="submit" value="1" name="button" id="yes">Znam</button>		<!Przycisk do przeslania odpowiedzi o wartosci "1", wyswietli sie odpowiedz o tresci: "Znam"!>
            <button class="nieznam" type="submit" value="0" name="button" id="no">Nie znam</button>		<!Przycisk do przeslania odpowiedzi o wartosci "0", wyswietli sie odpowiedz o tresci: "Nie znam"!>
        </form>		<!Zamnkniecie formularza!>
		
        <?php
        //if button 'znam' is pressed, display description of the sign
        if(isset($_POST['button']) && $_POST['button'] == 0)
        {
            //switch case to display description of the sign
            if($_COOKIE['first'])
                $sign = $_COOKIE['sign'];
            else
                $sign = $_COOKIE['sign']-1;
            switch($sign)
            {
                case 1:
                    echo '<div class="tekst" "<h2>Znak ostrzega przed miejscem na drodze szczególnie uczęszczanym przez dzieci w wieku od 7 do 15 lat. Znak umieszcza się zwłaszcza w pobliżu szkół podstawowych, gimnazjów, placówek prowadzących zajęcia z dziećmi, terenów zabaw itp.</h2>';
                    break;
                case 2:
                    echo ' <div class="tekst" <h2>Znak ostrzega przed miejscem, w którym ruch jest kierowany za pomocą sygnalizacji świetlnej. Znak stosuje się:
                    przed każdą sygnalizacją świetlną poza obszarem zabudowanym,
                    przed pierwszą sygnalizacją w obszarze zabudowanym,
                    w każdym miejscu, gdzie sygnalizacja zastosowana została do kierowania ruchem wahadłowym,
                    w każdym miejscu, gdzie sygnalizator jest tylko zawieszony nad jezdnią.</h2> </div> ';
                    break;
                case 3:
                    echo ' <div class="tekst" <h2>Znak ostrzega przed koniecznością ustąpienia pierwszeństwa. Umieszczony jest na drodze podporządkowanej przed skrzyżowaniem z drogą z pierwszeństwem, gdy spełnione są warunki widoczności. W obrębie skrzyżowania znak dotyczy tylko najbliższej jezdni, przed którą został umieszczony. Umieszczony razem ze znakiem C-12 „ruch okrężny” określa pierwszeństwo dla znajdującego się na skrzyżowaniu.”.</h2></div>';
                    break;
                case 4:
                    echo ' <div class="tekst" <h2>Znak ostrzega przed skrzyżowaniem z drogą podporządkowaną występującą po obu stronach drogi z pierwszeństwem. Stosowany jest poza obszarem zabudowanym dla wskazania pierwszeństwa drogi przebiegającej na wprost, przy której jest ustawiony. Jeżeli osie dróg poprzecznych nie przecinają się na skrzyżowaniu, stosuje się tabliczkę T-6b „tabliczka wskazująca układ dróg podporządkowanych”.</h2></div>';
                    break;
                case 5:
                    echo '<div class="tekst" <h2>Znak ostrzega przed pojedynczym niebezpiecznym zakrętem w prawo. Stosuje się go na ogół poza miastami, gdy kąt zwrotu łuku drogi jest większy niż 5°, a jego promień jest mniejszy niż 750 m oraz w zależności od przechyłki. Ustawiany także na zakrętach o ograniczonej widoczności, bądź gdzie dochodzi do częstych wypadków lub kolizji".</h2></div>';
                    break;
                case 0:
                    echo '<div class="tekst" <h2>Zwierzęta dzikie</h2> </div>';
                    break;

            }
        }
        ?>
		</div>
</div>		<!Zamkniecie pojemnika o nazwie "content"!>


<div id="footer">		<!Utworzenie tzw. stopki. Stopka przechowuje zwykle informacje na temat sekcji - np.: autor, linki..itd.!>
<strong>Nauka znaków drogowych &copy; Wszelkie prawa zastrzeżone </strong>		<!Pogrubiony napis wyswietlajacy sie w stopce!>
</div>					<!Zamkniecie pojemnika o nazwie "footer" (zamkniecie stopki)!>
</div>					<!Zamkniecie pojemnika o nazwie "container" (zamkniecie konteneru, czyli pojemnika na tresc)!>
</body>					<!Zamkniecie zawartosci dokumentu!>

</html>					<!Zamkniecie dokumentu (zakonczenie)!>
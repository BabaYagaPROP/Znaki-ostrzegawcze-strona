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
    echo "<img src='img/".$_COOKIE['sign'].".svg' alt='znak' class='img_index' />";
}
//if button was pressed display the next image
else if(isset($_COOKIE['sign'])&& isset($_POST['button']) && $_POST['button'] == 1)
{
    echo "<img src='img/".$_COOKIE['sign'].".svg' alt='znak' class='img_index' />";
}
//if the cookie is set and button nie znam is pressed display the image with the answer
else if(isset($_COOKIE['sign']) && isset($_POST['button']) && $_POST['button'] == 0)
{
    //if the page is loaded for the first time display the image with the answer
    if($_COOKIE['first'] == 1)
    {
        echo "<img src='img/".($_COOKIE['sign']).".svg' alt='znak' class='img_index' />";
    }
    //if the page is loaded for for more than one time display the image -1
    else if($_COOKIE['sign'] == 1 && $_COOKIE['first'] == 0)
    {
        echo "<img src='img/6.svg' alt='znak' class='img_index' />";
    }
    else if($_COOKIE['sign'] != 1 && $_COOKIE['first'] == 0)
    {
        echo "<img src='img/".($_COOKIE['sign']-1).".svg' alt='znak' class='img_index' />";
    }
}

                 
?>
		<form action="index.php" method="post">			<!Utworzenie formularza: atrybut "action" okre??la, gdzie maj?? by?? wysy??ane dane formularza podczas przesy??ania formularza, metoda: post, czyli metoda przesy??ania danych!>
            <button type="submit" value="1" name="button" id="yes">Znam</button>		<!Przycisk do przeslania odpowiedzi o wartosci "1", wyswietli sie odpowiedz o tresci: "Znam"!>
            <button type="submit" value="0" name="button" id="no">Nie znam</button>		<!Przycisk do przeslania odpowiedzi o wartosci "0", wyswietli sie odpowiedz o tresci: "Nie znam"!>
        </form>		<!Zamnkniecie formularza!>
		<br>		<!Przechodzi do nowej lini!>
		<br>
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
                    echo "<h2>Znak ostrzega przed miejscem na drodze szczeg??lnie ucz??szczanym przez dzieci w wieku od 7 do 15 lat. Znak umieszcza si?? zw??aszcza w pobli??u szk???? podstawowych, gimnazj??w, plac??wek prowadz??cych zaj??cia z dzie??mi, teren??w zabaw itp.</h2>";
                    break;
                case 2:
                    echo "<h2>Znak ostrzega przed miejscem, w kt??rym ruch jest kierowany za pomoc?? sygnalizacji ??wietlnej. Znak stosuje si??:
                    przed ka??d?? sygnalizacj?? ??wietln?? poza obszarem zabudowanym,
                    przed pierwsz?? sygnalizacj?? w obszarze zabudowanym,
                    w ka??dym miejscu, gdzie sygnalizacja zastosowana zosta??a do kierowania ruchem wahad??owym,
                    w ka??dym miejscu, gdzie sygnalizator jest tylko zawieszony nad jezdni??.</h2>";
                    break;
                case 3:
                    echo "<h2>Znak ostrzega przed konieczno??ci?? ust??pienia pierwsze??stwa. Umieszczony jest na drodze podporz??dkowanej przed skrzy??owaniem z drog?? z pierwsze??stwem, gdy spe??nione s?? warunki widoczno??ci (w innym wypadku stosuje si?? znak B-20 ???stop???). W obr??bie skrzy??owania znak dotyczy tylko najbli??szej jezdni, przed kt??r?? zosta?? umieszczony. Umieszczony razem ze znakiem C-12 ???ruch okr????ny??? okre??la pierwsze??stwo dla znajduj??cego si?? na skrzy??owaniu. Mo??e by?? umieszczony w innych miejscach, gdzie z przepis??w ustawy ??? Prawo o ruchu drogowym wynika obowi??zek ust??pienia pierwsze??stwa, np. wyjazd z obiektu, torowisko tramwajowe.
                    Pod znakiem mo??e by?? umieszczona tabliczka T-6c ???tabliczka wskazuj??ca rzeczywisty przebieg drogi z pierwsze??stwem przez skrzy??owanie???
                    
                    Na drogach o dopuszczalnej pr??dko??ci powy??ej 60 km/h znak A-7 poprzedzany jest znakiem A-7 z tabliczk?? T-1 ???tabliczka wskazuj??ca odleg??o???? znaku ostrzegawczego od miejsca niebezpiecznego???.</h2>";
                    break;
                case 4:
                    echo "<h2>Znak ostrzega przed skrzy??owaniem z drog?? podporz??dkowan?? wyst??puj??c?? po obu stronach drogi z pierwsze??stwem. Stosowany jest poza obszarem zabudowanym dla wskazania pierwsze??stwa drogi przebiegaj??cej na wprost, przy kt??rej jest ustawiony. Je??eli osie dr??g poprzecznych nie przecinaj?? si?? na skrzy??owaniu, stosuje si?? tabliczk?? T-6b ???tabliczka wskazuj??ca uk??ad dr??g podporz??dkowanych???.</h2>";
                    break;
                case 5:
                    echo "<h2>Znak ostrzega przed pojedynczym niebezpiecznym zakr??tem w prawo. Stosuje si?? go na og???? poza miastami, gdy k??t zwrotu ??uku drogi jest wi??kszy ni?? 5??, a jego promie?? jest mniejszy ni?? 750 m oraz w zale??no??ci od przechy??ki. Ustawiany tak??e na zakr??tach o ograniczonej widoczno??ci, b??d?? gdzie dochodzi do cz??stych wypadk??w lub kolizji.</h2>";
                    break;
                case 0:
                    echo "<h2>Zwierz??ta dzikie</h2>";
                    break;

            }
        }
        ?>
</div>		<!Zamkniecie pojemnika o nazwie "content"!>


<div id="footer">		<!Utworzenie tzw. stopki. Stopka przechowuje zwykle informacje na temat sekcji - np.: autor, linki..itd.!>

<strong>Nauka znak??w drogowych &copy; Kamil Pawlak Joanna Lipi??ska Lukas Zembok Kamil Szulc</strong>		<!Pogrubiony napis wyswietlajacy sie w stopce!>
</div>					<!Zamkniecie pojemnika o nazwie "footer" (zamkniecie stopki)!>
</div>					<!Zamkniecie pojemnika o nazwie "container" (zamkniecie konteneru, czyli pojemnika na tresc)!>
</body>					<!Zamkniecie zawartosci dokumentu!>

</html>					<!Zamkniecie dokumentu (zakonczenie)!>
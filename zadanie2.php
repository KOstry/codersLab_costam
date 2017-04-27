<?php
/*
 * 1. Napisz stronę, która wyświetli ranking filmów.
2. Ranking ma wyświetlać filmy, których rating jest większy, niż średni rating wszystkich filmów.
3. Oblicz najpierw średni rating filmów a następnie pobierz filmy z ratingiem większym niż średni.
4. Wykładowca pokaże, jak można obliczyć średni rating z pomocą zapytania SQL i funkcji `AVG()`
5. Zauważ, iż pobierając drugim sposobem rozwiązania tego zadania jest pobranie wszystkich filmów do tablicy,  
   następnie obliczenie średniego ratingu i przefiltrowanie tablicy aby posiadała tylko interesujące nas filmy.
 * 
 * 
 */

require_once 'init.php';
//Zapisz w poniższej zmiennej kod zapytania SQL pobierającego odpowiednie dane

$db = db::getInstance();

$avgMoviesRatingSql = "select avg(rating) from movies";

$avgMoviesRating = $db->_pdo->query($avgMoviesRatingSql)->fetch();
//$result = $db->_pdo->query("SELECT  avg(rating) from `movies`")->fetch();
$avgMoviesRating = $avgMoviesRating[0];
//echo $avgMoviesRating."</br>";
$sqlFilsmWithRatingBiggerThanAVG = "select * from movies where rating >".$avgMoviesRating;
//echo $sqlFilsmWithRatingBiggerThanAVG."</br>";

$arrayOfFils = $db->_pdo->query($sqlFilsmWithRatingBiggerThanAVG)->fetchAll(PDO::FETCH_ASSOC);
foreach($arrayOfFils as $film){
    echo "film: ".$film['name'].", rating: ".$film['rating']."</br>";
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 2 - wyświetlanie danych z bazy</title>
</head>
<body>
<?php
//wyświetl filmy z ratingiem większym niż średnia
?>
</body>
</html>

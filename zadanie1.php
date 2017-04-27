<?php
#### Zadanie 1 - rozwiązywane z wykładowcą
/*
1. Napisz stronę, która wyświetli wszystkie produkty znajdujące się w bazie danych o nazwie ```products_ex```.  
2. Jeśli opis produktu jest dłuższy niż 20 znaków, strona ma pokazywać pierwsze 20 znaków i na końcu ```...```.  
3. Dodaj produkt z długim opisem do Twojej bazy aby przetestować działanie.
*/
require_once 'init.php';
//Zapisz w poniższej zmiennej kod zapytania SQL pobierającego odpowiednie dane

$db = db::getInstance();

$result = $db->_pdo->query("SELECT * FROM `Products`")->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $singleProduct){
    echo "produkt - ".$singleProduct['name']." | description - ";
    $description = $singleProduct['description'];
    if(strlen($description) > 7){
        echo substr($description, 0, 7)." (...)";
    } else {
        echo $description;
    }
    echo "</br>";
    //echo $singleProduct['description']."</br>";   
    
}

//wykonaj zapytanie do bazy
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 1 - wyświetlanie danych z bazy</title>
</head>
<body>
<?php
//poniżej wyświetl listę danych z bazy, pamiętaj aby użyć pętli a nie print_r lub var_dump
?>
</body>
</html>

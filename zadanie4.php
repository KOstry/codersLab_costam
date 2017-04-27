<?php
//zapisz poniżej kod, który połączy się z bazą danych

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zdanie 4 - pobieranie danych z bazy</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top:30px;">
            <a class="btn btn-warning" href="zadanie4_form.php" role="button">Strona główna</a>
            <a class="btn btn-info" href="zadanie5.php?action=movies" role="button">Filmy</a>
            <a class="btn btn-info" href="zadanie5.php?action=cinemas" role="button">Kina</a>
            <a class="btn btn-info" href="zadanie5.php?action=payments" role="button">Płatności</a>
            <a class="btn btn-info" href="zadanie5.php?action=tickets" role="button">Bilety</a>
        </div>
    </div>
    <div class="row">
        <?php
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case'movies':
                    //tutaj wygeneruj odpowiednie linki dla wszystkich rekordów zwracjących filmy
                    break;
                case'cinemas':
                    //tutaj wygeneruj odpowiednie linki
                    break;
                case'payments':
                    //tutaj wygeneruj odpowiednie linki
                    break;
                case'tickets':
                    //tutaj wygeneruj odpowiednie linki
                    break;
            }
        }
        ?>
    </div>
</div>
</body>
</html>

<?php
include '../../class/User.php';
include '../../class/Teilnehmer.php';
include '../../class/Anwesenheit.php';
$teilnehmer_id = 6;
$anwesenheiten = Anwesenheit::findByTeilId($teilnehmer_id);
$teilnehmer = Teilnehmer::findById($teilnehmer_id)
?>

<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
</head>
<body>

<?php echo '<h1>'.$teilnehmer->getFname(). " ".$teilnehmer->getLname(); ?>
<div>
    <?php

    foreach ($anwesenheiten as $item) {
        echo '<div style="border-style: solid; width: 200px; float: left">';
        echo $item->getStatus();

        echo $item->getDatum();
        echo '</div>';
    }
    ?>


</div>

</body>
</html>

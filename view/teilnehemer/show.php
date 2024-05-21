<?php
include '../../class/User.php';
include '../../class/Teilnehmer.php';
include '../../class/Anwesenheit.php';

$teilnehmer_id = $_GET['id'];
$anwesenheiten = Anwesenheit::findByMonthTId($teilnehmer_id,3);
$teilnehmer = Teilnehmer::findById($teilnehmer_id);
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

<?php echo '<h1>' . $teilnehmer->getFname() . " " . $teilnehmer->getLname().'</h1>'; ?>
<div>
    <?php
    $color= 'withe';


        echo '<div>';
    foreach ($anwesenheiten as $index=>$item) {
        if ($item->getStatus() == 'fe') {
            $color = 'green';
        } elseif ($item->getStatus() == 'x') {
            $color = 'dodgerblue';
        } elseif ($item->getStatus() == 'o') {
            $color = 'darkslateblue';
        }elseif ($item->getStatus() == 'n'){
            $color= 'red';
        }

        if($index==0){
            if ($item->getDatumObj()->format('w'== 0)){
                $anzahl = 7;
            }else{
                $anzahl= $item->getDatumObj()->format('w');
                $anzahl = $anzahl - 1;
            }
            $day = $item->getDatumObj()->format('w');
            for ($i = 0; $i <$anzahl ; $i++) {
                echo '<span> $anzahl</span>';

            }
        }




        echo "<span style='border-style: solid; width: 200px;display: inline-block; background-color: $color'>";
        echo $item->getStatus();

        echo $item->getDatum();
        echo '</span>';
        (($index+1) %7 == 0) ? printf(" </div><div>") : printf("");

    }
    ?>


</div>

</body>
</html>

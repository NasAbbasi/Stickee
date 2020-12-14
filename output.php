<?php
require_once('WidgetHandler.php');

if(!empty($_POST)){
    $order = $_POST['order'];

    $widget = new WidgetHandler();
    $results = $widget->getPacks($order);
    $catPacks = array_count_values($results);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wally's Widgets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div class="content">
    <div class="card" style="width:800px; margin: 50px auto">
        <div class="card-header">Recommended Packages</div>
        <div class="card-body">
            <span class="badge badge-info">Ordered widgets: <?= number_format($order) ?></span>
            <ul class="list-group list-group-flush">
                <?php foreach ($catPacks as $pack => $packNo){ ?>
                    <li class="list-group-item"><b><?= $packNo ?></b> x <?= number_format($pack) ?> pack(s)</li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
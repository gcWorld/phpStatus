<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sitename Status Site</title>
     <?php if(isset($_GET['refresh'])){ ?>
        <meta http-equiv="refresh" content="30" />
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php

include("getcurrentstatus.php");

echo $maint;

if (strpos($maint,'1') !== false) {
    $app = "<span class='text-warning'><i class='fa fa-warning'></i> Wartung</span>";
} else {
    $app = check_web("http://url");
}

if (strpos($maint,'2') !== false) {
    $dl1 = "<span class='text-warning'><i class='fa fa-warning'></i> Wartung</span>";
} else {
    $dl1 = check_web("http://url");
}

if (strpos($maint,'3') !== false) {
    $dl2 = "<span class='text-warning'><i class='fa fa-warning'></i> Wartung</span>";
} else {
    $dl2 = check_web("http://url");
}

if (strpos($maint,'4') !== false) {
    $db = "<span class='text-warning'><i class='fa fa-warning'></i> Wartung</span>";
} else {
    $db = check_db("http://url");
}

?>
<div class="container">
    <h3>Sitename Status</h3>
    <p><?php echo file_get_contents('./status.txt', true); ?></p>
    <table class="table table-striped">
        <tr>
            <th>Service</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>Service #1</td>
            <td><?php echo $app; ?></td>
        </tr>
        <tr>
            <td>Service #2</td>
            <td><?php echo $dl1; ?></td>
        </tr>
        <tr>
            <td>Service #3</td>
            <td><?php echo $dl2; ?></td>
        </tr>
        <tr>
            <td>Service #4</td>
            <td><?php echo $db; ?></td>
        </tr>
    </table>
</div>
</body>
</html>
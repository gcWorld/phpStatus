<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>IBIScontrol Status Site</title>
     <?php if(isset($_GET['refresh'])){ ?>
        <meta http-equiv="refresh" content="30" />
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="http://s3.gcmods.de.s3.amazonaws.com/ibiscontrol/style.css" type="text/css" rel="stylesheet">
    <link href="http://s3.gcmods.de.s3.amazonaws.com/ibiscontrol/style-color.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php

include("getcurrentstatus.php");

echo $maint;

if (strpos($maint,'1') !== false) {
    $app = "<span class='text-warning'><i class='fa fa-warning'></i> Wartung</span>";
} else {
    $app = check_web("http://control.gcmods.de/maint/ping.html");
}

if (strpos($maint,'2') !== false) {
    $dl1 = "<span class='text-warning'><i class='fa fa-warning'></i> Wartung</span>";
} else {
    $dl1 = check_web("http://dl.gcmods.de/ping.html");
}

if (strpos($maint,'3') !== false) {
    $dl2 = "<span class='text-warning'><i class='fa fa-warning'></i> Wartung</span>";
} else {
    $dl2 = check_web("http://dl2.gcmods.de/ping.html");
}

if (strpos($maint,'4') !== false) {
    $db = "<span class='text-warning'><i class='fa fa-warning'></i> Wartung</span>";
} else {
    $db = check_db("http://networks-os.de/mysqlstat.php");
}

?>
    
    <div class="container">
<div class="row">
	<header class="col-sm-12 col-md-12">
	<div class="row">
		<a href="http://control.gcmods.de"><h1 class="col-md-12">IBIS droid - Login</h1></a>
	</div>
	</header>
</div> 
    <div class="maintenance"><h3>IBIScontrol Status</h3>
         <p><?php echo file_get_contents('./status.txt', true); ?></p>
        <table class="table table-striped">
        <tr>
            <th>Service</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>IBIScontrol App</td>
            <td><?php echo $app; ?></td>
        </tr>
        <tr>
            <td>Download Server 1</td>
            <td><?php echo $dl1; ?></td>
        </tr>
        <tr>
            <td>Download Server 2</td>
            <td><?php echo $dl2; ?></td>
        </tr>
        <tr>
            <td>Datenbank</td>
            <td><?php echo $db; ?></td>
        </tr>
    </table>
	  	 </div>
</div>
</body>
</html>
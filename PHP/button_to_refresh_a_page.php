<?php
    date_default_timezone_set('UTC');
?>
<html>
    <head>
        <title>Button to refresh a page</title>
    </head>
    <body>
    <p>UTC time: <?php echo date("Y-m-d H:i:s"); ?></p>
    <?php date_default_timezone_set("America/Toronto"); ?>
    <p>TORONTO time: <?php echo date("Y-m-d H:i:s"); ?></p>
    <?php date_default_timezone_set("Asia/Kathmandu"); ?>
    <p>NEPAL time: <?php echo date("Y-m-d H:i:s"); ?></p>
    <p><input type="button" value="Refresh Page" onClick="window.location.reload()"></p>
    </body>
</html>
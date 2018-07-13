<?php
$tz_idents = timezone_identifiers_list();
// $tz_idents = DateTimeZone::listIdentifiers();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Current World Times</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="main-content">

      <h1>Current World Times</h1>

      <?php
        foreach($tz_idents as $zone) {
      ?>
        <dl>
          <dt>
            <?php echo $zone; ?>
          </dt>
          <dd>
          </dd>
        </dl>
      <?php } // end foreach ?>
    </div>

  </body>
</html>
